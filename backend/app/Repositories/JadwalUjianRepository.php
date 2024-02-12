<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Jadwal;
use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * JadwalUjianRepository repository
 * @author dadanhidayat <dadan@gmail.com>
 */
final class JadwalUjianRepository extends AbstractRepository
{
    /**
     * Table of repository
     * @var Model $model
     */
    protected Model $model;

    public function __construct(){
        $this->model = new Jadwal;
    }
    /**
     * jadwal aktif pada hari ini
     * di cek dengan tanggal
     *
     * @return Collection
     */
    public function jadwalAktifHariIni() : Collection{
        return $this->model->whereStatus(true)->whereTanggal(DB::raw("CURRENT_DATE"))->with('event')->get();
    }
}
