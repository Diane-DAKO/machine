<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class ForceHttpsForTunnel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifie si l'hôte actuel est un domaine LocalTunnel (loca.lt)
        if (str_contains($request->getHost(), '.loca.lt')) {
            // Force Laravel à générer toutes les URL en HTTPS
            URL::forceScheme('https');
        }

        return $next($request);
    }
}