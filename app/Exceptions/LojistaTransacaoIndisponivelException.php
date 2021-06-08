<?php

namespace App\Exceptions;

use Exception;

class LojistaTransacaoIndisponivelException extends Exception
{
    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => 'Transação não autorizada para lojista.'
        ], 401);
    }
}
