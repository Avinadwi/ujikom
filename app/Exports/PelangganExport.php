<?php

namespace App\Exports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PelangganExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $ar_pelanggan = Pelanggan::select('name', 'email', 'alamat', 'nohp')->get();
        return $ar_pelanggan;
        // return Pelanggan::all();
    }

    public function headings(): array
    {
        return ['Nama', 'Email', 'Alamat', 'No HP'];
    }
}
