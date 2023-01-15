<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Databuku extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'databukus';

    protected $with = ['kategori'];

    protected $fillable = [
        'bookid',
        'title',
        'sinopsis',
        'qty',
        'kategori_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['kategori'] ?? false, function ($query, $kategori) {
            return $query->whereHas('kategori', function ($query) use ($kategori) {
                $query->where('slug', $kategori);
            });
        });
    }
}
