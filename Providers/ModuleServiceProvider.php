<?php

/*
 * ProVision Administration, http://ProVision.bg
 * Author: Venelin Iliev, http://veneliniliev.com
 */

namespace ProVision\VisualBuilder\Providers;

use Caffeinated\Modules\Support\ServiceProvider;
use ProVision\VisualBuilder\Administration;
use ProVision\VisualBuilder\Shortcodes\Title;
use Webwizo\Shortcodes\Facades\Shortcode;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'visual-builder');

//        $this->publishes([
//            __DIR__ . '/../Resources/Lang' => resource_path('lang/vendor/provision/visual-builder'),
//        ], 'lang');

        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'visual-builder');

        $this->publishes([
            __DIR__ . '/../Public' => public_path('vendor/provision/visual-builder'),
        ], 'public');

        \ProVision\Administration\Administration::bootModule('visual-builder', Administration::class);
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        Shortcode::register('title', Title::class);
        //$this->app->register(RouteServiceProvider::class);
    }
}
