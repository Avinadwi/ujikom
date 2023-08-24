<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk; //panggil model
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth; //jika pakai eloquent

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //query untuk grafik stok produk (bar chart)
        $ar_stok = DB::table('produks')
            ->select('nama_barang', 'stok')
            ->get();

        //query untuk menampilkan jumlah produk per kategori (pie chart)
        $ar_jumlah = DB::table('produks')
            ->select('nama_barang', 'stok')
            //  ->join('jenis', 'jenis.id', '=', 'produks.jenis_id')
            //   ->selectRaw('jenis.nama, count(produks.jenis_id) as jumlah')
            // ->groupBy('nama_barang')
            ->get();

        //query untuk menampilkan jumlah pelanggan
        $jml_pelanggan = DB::table('users')
            ->selectRaw('count(*) as jumlah')
            ->get();
        //dd('#################'.$jml_pelanggan);

        //query untuk menampilkan jumlah pesanan
        $jml_pesanan = DB::table('pesanans')
            ->selectRaw('count(*) as jumlah')
            ->get();

        return view('dashboard.index', compact('ar_stok', 'ar_jumlah', 'jml_pelanggan', 'jml_pesanan'));
    }
}
