<?php

namespace App\Models;
use App\Traits\HasUuidModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jadwal extends Model
{
    use HasFactory,HasUuidModel;
    /**
     * Undocumented function
     *
     * @return void
     */
    public function event() : HasMany{
        return $this->hasMany(Event::class);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function getUjianAktif(){
        return $this->whereStatus(true)->get();
    }
}
