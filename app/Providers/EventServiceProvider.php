<?php

namespace App\Providers;

use App\Events\feature\FeatureJsonCreator;
use App\Listeners\feature\CreateFeatureJsonDocument;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        FeatureJsonCreator::class => [
            CreateFeatureJsonDocument::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
