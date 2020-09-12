<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ResponseTimeLogger
{
    public const START_TIME_HEADER = 'X-Request-Start-Time';
    public const RESPONSE_TIME_HEADER = 'X-Response-Time';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // set the start time on the request and store it as a request header just in case we're running in async mode
        $request->headers->set(self::START_TIME_HEADER, defined('LARAVEL_START')
            ? LARAVEL_START
            : microtime(true)
        );

        // get the response
        $response = $next($request);

        // add the response time header
        $response->header(self::RESPONSE_TIME_HEADER,
            microtime(true) - floatval($request->headers->get(self::START_TIME_HEADER))
        );

        // return response with response time header appended
        return $response;
    }

    /**
     * Perform any final actions for the request lifecycle.
     *
     * @param  \Symfony\Component\HttpFoundation\Request $request
     * @param  \Symfony\Component\HttpFoundation\Response $response
     * @return void
     */
    public function terminate($request, $response)
    {
        // log the response time
        Log::info('response time', [
            'method' => $request->getMethod(),
            'uri' => $request->getUri(),
            'status' => $response->getStatusCode(),
            'time' => $response->headers->get(self::RESPONSE_TIME_HEADER),
        ]);
    }
}
