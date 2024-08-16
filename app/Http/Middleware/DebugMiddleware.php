<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DebugMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $start = microtime(true);
        $startMemory = memory_get_usage();

        /** @var Response $response */
        $response = $next($request);

        $end = microtime(true);
        $endMemory = memory_get_usage();

        $executionTime = ($end - $start) * 1000;
        $memoryUsage = ($endMemory - $startMemory) / 1024;

        $response->headers->set('X-Debug-Time', number_format($executionTime, 2) . ' ms');
        $response->headers->set('X-Debug-Memory', number_format($memoryUsage, 2) . ' KB');

        return $response;
    }
}
