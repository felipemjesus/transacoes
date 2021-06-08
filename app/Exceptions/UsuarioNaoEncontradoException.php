<?php

namespace App\Exceptions;

use Exception;

class UsuarioNaoEncontradoException extends Exception
{
    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => 'Usuário não encontrado.'
        ], 404);
    }
}
