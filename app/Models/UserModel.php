<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Tymon\JWTAuth\Contracts\JWTSubject;// implementasi class Authenticable 

class UserModel extends Authenticatable implements JWTSubject
{
    use HasFactory;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'level_id', 
        'username', 
        'nama', 
        'password', 
        'created_at', 
        'updated_at', 
        'foto'
    ];

    protected $hidden = ['password']; // jangan ditampilkan saat select 

    protected $casts = ['password' => 'hashed']; // casting password agar otomatis di hash 

    /**
     * Relasi ke tabel level
     */
    public function level():BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id'); //
    }

    /**
     * Mendapatkan nama role 
     */
    public function getRoleName(): string
    {
        return $this->level->level_nama;
    }

    /**
     * Cek apakah user memiliki role tertentu 
     */
    public function hasRole($role): bool
    {
        return $this->level->level_kode == $role;
    }

    public function getRole()
    {
        return $this -> level ->level_kode;
    }
}