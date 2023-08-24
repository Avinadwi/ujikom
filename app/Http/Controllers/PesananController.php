<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pesanan; //panggil model
use App\Models\Pelanggan;
use App\Models\Cart;
use App\Models\Produk;
use App\Models\PesananDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Alert;
use PDF;
use App\Exports\PesananExport;
use Maatwebsite\Excel\Facades\Excel;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ar_pesanan = Pesanan::all();

        /*
        $ar_pesanan = Keranjang::all();
        $ar_pesanan = Pelanggan::all(); //builder
        */
        $ar_pesanan = DB::table('pesanans')
            ->join('users', 'users.id', '=', 'pesanans.user_id')

            ->select('pesanans.*', 'users.name', 'users.email', 'users.alamat', 'users.nohp')
            ->orderBy('pesanans.id', 'desc')
            ->get();
        return view('pesanan.index', compact('ar_pesanan'));
        /* $ar_pesanan = DB::table('pesanans')
        ->join('carts','carts.id','=','pesanans.user_id')
        ->select('pesanans.*', 'users.name', 'users.email','users.alamat','users.nohp')
        ->orderBy('pesanans.id', 'desc')
        ->get();*/
    }
    public function dataBarang()
    {
        $ar_barang = Pesanan::all(); //eloquent
        return view('pesanan.index', compact('ar_barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $ar_pesanan = Pesanan::all();
        return view('pesanan.form', compact('ar_pesanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $carts = Cart::with('produk')->get();

            $total = 0;

            foreach ($carts as $cart) {
                $total += (int) $cart->produk->harga * (int) $cart->jumlah_barang;
            }

            // Generate Invoice Code
            $length = 10;
            $random = '';
            $characters = array_merge(range('A', 'Z'), range('0', '9'));
            $max = count($characters) - 1;
            for ($i = 0; $i < $length; $i++) {
                $rand = mt_rand(0, $max);
                $random .= $characters[$rand];
            }
            $kode = 'POS-' . $random;

            $pesanan = Pesanan::create([
                'user_id' => auth()->user()->id,
                'kode' => $kode,
                'jumlah_harga' => $jumlah_harga,
            ]);

            foreach ($carts as $cart) {
                $produk = Produk::where('id', $cart->produk_id)->first(['id', 'nama_barang', 'harga', 'berat', 'deskripsi', 'stok', 'foto']);

                PesananDetail::create([
                    'pesanan_id' => $pesanan->id,
                    'produk' => $produk,
                    'jumlah' => $cart->jumlah_barang,
                    'harga' => $produk->harga,
                ]);

                // Kurangi stok produk
                $current_stok = $produk->stok - $cart->jumlah_barang;
                $produk->update([
                    'stok' => $current_stok,
                ]);

                // hapus data produk yang di cart
                $cart->delete();
            }

            DB::commit();
            return view('pages.prints.invoice', [
                'data' => pesanan::with('user', 'pesanan_details')->findOrFail($pesanan->id),
            ]);
            // dd(pesanan::where('id', $pesanan->id)->with('pesanan_details')->get());
        } catch (\Exception $e) {
            DB::rollBack();
            // dd($e);
            return redirect()->back();
        }
        //  //proses input produk dari form
        // $request->validate([
        //     'nama_pesanan' => 'required|max:45',
        //     'harga' => 'required|regex:/^[0-9]+(.[0-9][0-9]?)?$/',
        //     'berat' => 'required',
        //     'stok' => 'required',
        //     'deskripsi' => 'required',
        //   //  'foto' => 'nullable|max:45',

        // ],
        // [
        //     'nama_barang.required'=>'Nama Wajib Diisi',
        //     'nama_barang.max'=>'Nama Maksimal 45 karakter',
        //     'harga.required'=>'Harga Wajib Diisi',
        //     'harga.regex'=>'Harga Harus Berupa Angka',
        //     'berat.required'=>'Berat Wajib Diisi',
        //     'berat.regex'=>'Berat Harus Berupa Angka',
        //     'deskripsi.required'=>'Deskripsi Wajib Diisi',
        //     'stok.required'=>'Stok Wajib Diisi',
        //     'stok.integer'=>'Stok Harus Berupa Angka',
        //   //  'foto.required'=>'Foto Harus Berupa Angka',
        // ]);
        // DB::table('pesanan')->insert(
        //     [
        //         'nama_pesanan' =>$request->nama_pesanan,
        //         'harga' =>$request->harga,
        //         'berat' =>$request->berat,
        //         'stok' =>$request->stok,
        //         'deskripsi' =>$request->deskripsi,
        //     ]
        //     );
        //     return redirect()-route('pesanan.index')
        //     ->with('succes','Data Pesanan Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        return view('pesanan.detail', compact('pesanan', 'pesanan_details'));
        //
        // $rs = Pesanan::find($id);
        // return view('pesanan.detail', compact('rs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ar_row = Pesanan::all();
        $row = Pesanan::find($id);
        return view('pesanan.edit', compact('ar_row', 'row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'status_bayar' => 'required',

            //  'foto' => 'nullable|max:45',
        ]);
        DB::table('pesanans')
            ->where('id', $id)
            ->update([
                'status_bayar' => $request->status_bayar,
            ]);

        return redirect()
            ->route('pesanan.index')
            ->with('success', 'Status Baru Berhasil Disimpan');
        /*
    Pesanan::where('id',$id)->delete();
    return redirect()->route('pesanan.index')
    ->with('success','Data Pelanggan Berhasil Dihapus');
    return redirect('/pesanan')
    ->with('success','Data Pelanggan Berhasil Diubah');
*/
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Pesanan::where('id', $id)->delete();
        return redirect()
            ->route('pesanan.index')
            ->with('success', 'Data Pelanggan Berhasil Dihapus');
    }

    public function pesananPDF()
    {
        $pesanan = Pesanan::all();
        $pesanan_details = PesananDetail::all(); //eloquent
        $data = [
            'pesanan' => $pesanan,
            'pesanan_details' => $pesanan_details,
        ];
        $pdf = PDF::loadView('pesanan.pesanan_pdf', $data);
        return $pdf->download('data_pesanan_' . date('d-m-Y') . '.pdf');
    }
    public function pesananExcel()
    {
        return Excel::download(new PesananExport(), 'data_pesanan_' . date('d-m-Y') . '.xlsx');
    }
}
