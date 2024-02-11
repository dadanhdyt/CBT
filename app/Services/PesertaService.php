<?php declare(strict_types=1);

namespace App\Services;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\PesertaRepository;
use App\Services\AbstractService;


/**
 * PesertaService services
 * @author dadanhidayat <dadan@gmail.com>
 */
final class PesertaService extends AbstractService
{
    public RepositoryInterface $pesertaRepository;
    public function __construct()
    {
        $this->pesertaRepository = new PesertaRepository();
    }
    public function login($data): mixed
    {
        //cek terlebih dahulu dengan
        $peserta = $this->pesertaRepository->findByNomorPeserta($data['kode_peserta']);
        if (!$peserta) {
            return false;
        }
        if (password_verify($data['password'], $peserta->password)) {
            $peserta->update([
                'api_token' => $peserta->id . "-" . rand() . uniqid(),
            ]);
            return $peserta;
        }
        return false;
    }
}
