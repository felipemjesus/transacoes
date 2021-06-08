<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Http\Resources\UsuarioResource;
use App\Services\UsuarioService;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    private UsuarioService $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function store(UsuarioRequest $request)
    {
        $usuario = $this->usuarioService->cadastro($request->validated());

        return UsuarioResource::make($usuario);
    }
}
