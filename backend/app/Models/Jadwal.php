<?php

namespace App\Models;
use App\Traits\HasUuidModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jadwal extends Model
{
    use HasFactory,HasUuidModel;
    /**
     * Undocumented function
     *
     * @return void
     */
    public function event() : BelongsTo{
        return $this->belongsTo(Event::class);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function getUjianAktif(){
        return $this->whereStatus(true)->get();
    }
    public function bank_soal(){
        return $this->belongsTo(BankSoal::class);
    }
    public function peserta_ujian(){
        return $this->hasMany(PesertaUjian::class);
    }
}
