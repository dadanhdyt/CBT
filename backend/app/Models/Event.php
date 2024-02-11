<?php

namespace App\Models;
use App\Traits\HasUuidModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory,HasUuidModel;
    /**
     * Undocumented function
     *
     * @return BelongsTo
     */
    public function jadwal() : BelongsTo{
        return $this->belongsTo(Jadwal::class);
    }
}
