<?php declare(strict_types=1);

namespace App\Repositories;

use App\Models\Peserta;
use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * PesertaRepository repository
 * @author dadanhidayat <dadan@gmail.com>
 */
final class PesertaRepository extends AbstractRepository
{
    /**
     * Table of repository
     * @var Model $model
     */
    protected Model $model;

    public function __construct(){
        $this->model = new Peserta();
    }
    public function getByApiToken($apiToken){
        return $this->model->where('api_token',$apiToken)->first();
    }
    public function findByNomorPeserta(string $kodePeserta) {
        return $this->model->where('nomor_peserta',$kodePeserta)->first();

    }
}
