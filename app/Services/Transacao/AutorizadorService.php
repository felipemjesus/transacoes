<?php

namespace App\Services\Transacao;

use Illuminate\Support\Facades\Http;

class AutorizadorService
{
    public static function valida(): bool
    {
        $response = Http::post(env('MOCK_TRANSACAO_AUTORIZADOR_URL'));

        return $response->json()['message'] === 'Autorizado';
    }
}
