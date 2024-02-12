<?php

namespace App\Models;
use App\Traits\HasUuidModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaUjian extends Model
{
    use HasFactory,HasUuidModel;


    public function jadwal(){
        return $this->belongsTo(Jadwal::class);
    }
}
