<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class RequestId
{
    public const REQUEST_ID_HEADER = 'X-Request-Id';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if the request does not have a request id, append one
        if (!$request->hasHeader(self::REQUEST_ID_HEADER)) {
            $request->headers->set(self::REQUEST_ID_HEADER, Uuid::uuid4()->toString());
        }

        // process the request
        $response = $next($request);

        // append the request id to the response
        $response->header(self::REQUEST_ID_HEADER, $request->header(self::REQUEST_ID_HEADER));
        return $response;
    }
}
