<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Data\Models\Service;
use App\Providers\Data\Repositories\ServiceRepository;

class ServiceRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ServiceRepository', function () {
            return new ServiceRepository(new Service);
        });
    }
}
