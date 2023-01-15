<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjam extends Model
{
    use HasFactory;

    protected $table = 'pinjams';

    protected $fillable = [
        'status_id',
        'siswa_id',
        'sinopsis',
        'databuku_id',
        'book_id',
        'qty',
        'title',
        'user',
        'id_user',
        'expire_date',
        'borrow_date'
    ];
    public function status()
    {
        return $this->belongsTo(status::class, 'status_id');
    }
    public function databuku()
    {
        return $this->belongsTo(pinjam::class, 'databuku_id');
    }
}
