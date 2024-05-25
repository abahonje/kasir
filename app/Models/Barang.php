<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $guarded = ['id'];
    protected $hidden = ['user_id', 'jenis_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function jenis(): BelongsTo
    {
        return $this->belongsTo(Jenis::class);
    }

}
