<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'siswa';

    protected $table = 'datasiswas';

    protected $fillable = [
        'nisn',
        'name',
        'email',
        'username',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function pinjam()
    {
        return $this->hasMany(pinjam::class);
    }
}
