<?php

namespace App\Enums\Keycloak;

final class KeycloakRoutesEnum
{
    const AUTHENTICATION = '%s/realms/%s/protocol/openid-connect/auth?%s';
    const ACCESS_TOKEN = '%s/realms/%s/protocol/openid-connect/token';
    const REFRESH_TOKEN = '%s/realms/%s/protocol/openid-connect/token';
    const USER_INFO = '%s/realms/%s/protocol/openid-connect/userinfo';
    const USER_REGISTER = '%s/auth/admin/realms/%s/users';
    const LOGOUT = '%s/realms/%s/protocol/openid-connect/logout';
}
