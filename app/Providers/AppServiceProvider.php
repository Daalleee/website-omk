<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\HomeSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::share('contact', Contact::first());
        View::share('_home', HomeSetting::first());
    }
}
