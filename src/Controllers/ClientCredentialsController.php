<?php

namespace App\Http\Controllers\Keycloak;

use Illuminate\Http\Request;
use App\Repositories\Keycloak\KeycloakRepository;

class ClientCredentialsController
{
    public function __construct(
        protected Request $request,
        protected KeycloakRepository $keycloakRepository
    ) {}

    public function login()
    {
        if (!$this->request->has('email') || !$this->request->has('password')) {
            return response()->json(['error' => 'Campos email e password são obrigatórios'], 400);
        }

        $token = $this->keycloakRepository->credentialsLogin($this->request->input());

        return response()->json(
            $token
        );
    }
}
