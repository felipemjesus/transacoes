<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransacaoRequest;
use App\Services\TransacaoService;

class TransacoesController extends Controller
{
    private TransacaoService $transacaoService;

    public function __construct(TransacaoService $transacaoService)
    {
        $this->transacaoService = $transacaoService;
    }

    public function store(TransacaoRequest $request)
    {
        $transacao = $this->transacaoService->cria($request->validated());

    }
}
