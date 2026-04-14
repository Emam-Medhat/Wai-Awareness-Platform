<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{
    /**
     * The trusted hosts for this application.
     *
     * @var array<int, string>
     */
    protected $hosts = [
        //
    ];
}
