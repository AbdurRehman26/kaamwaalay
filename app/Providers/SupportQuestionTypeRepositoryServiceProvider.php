<?php

namespace App\Providers\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Data\Models\SupportQuestionType;
use App\Providers\Data\Repositories\SupportQuestionTypeRepository;

class SupportQuestionTypeRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('SupportQuestionTypeRepository', function () {
            return new SupportQuestionTypeRepository(new SupportQuestionType);
        });
    }
}
