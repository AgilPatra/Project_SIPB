<?php

namespace Database\Seeders;

use App\Models\denda;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        denda::create(['keterangan' => 'Keterlambatan 1-7 hari', 'jumlah' => 1000.00]);
        denda::create(['keterangan' => 'Keterlambatan 8-14 hari', 'jumlah' => 2000.00]);
        denda::create(['keterangan' => 'Keterlambatan lebih dari 14 hari', 'jumlah' => 5000.00]);
    }
}
