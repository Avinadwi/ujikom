<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; //panggil model
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model;
use PDF;
use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dataBarang()
    {
        //
        $ar_produk = Produk::all(); // builder
        // yang saaya rubah landingpage.home |produk.index
        return view('landingpage.home', compact('ar_produk'));
    }

    public function tampilBarang()
    {
        //
        $ar_produks = Produk::all(); // builder
        // yang saaya rubah landingpage.home |produk.index
        return view('landingpage.home', compact('ar_produks'));
    }

    public function index()
    {
        //
        $ar_barang = Produk::all(); // builder

        //admin.sidebar
        return view('produk.index', compact('ar_barang'));
    }

    public function dataShop()
    {
        //
        $ar_shop = Produk::all(); // builder

        return view('landingpage.shop', compact('ar_shop'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('landingpage.home');
        $rs = Produk::all();
        return view('produk.form', compact('rs'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'kode' => 'required|max:6',
                'nama_barang' => 'required|max:45',
                'harga' => 'required',
                'berat' => 'required',
                'stok' => 'required',
                'deskripsi' => 'required',
                //  'foto' => 'nullable|max:45',
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'kode.required' => 'Kode Wajib Diisi',
                'kode.unique' => 'Kode Sudah Ada (Terduplikasi)',
                'kode.max' => 'Kode Maksimal 6 karakter',
                'nama_barang.required' => 'Nama Wajib Diisi',
                'nama_barang.max' => 'Nama Maksimal 45 karakter',
                'harga.required' => 'Harga Wajib Diisi',
                'harga.regex' => 'Harga Harus Berupa Angka',
                'berat.required' => 'Berat Wajib Diisi',
                'berat.regex' => 'Berat Harus Berupa Angka',
                'deskripsi.required' => 'Deskripsi Wajib Diisi',
                'stok.required' => 'Stok Wajib Diisi',
                'stok.integer' => 'Stok Harus Berupa Angka',
                'foto.min' => 'Ukuran file kurang 2 KB',
                'foto.max' => 'Ukuran file melebihi 100 KB',
                'foto.image' => 'File foto bukan gambar',
                'foto.mimes' => 'Extension file selain jpg,jpeg,png,gif,svg',
            ],
        );
        //Produk::create($request->all());
        //------------apakah user  ingin upload foto--------- --
        if (!empty($request->foto)) {
            $fileName = 'produk_' . $request->kode . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/assets/img'), $fileName);
        } else {
            $fileName = '';
        }
        //input data
        try {
            DB::table('produks')->insert([
                'kode' => $request->kode,
                'nama_barang' => $request->nama_barang,
                'harga' => $request->harga,
                'berat' => $request->berat,
                'stok' => $request->stok,
                'deskripsi' => $request->deskripsi,
                // 'foto'=>$request->foto,
                'foto' => $fileName,
                //'created_at'=>now(),
            ]);

            return redirect('/adproduk')->with('success', 'Data Produk Baru Berhasil Disimpan');
        } catch (\Exception $e) {
            //return redirect()->back()
            return back()->with('error', 'Terjadi Kesalahan Saat Input Data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = Produk::find($id);
        return view('produk.detail', compact('rs'));
    }

    public function detail(string $id)
    {
        $ditel = Produk::find($id);
        return view('landingpage.detail', compact('ditel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $row = Produk::find($id);
        return view('produk.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // $upd = Produk::find($id);

        $request->validate(
            [
                'kode' => 'required|max:6',
                'nama_barang' => 'required|max:45',
                'harga' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                'berat' => 'required|integer',
                'stok' => 'required|integer',
                'deskripsi' => 'required',
                //  'foto' => 'nullable|max:45',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'kode.required' => 'Kode Wajib Diisi',
                'kode.unique' => 'Kode Sudah Ada (Terduplikasi)',
                'kode.max' => 'Kode Maksimal 6 karakter',
                'nama_barang.required' => 'Nama Wajib Diisi',
                'nama_barang.max' => 'Nama Maksimal 45 karakter',
                'harga.required' => 'Harga Wajib Diisi',
                'harga.regex' => 'Harga Harus Berupa Angka',
                'berat.required' => 'Berat Wajib Diisi',
                'berat.regex' => 'Berat Harus Berupa Angka',
                'deskripsi.required' => 'Deskripsi Wajib Diisi',
                'stok.required' => 'Stok Wajib Diisi',
                'stok.integer' => 'Stok Harus Berupa Angka',
                'foto.min' => 'Ukuran file kurang 2 KB',
                'foto.max' => 'Ukuran file melebihi 100 KB',
                'foto.image' => 'File foto bukan gambar',
                'foto.mimes' => 'Extension file selain jpg,jpeg,png,gif,svg',
            ],
        );
        //Produk::create($request->all());
        //------------ambil foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('produks')
            ->select('foto')
            ->where('id', $id)
            ->get();
        foreach ($foto as $f) {
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user  ingin ubah upload foto baru--------- --
        if (!empty($request->foto)) {
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if (!empty($namaFileFotoLama)) {
                unlink('admin/assets/img/' . $namaFileFotoLama);
            }
            //lalukan proses ubah foto lama menjadi foto baru
            $fileName = 'produk_' . $request->kode . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('admin/assets/img'), $fileName);
        } else {
            $fileName = $namaFileFotoLama;
        }
        DB::table('produks')
            ->where('id', $id)
            ->update([
                'kode' => $request->kode,
                'nama_barang' => $request->nama_barang,
                'harga' => $request->harga,
                'berat' => $request->berat,
                'stok' => $request->stok,
                'deskripsi' => $request->deskripsi,
                // 'foto' => $request->foto,
                'foto' => $fileName,
            ]);

        return redirect('/adproduk')->with('success', 'Data Produk Baru Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
        $row = Produk::find($id);
        if (!empty($row->foto)) {
            unlink('admin/assets/img/' . $row->foto);
        }
        //hapus data di database

        Produk::where('id', $id)->delete();
        /* return redirect()->route('produk.index')
        ->with('succes','Data Produk Berhasil Dihapus');
 */ return back()->with('success', 'Data berhasil dihapus.');
        // atau
    }

    /*$ar_produk = Produk::findFail($id);
        $ar_produk->delete();
        return redirect()->route('produk.index')
            ->with('success', 'Data Produk Baru Berhasil Dihapus');
*/
    public function produkPDF()
    {
        $ar_produk = Produk::all(); //eloquent
        $pdf = PDF::loadView('produk.produk_pdf', ['ar_produk' => $ar_produk]);
        return $pdf->download('data_produk_' . date('d-m-Y') . '.pdf');
    }

    public function produkExcel()
    {
        return Excel::download(new ProdukExport(), 'data_produk_' . date('d-m-Y') . '.xlsx');
    }
}
