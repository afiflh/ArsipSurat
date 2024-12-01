<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArsipSurat extends Model {

    // Nama tabel di database (jika berbeda dengan konvensi Laravel)
    protected $table = 'arsipsurat';
    protected $primaryKey = 'id_surat';

    // Jika Anda menggunakan timestamp otomatis untuk created_at dan updated_at, hilangkan baris ini
    public $timestamps = false;

    // Tentukan kolom-kolom yang dapat diisi massal
    protected $fillable = [
        'nomor_surat',
        'id_kategori',
        'judul',
        'file_pdf', // Menyimpan path file PDF
    ];

    // Relasi dengan model Category (many-to-one)
    public function kategori()
{
    return $this->belongsTo(CategoryModel::class, 'id_kategori', 'id_kategori');
}

    // Jika ingin menambahkan properti waktu secara otomatis (misalnya, waktu_pengarsipan sebagai Carbon instance)
    protected $casts = [
        'waktu_pengarsipan' => 'datetime', // konversi waktu_pengarsipan menjadi objek Carbon
    ];

}