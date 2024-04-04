<?php

namespace App\Repositories\Keycloak;

use GuzzleHttp\Client;
use App\Enums\Keycloak\KeycloakClientsEnum;
use App\Enums\Keycloak\KeycloakRealmsEnum;
use App\Enums\Keycloak\KeycloakRoutesEnum;

class KeycloakRepository
{
    public function __construct(
        private Client $client
    ) {}

    public function credentialsLogin(array $data)
    {
        $response = $this->client->post(
            sprintf(
                KeycloakRoutesEnum::ACCESS_TOKEN,
                getenv('KEYCLOAK_DIRECT_GRANT_HOST'),
                KeycloakRealmsEnum::AUTH_REALM
            ),
            [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => KeycloakClientsEnum::CLIENT_ID,
                    'username' => $data['email'],
                    'password' => $data['password'],
                ]
            ]
        );

        return json_decode($response->getBody());
    }
}
