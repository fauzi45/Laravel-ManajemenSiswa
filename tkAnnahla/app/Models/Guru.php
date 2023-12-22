<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guru extends Model
{
    protected $table = 'guru';
    protected $fillable = ['nama','telpon','alamat'];

    /**
     * Get all of the comments for the Guru
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mapel(): HasMany
    {
        return $this->hasMany(Mapel::class);
    }
}
