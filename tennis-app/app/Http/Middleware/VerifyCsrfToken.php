<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'joueurs',
        'joueurs/create',
        'tournois/create',
        'recherche',
        'joueurs/*',
        '/tournois/*',
        '/login',
        'coming_without',
        ];
}
