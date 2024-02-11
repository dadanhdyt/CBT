<?php

namespace App\Models;
use App\Traits\HasUuidModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peserta extends Model
{
    use HasFactory,HasUuidModel;

    protected $fillable =  [
        'api_token'
    ];
    protected $hidden = [
        'password',
        'api_token'
    ];
    /**
     * Undocumented function
     *
     * @return BelongsTo
     */
    public function jurusan() : BelongsTo{
        return $this->belongsTo(Jurusan::class)->select(['id','nama']);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function agama() : BelongsTo{
        return $this->belongsTo(Agama::class)->select(['id','nama']);
    }

}
