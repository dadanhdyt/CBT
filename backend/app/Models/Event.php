<?php

namespace App\Models;
use App\Traits\HasUuidModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory,HasUuidModel;
    /**
     * Undocumented function
     *
     * @return BelongsTo
     */
    protected $fillable = [
        'nama'
    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];
    public function jadwal() : HasMany{
        return $this->hasMany(Jadwal::class);
    }
}
