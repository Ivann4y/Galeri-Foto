<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_like';
    protected $guarded = ['id_like'];

    public function user(): BelongsTo
    {
        return $this -> belongsTo(User::class, 'id_user');
    }

    public function galeri(): BelongsTo
    {
        return $this -> belongsTo(Galeri::class, 'id_foto');
    }

}
