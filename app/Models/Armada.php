<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Armada extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the pictures for the Armada
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class, 'armada_id', 'id');
    }
}
