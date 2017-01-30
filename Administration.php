<?php

/*
 * ProVision Administration, http://ProVision.bg
 * Author: Venelin Iliev, http://veneliniliev.com
 */

namespace ProVision\VisualBuilder;

use Illuminate\Support\Facades\Route;
use Kris\LaravelFormBuilder\Form;
use ProVision\Administration\Contracts\Module;

class Administration implements Module
{

    public function routes($module)
    {
        Route::resource('visual-builder', \ProVision\VisualBuilder\Http\Controllers\Admin\VisualBuilderController::class);
    }

    public function dashboard($module)
    {

    }

    public function menu($module)
    {
    }

    /**
     * Add settings in administration panel
     * @param $module
     * @param Form $form
     * @return mixed
     */
//    public function settings($module, Form $form)
//    {
//        // TODO: Implement settings() method.
//    }
}
