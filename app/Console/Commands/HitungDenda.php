<?php

namespace App\Console\Commands;

use App\Models\pinjam;
use Carbon\Carbon;
use Illuminate\Console\Command;

class HitungDenda extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:hitung-denda';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hitung denda untuk peminjaman yang terlambat';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Menghitung denda...');

        $peminjamans = pinjam::where('status_pengembalian', 'Belum Kembali')
            ->where('tanggal_pengembalian', '<', Carbon::now())
            ->get();

        foreach ($peminjamans as $peminjaman) {
            $tanggalKembali = Carbon::parse($peminjaman->tanggal_pengembalian);
            $tanggalSekarang = Carbon::now();
            $selisihHari = $tanggalKembali->diffInDays($tanggalSekarang);

            $denda = Denda::where('keterangan', 'Keterlambatan ' . $selisihHari . ' hari')->first();

            if ($denda) {
                $dendaPerHari = $denda->jumlah;
                $totalDenda = $selisihHari * $dendaPerHari;

                $peminjaman->update(['denda' => $totalDenda]);
            }
        }

        $this->info('Denda berhasil dihitung.');
    }

}
