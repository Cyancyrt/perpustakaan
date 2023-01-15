<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillabel = [
        'name'
    ];

    public function databuku()
    {
        return $this->hasMany(Databuku::class);
    }
}
