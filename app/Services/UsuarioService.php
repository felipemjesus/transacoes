<?php

namespace App\Services;

use App\Models\Usuario;
use Exception;
use Illuminate\Support\Facades\DB;

class UsuarioService
{
    public function cadastro(array $dados): Usuario
    {
        DB::beginTransaction();
        try {
            $usuario = new Usuario($dados);
            $usuario->save();

            $contaService = new ContaService();
            $contaService->criar($usuario);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return $usuario;
    }
}
