<?php

namespace App\Http\Middleware;

use Illuminate\View\Middleware\ShareErrorsFromSession as Middleware;

class ShareErrorsFromSession extends Middleware
{
    /**
     * The attributes that should be shared by default.
     *
     * @var array<string, mixed>
     */
    protected $shares = [
        //
    ];
}
