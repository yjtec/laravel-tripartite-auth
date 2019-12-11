<?php
namespace Yjtec\LaravelTripartiteAuth;

use Illuminate\Support\ServiceProvider;

class TripartiteAuthServiceProvider extends ServiceProvider
{

    public function setupConfig()
    {
        
    }
    
    public function register()
    {
        $this->app->singleton('TripartiteAuth', function(){
            return new TripartiteAuth();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . "/config/tripartite_auth.php" => config_path('tripartite_auth.php'),
        ]);
    }
    
}