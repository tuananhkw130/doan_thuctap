<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class DetectSeason
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentMonth = Carbon::now()->month;

        if (in_array($currentMonth, [11, 12, 1])) {
            $season = 'winter';
        } elseif (in_array($currentMonth, [8, 9, 10])) {
            $season = 'autumn';
        } else {
            $season = 'other';
        }

        View::share('season', $season);

        return $next($request);
    }
}
