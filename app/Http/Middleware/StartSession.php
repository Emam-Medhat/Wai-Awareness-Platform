<?php

namespace App\Http\Middleware;

use Illuminate\Session\Middleware\StartSession as Middleware;

class StartSession extends Middleware
{
    /**
     * The session IDs that should be considered expired.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
