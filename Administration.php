<?php

/*
 * ProVision Administration, http://ProVision.bg
 * Author: Venelin Iliev, http://veneliniliev.com
 */

namespace ProVision\VisualBuilder;

use Illuminate\Support\Facades\Route;
use ProVision\Administration\Contracts\Module;

class Administration implements Module
{

    public function routes($module)
    {
        Route::resource('visual_builder', \ProVision\VisualBuilder\Http\Controllers\Admin\VisualBuilderController::class);
    }

    public function dashboard($module)
    {

    }

    public function menu($module)
    {
    }
}
