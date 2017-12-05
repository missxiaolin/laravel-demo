<?php

namespace Huifang\Api\Http\Middleware;

use Closure;

class ApiAuth
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
    ];

    /**
     * The name of the query string item from the request containing the API token.
     *
     * @var string
     */
    protected $inputKey = 'token';

    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('X-TOKEN', '');
        $now = time();
        return $next($request);
    }
}