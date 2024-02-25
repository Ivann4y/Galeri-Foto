<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;
    protected $primaryKey = 'id_user';
    protected $guarded = ['id_user'];
    public $timestamps = false;

    public function galeri(){
        return $this->hasMany(Galeri::class, 'id_user', 'id_user');
    }

    public function album(){
        return $this->hasMany(Album::class, 'id_user', 'id_user');
    }

    public function like(){
        return $this->hasMany(Like::class, 'id_user', 'id_user');
    }
}
