<?php

namespace App\Services\Transacao;

use Illuminate\Support\Facades\Http;

class NotificadorService
{
    public static function envia(): bool
    {
        $response = Http::post(env('MOCK_TRANSACAO_NOTIFICADOR_URL'));

        return $response->json()['message'] === 'Success';
    }
}
