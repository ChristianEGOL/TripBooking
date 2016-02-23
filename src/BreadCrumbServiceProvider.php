<?php

namespace EGOL\ReisenLizenzPayment;

use Illuminate\Support\ServiceProvider;
use App\Booking;

class BreadCrumbServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('booking::payment.index', function($view) {
            $breadcrumbs = collect([
                '/home' => 'Dashboard',
                'Zahlungsverwaltung'
            ]);
            $view->withBreadcrumbs($breadcrumbs);
        });

        view()->composer('booking::payment.settings', function($view) {
            $breadcrumbs = collect([
                '/home' => 'Dashboard',
                '/payment' => 'Zahlungsverwaltung',
                'Einstellungen'
            ]);
            $view->withBreadcrumbs($breadcrumbs);
        });

        view()->composer('booking::payment.edit', function($view) {
            $breadcrumbs = collect([
                '/home' => 'Dashboard',
                '/payment' => 'Zahlungsverwaltung',
                'Zahlung bearbeiten'
            ]);
            $view->withBreadcrumbs($breadcrumbs);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
