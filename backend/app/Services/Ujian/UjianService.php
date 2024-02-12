<?php

declare(strict_types=1);

namespace App\Services\Ujian;

use App\Models\BankSoal;
use App\Models\Jadwal;
use App\Models\Peserta;
use App\Models\PesertaUjian;
use App\Repositories\JadwalUjianRepository;
use App\Services\AbstractService;
use Ramsey\Uuid\Uuid;

/**
 * UjianService services
 * @author dadanhidayat <dadan@gmail.com>
 */
final class UjianService extends AbstractService
{

   public function __construct(
      public JadwalUjianRepository $jadwalUjianRepository = new JadwalUjianRepository,
      public JadwalService $jadwalService = new JadwalService
   ) {
   }

   public function ujianSelesai(string $pesertaID)
   {
      $jadwalAktifHariIni = $this->jadwalUjianRepository->jadwalAktifHariIni();
      // return $jadwalAktifHariIni;
      $ids = $jadwalAktifHariIni->pluck('id')->toArray();
      //mendapatan data dari tabel siswa_ujian
      return PesertaUjian::where('peserta_id', $pesertaID)
         ->where('status_ujian', 1)
         ->whereIn('jadwal_id', $ids)
         ->first();
   }
   public function jadwalUjianPeserta(string $pesertaID)
   {
      $agama = request()->get('data_peserta')->agama_id;
      $jadwals = $this->jadwalUjianRepository->jadwalAktifHariIni();
      $ujianSelesai = $this->jadwalService->ujianDiselesaikanOleh($pesertaID);
      $dataResponse = [];
      $jadwalValid = [];
      foreach ($jadwals as $jadwal) {
         if (in_array($jadwal->id, $ujianSelesai)) {
            continue;
         }
         $id_bankSoals = json_decode($jadwal->bank_soal_ids);
         $mengikuti_ujian = '';
         $bs = BankSoal::whereIn('id', $id_bankSoals)->with('matpel')->get();
         //each masing masing bank soal
         $soalBank = [];
         if ($bs) {
            foreach ($bs as $bankSoal) {
               $soalBank = $bankSoal;
               /**
                * cocokan agama penguna dengan agama yang ada di bank soal
                * jika cocok ya sudah
                * */
               if ($bankSoal->matpel->agama_id != null && Uuid::isValid($bankSoal->matpel->agama_id)) {
                  if ($agama == $bankSoal->matpel->agama_id) {
                     $soalBank = $bankSoal;
                     $mengikuti_ujian = $jadwal->id;
                     break;
                  }
               } else {
                  $mengikuti_ujian = $jadwal->id;
                  $soalBank = $bankSoal;
                  break;
               }
            }
            if ($mengikuti_ujian == '') {
               continue;
            }
            $dataResponse[] = [
               'id' => $jadwal->id,
               'nama' => $jadwal->nama,
               'waktu_mulai' => $jadwal->waktu_mulai,
               'tanggal' =>  now('Asia/Jakarta')->parse($jadwal->tanggal)->format('d-M-Y'),
               'lama_ujian' => $jadwal->lama_ujian." Menit",
               'status' => $jadwal->status == 1 ? true : false,
               'sesi' => $jadwal->sesi,
               'total_soal_pg' => $soalBank->total_soal_pg,
               'total_soal_essay' => $soalBank->total_soal_essay,
               'mata_pelajaran' => $soalBank->matpel->nama,
               'kode_mapel' => $soalBank->matpel->nama,
            ];
         }
      }
      return $dataResponse;
   }
}
