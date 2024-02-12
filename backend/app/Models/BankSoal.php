<?php

namespace App\Models;
use App\Traits\HasUuidModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSoal extends Model
{
    use HasFactory,HasUuidModel;
    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }
    public function matpel(){
        return $this->belongsTo(Matpel::class);
    }
    public function bankSoal(){
        return $this->hasMany(BankSoal::class);
    }
}
