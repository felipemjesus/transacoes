<?php

namespace App\Services;

use App\Models\Conta;
use App\Models\Transacao;
use App\Models\Usuario;

class ContaService
{
    public function criar(Usuario $usuario): void
    {
        $conta = new Conta();
        $conta->saldo = 0;
        $conta->usuario_id = $usuario->id;
        $conta->save();
    }

    public function atualizaSaldo(Transacao $transacao): void
    {
        if (!$transacao->situacao) {
            return;
        }

        $this->atualizaSaldoPagador($transacao);

        $this->atualizaSaldoBeneficiario($transacao);
    }

    private function atualizaSaldoPagador(Transacao $transacao): void
    {
        $conta = $transacao->pagador->conta;
        $conta->saldo -= $transacao->valor;
        $conta->save();
    }

    private function atualizaSaldoBeneficiario(Transacao $transacao): void
    {
        $conta = $transacao->beneficiario->conta;
        $conta->saldo += $transacao->valor;
        $conta->save();
    }
}
