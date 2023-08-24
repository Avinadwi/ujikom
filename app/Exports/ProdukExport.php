<?php

namespace App\Exports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProdukExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $ar_produk = Produk::select('nama_barang', 'harga', 'berat', 'deskripsi', 'stok')->get();
        return $ar_produk;

        // return Produk::all();
    }

    public function headings(): array
    {
        return ['Nama Produk', 'Harga', 'Berat', 'Deskripsi', 'Stok'];
    }
}
