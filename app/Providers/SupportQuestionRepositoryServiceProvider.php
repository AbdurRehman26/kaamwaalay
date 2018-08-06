<?php

namespace App\Providers\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Data\Models\SupportQuestion;
use App\Providers\Data\Repositories\SupportQuestionRepository;

class SupportQuestionRepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind('SupportQuestionRepository', function () {
            return new SupportQuestionRepository(new SupportQuestion);
        });
    }
}
