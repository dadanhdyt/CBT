<?php

namespace App\Models;
use App\Traits\HasUuidModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory,HasUuidModel;
    public function peserta(){
        return $this->hasMany(Peserta::class,'agama_id');
    }
}
