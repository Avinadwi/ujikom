<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; //panggil model
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; 

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ar_contact = Contact::all();
        return view('landingpage.contact', compact('ar_contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $ab_contact = Contact::all();
        return view('landingpage.contact',compact('ab_contact'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {/*
        $request->validate([
            'nama' => 'required|max:45',
            'email' => 'required',
            'pesan' => 'required',
            
        ],
        [
            'nama.required'=>'Nama Wajib Diisi',
            'nama.max'=>'Nama Maksimal 45 karakter',
            'email.required'=>'email Wajib Diisi',
            'pesan.required'=>'pesan Wajib Diisi',
        ]
    );*/
    
    DB::table('contacts')->insert(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'pesan'=>$request->pesan,
                
            ]);
        return redirect()->route('pelanggan.index')
                        ->with('success','Data Produk Baru Berhasil Disimpan');
    }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
