<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();                                   // Allows all attributes to be mass assigned. 
        Model::shouldBeStrict();                            // Enable strict mode for DB, forcing to write clean code and catching silent bugs.
        Model::automaticallyEagerLoadRelationships();       // Handling n+1 issues. 
    }
}
