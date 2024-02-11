<?php

namespace App\Http\Middleware;

use App\Repositories\PesertaRepository;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PesertaAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $error = [];
        $pesertaRepository = new PesertaRepository();
        if ($bearer = $request->bearerToken()) {
            //dapatkan user berdasarkan bearer token tersebut
            $peserta = $pesertaRepository->getByApiToken($bearer);
            if ($peserta && $peserta->api_token) {
                $request->attributes->add(['data_peserta' => $peserta]);
                return $next($request);
            }
        }
        return response()->json([
            'message' => "Fak Kata gweh teh"
        ], 401);
    }
}
