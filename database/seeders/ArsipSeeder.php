<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArsipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('arsipsurat')->insert([
            [
                'nomor_surat' => '2022/PD3/TU/001',
                'id_kategori' => 1,
                'judul' => 'Nota Dinas WFH',
                'waktu_pengarsipan' => Carbon::now(),
            ],
        ]);
    }
}
