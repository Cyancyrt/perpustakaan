<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Datasiswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'datasiswas';

    protected $guard = 'siswas';

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
