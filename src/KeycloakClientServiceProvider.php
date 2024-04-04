<?php

namespace KeycloakClient;

use Illuminate\Support\ServiceProvider;

class KeycloakClientServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish all resources
        $this->publishResources();
    }

    protected function publishResources()
    {
        $resources = [
            __DIR__.'/Controllers' => app_path('Http/Controllers/Keycloak'),
            __DIR__.'/Enums' => app_path('Enums/Keycloak'),
            __DIR__.'/Repositories' => app_path('Repositories/Keycloak'),
            __DIR__.'/../routes' => base_path('routes'),
        ];

//         php artisan vendor:publish --tag=keycloak-resources
        foreach ($resources as $source => $destination) {
            $this->publishes([$source => $destination], 'keycloak-resources');
        }
    }

    public function register()
    {}
}
