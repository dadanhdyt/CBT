<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use App\Services\PesertaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Validator;

class PesertaLoginController extends Controller
{
    public function index(Request $request, PesertaService $pesertaService){
            $validator = FacadesValidator::make($request->all() ,[
                'kode_peserta' => 'required|string|max:10',
                'password' => 'required',
            ]);
            if($validator->fails()) {
                return response([
                    'error' => true,
                    'message' => [
                        'validation_errors' => $validator->errors(),
                    ],
                ],403);
            }else{
                $logedin = $pesertaService->login($validator->validated());
                if($logedin) {
                    return response([
                        'error' => false,
                        'data' => $logedin,
                        'api_token' => $logedin->api_token,
                        'message' =>  "Login berhasil"
                    ],200);
                } else {
                    return response([
                        'error' => true,
                        'message' =>  "Login gagal username atau pasword salah"
                    ],403);
                }
            }
    }
}
