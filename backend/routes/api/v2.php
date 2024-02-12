<?php

use App\Http\Controllers\Api\v2\PesertaLoginController;
use App\Http\Controllers\PesertaUjianController;
use App\Http\Middleware\PesertaAuthMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return true;
});
/**
 * /api/v2/peserta
 * /api/v2/ujian
 * /api/v2/ujian/mulai
 * /api/v2/ujian/selesai
 * /api/v2/peserta/logout
 */
Route::prefix('/peserta')->group(function(){
    /**
     * @Route(api/v2/peserta/login)
     */
    Route::post('/login',[PesertaLoginController::class,'index']);
    Route::middleware(PesertaAuthMiddleware::class)->group(function(){
        Route::post('/logout',[PesertaLoginController::class,'logout']);
        Route::get('/get_user',function(Request $request){
            return response([
                'error' => false,
                'data' => $request->get('data_peserta'),
            ],200);
        });
        Route::prefix('/ujian')->group(function(){
            Route::get('/get_ujian',[PesertaUjianController::class,'getUjian']);
        });
    });
});
