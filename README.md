<p align="center">
&nbsp;
    <img src="https://img.shields.io/badge/version-v1.0.0-blue"/>
    <img src="https://img.shields.io/github/contributors/leonardoakio/keycloak-client"/>
    <img src="https://img.shields.io/github/stars/leonardoakio/keycloak-client?style=sociale"/>
    <img src="https://img.shields.io/github/forks/leonardoakio/keycloak-client?style=social"/>
    <img src="https://img.shields.io/badge/License-MIT-blue"/>
</p>

## Simple Keycloak Client para Laravel
O pacote serve de implementação para diferentes `grant_types` comunicando e autenticando com um host do Keycloak   

## Iniciando o projeto
Fazer o require do pacote que será importado ao projeto para dentro da pasta `vendor`
```shell
composer require leonardoakio/keycloak-client
```
Ou se já estiver instalado, realizar o update do pacote para verificar se não há alguma nova versão
```shell
composer update leonardoakio/keycloak-client
```
Inserir o provider dentro do arquivo `config/app.php` para que KeycloakClientServiceProvider possa ser identificado fora do contexto da vendor
```php
KeycloakClient\KeycloakClientServiceProvider::class
```
Publicar os arquivos a serem gerados da lib
```shell
php artisan vendor:publish --tag=keycloak-resources
```
Conseguimos executar o Provider de forma direta também
```shell
php artisan vendor:publish  --provider="KeycloakClient\KeycloakClientServiceProvider.php"
```
Adicionar as configurações do arquivo de rota gerado em `app/Providers/RouteServiceProvider.php` na função `boot`
```php
$this->configureRateLimiting();

$this->routes(function () {
    ... 
    
    Route::middleware('keycloak')
        ->prefix('api')
        ->group(__DIR__.'/../routes/keycloak.php');
    }
```
Adicionar a ENV `KEYCLOAK_DIRECT_GRANT_HOST` que é o domínio do Keycloak no ecossistema e será utilizado para acessar o serviço do Keycloak a partir da aplicação
```php
KEYCLOAK_DIRECT_GRANT_HOST=http://keycloak:8080
```
Alterar o valor da constante no arquivo `KeycloakClientsEnum` para o nome do Client de autenticação do Keycloak
```php
const CLIENT_ID = 'template-client';
```
Alterar o valor da constante no arquivo `KeycloakRealmsEnum` para o nome do Realm de autenticação do Keycloak
```php
const AUTH_REALM = 'template_realm';
```

### Estrutura
```bash
├── routes/                 # Rotas de autenticação do Keycloak
├── src/Controllers         # Controladores que irão lidar com as rotas
├── src/Enums               # Lista de elementos 
├── src/Repositories        # Classe de comunicação com o Keyclaok
├── composer.json           # Listar as dependências do projeto e suas versões
```

### Dependências
| Recurso            | Versão |
|--------------------|--------|
| php                | `^8.0` |
| laravel            | `^9.0` |
| guzzlehttp/guzzle  | `^7.2` |
| illuminate/support | `^9.0` |

### Guias:
- [Keycloak - Create Realm, Client, Roles, and User](https://www.geeksforgeeks.org/keycloak-create-realm-client-roles-and-user/)
- [Keycloak Realm VS Keycloak Client](https://stackoverflow.com/questions/56561554/keycloak-realm-vs-keycloak-client)
- [Keycloak - Different Access Grant types](https://medium.com/@ramanamuttana/different-access-grant-types-using-keycloak-and-oauth-2-0-f1114c8a0fef)



