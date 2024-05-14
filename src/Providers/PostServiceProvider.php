<?php

namespace Antefil\Parser\Providers;

use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       $this->loadRoutesFrom(__DIR__.'/../routes/posts.php');
	   $this->loadViewsFrom(__DIR__.'/../resources/views', 'posts');
	   $this->publishes([
			__DIR__.'/../resources/views' => resource_path('views/vendor/parser'),
		]);
		
		$this->publishes([
        __DIR__.'/../database/migrations/' => database_path('migrations')
		], 'courier-migrations');
	
		$this->publishes([
			__DIR__.'/../config/social.php' => config_path('social.php')
		], 'courier-config');
    }
}
