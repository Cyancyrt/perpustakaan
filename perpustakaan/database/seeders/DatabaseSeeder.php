<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Databuku;
use App\Models\Datasiswa;
use App\Models\Kategori;
use App\Models\status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Admin::create([
            'uuid' => '1234',
            'name' => 'admin',
            'password' => bcrypt('admin')
        ]);
        Datasiswa::create([
            'nisn' => '234',
            'name' => 'siswa',
            'email' => 'akihasora123@gmail.com',
            'username' => 'Cyan',
            'password' => bcrypt('siswa')
        ]);
        Datasiswa::create([
            'nisn' => '1234',
            'name' => 'siswi',
            'email' => 'lala@gmail.com',
            'username' => 'Lily',
            'password' => bcrypt('siswa')
        ]);
        Databuku::create([
            'kategori_id' => '1',
            'bookid' => '234',
            'title' => 'cross of the six people',
            'sinopsis' => 'bales dendam nya anak SMA, ga sadis cuma saling bantai aja sampe organ dalam keluar dan tulang patah',
            'qty' => 2,
            'image' => 'MCManga.webp'
        ]);
        Databuku::create([
            'kategori_id' => '1',
            'bookid' => '244',
            'title' => 'masaccre happy end',
            'sinopsis' => 'cuma bunuh bunuhan aja gak sadis banget paling kebelah belah, dikuliti dan ambil organ dalam',
            'qty' => 2,
            'image' => 'ILVTHIS.jpg'
        ]);
        Kategori::create([
            'name' => 'pendidikan non formal',
            'slug' => 'pendidikan-non-formal'
        ]);
        Kategori::create([
            'name' => 'pendidikan formal',
            'slug' => 'pendidikan-formal'
        ]);
        status::create([
            'name' => 'konfirmasi admin'
        ]);
        status::create([
            'name' => 'dipinjam'
        ]);
        status::create([
            'name' => 'dikembalikan'
        ]);
    }
}
