<?php

namespace App\Services;

use App\Exceptions\LojistaTransacaoIndisponivelException;
use App\Exceptions\SaldoInsuficienteException;
use App\Exceptions\UsuarioNaoEncontradoException;
use App\Models\Conta;
use App\Models\Transacao;
use App\Models\Usuario;
use App\Services\Transacao\AutorizadorService;
use Exception;
use Illuminate\Support\Facades\DB;

class TransacaoService
{
    public function cria(array $dados): Transacao
    {
        $pagador = $this->identificaEValidaPagador($dados['pagador']);
        $contaPagador = $pagador->conta;

        $this->verificaSaldoDisponivel($contaPagador, $dados['valor']);

        $beneficiario = $this->identificaEValidaBeneficiario($dados['beneficiario']);

        DB::beginTransaction();
        try {
            $transacao = new Transacao();
            $transacao->valor = $dados['valor'];
            $transacao->pagador = $pagador->id;
            $transacao->beneficiario = $beneficiario->id;
            $transacao->situacao = AutorizadorService::valida();
            $transacao->save();

            $contaService = new ContaService();
            $contaService->atualizaSaldo($transacao);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return $transacao;
    }

    private function identificaEValidaPagador(int $pagadorId): Usuario
    {
        /** @var Usuario $pagador */
        $pagador = Usuario::query()->where('id', $pagadorId)->first();
        if (!$pagador) {
            throw new UsuarioNaoEncontradoException();
        }

        if (!$pagador->isComum()) {
            throw new LojistaTransacaoIndisponivelException();
        }

        return $pagador;
    }

    private function identificaEValidaBeneficiario(int $beneficiarioId): Usuario
    {
        /** @var Usuario $beneficiario */
        $beneficiario = Usuario::query()->where('id', $beneficiarioId)->first();
        if (!$beneficiario) {
            throw new UsuarioNaoEncontradoException();
        }

        return $beneficiario;
    }

    private function verificaSaldoDisponivel(Conta $conta, float $valor): void
    {
        if ($conta->saldo < $valor) {
            throw new SaldoInsuficienteException();
        }
    }
}
