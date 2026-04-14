<?php

namespace App\Http\Middleware;

use Illuminate\Routing\Middleware\SubstituteBindings as Middleware;

class SubstituteBindings extends Middleware
{
    /**
     * The attributes that should be substituted.
     *
     * @var array<string, string>
     */
    protected $except = [
        //
    ];
}
