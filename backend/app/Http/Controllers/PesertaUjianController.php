<?php

namespace App\Http\Controllers;

use App\Models\PesertaUjian;
use App\Repositories\JadwalUjianRepository;
use App\Services\PesertaService;
use App\Services\Ujian\UjianService;
use Illuminate\Http\Request;

class PesertaUjianController extends Controller
{
    public function getUjian(Request $request, UjianService $ujianService) {
        $psertaID = $request->get('data_peserta')->id;
         $pesertaujian = $ujianService->jadwalUjianPeserta($psertaID);

        return response([
            'error' => false,
            'data' => $pesertaujian,
        ], 200);
    }
    /**
     * konfirmasi ujian
     *
     * @return void
     */
    public function confirm(){

    }
}
