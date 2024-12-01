<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    // Menentukan nama tabel yang digunakan (jika tidak mengikuti konvensi Laravel)
    protected $table = 'categories';
    protected $primaryKey = 'id_kategori'; // Nama kolom identitas utama

    // Menentukan kolom mana saja yang dapat diisi
    protected $fillable = ['nama_kategori', 'keterangan'];

    // Relasi dengan ArsipSurat (one-to-many)
    public function arsipSurats()
    {
        return $this->hasMany(ArsipSurat::class, 'id_kategori', 'id_kategori');
    }
}
