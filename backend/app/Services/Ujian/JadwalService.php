<?php declare(strict_types=1);

namespace App\Services\Ujian;

use App\Models\PesertaUjian;
use App\Services\AbstractService;


/**
 * JadwalService services
 * @author dadanhidayat <dadan@gmail.com>
 */
final class JadwalService extends AbstractService
{
    public function ujianDiselesaikanOleh(string $id) {
        return PesertaUjian::select('jadwal_id')->where(['peserta_id'=>$id,'status_ujian'=>3])->get()->pluck('jadwal_id')->toArray();
    }
}
