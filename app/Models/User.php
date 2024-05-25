<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $guarded = ['id'];
    protected $hidden = ['password'];

    public function supplier(): HasMany
    {
        return $this->hasMany(Supplier::class);
    }

    public function jenis(): HasMany
    {
        return $this->hasMany(Jenis::class);
    }

    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class);
    }

}
