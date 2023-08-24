<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan; //panggil model
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; 
use PDF;
use App\Exports\PelangganExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ar_pelanggan = Pelanggan::where('role', '!=','Admin')->get(); // builder
// yang saaya rubah landingpage.home |produk.index
        return view('pelanggan.index', compact('ar_pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rs = Pelanggan::all();
        return view('pelanggan.form',compact('rs'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
   {
        
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Pelanggan::find($id);
        return view('pelanggan.edit', compact('row'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        
        $request->validate([
            'name' => 'required|max:45',
            'email' => 'required',
            'alamat' => 'required',
            'nohp' => 'required|string|max:12',

        ],
        /*[
            'name.required'=>'Nama Wajib Diisi',
            'name.max'=>'Nama Maksimal Dapat diisi 45 karakter',
            'email.required'=>'Email Wajib Diisi',
            'email.email'=>'Wajib Diisi Alamat Email Yang Valid',
            'email.unique'=>'Email Tidak Boleh Sama',
            'nohp.required'=>'Nohhp Wajib Diisi Maksimal 12 Karakter',

        ]*/
    );

        
        DB::table('users')->where('id',$id)->update(
            [
                'name'=>$request->name,
                'email'=>$request->email,
              //  'password'=>$request->password,
                'alamat'=>$request->alamat,
                'nohp'=>$request->nohp,

            ]
            );
            /*
            $row = Pelanggan::find($id);
            $row->update($request->all());*/
            return redirect()->route('pelanggan.index')
                        ->with('success','Data Produk Baru Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Pelanggan::where('id',$id)->delete();
        return redirect()->route('pelanggan.index')
        ->with('success','Data Pelanggan Berhasil Dihapus');
    }

    public function pelangganPDF()
    {
        $ar_pelanggan = Pelanggan::all(); //eloquent
        $pdf = PDF::loadView('pelanggan.pelanggan_pdf', ['ar_pelanggan' => $ar_pelanggan]);
        return $pdf->download('data_pelanggan_' . date('d-m-Y') . '.pdf');
    }

    public function pelangganExcel()
    {
        return Excel::download(new PelangganExport(), 'data_pelanggan_' . date('d-m-Y') . '.xlsx');
    }
}
