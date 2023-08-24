<?php
namespace App\Exports;

use App\Models\Pesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PesananExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pesanan::join('users', 'users.id', '=', 'pesanans.user_id')
            ->join('pesanan_details', 'pesanan_details.pesanan_id', '=', 'pesanans.id')
            ->join('produks', 'produks.id', '=', 'pesanan_details.produk_id')
            ->select(
                'pesanans.id',
                'pesanans.tanggal',
                'users.name',
                'users.alamat',
                'users.nohp',
                'produks.nama_barang',
                'pesanan_details.jumlah',
                'pesanan_details.jumlah_harga',
                'pesanans.status_bayar'
            )
            ->get();
    }

    public function headings(): array
    {
        return ['No', 'Tgl Beli', 'Nama', 'Alamat', 'No Hp', 'Produk', 'JmlProduk', 'Harga', 'Status byr'];
    }
}
