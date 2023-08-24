<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Produk;
use App\Models\Cart;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Alert;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index()
	{
		
		$produks= Produk::all(); // builder
        // yang saaya rubah landingpage.home |produk.index
        return view('landingpage.shop', compact('produks'));
	}

	public function dcart($id)
	{
		
		$data['produk'] = Produk::find($id);

		return view('landingpage.pesan', $data);
	}

	public function pesan(Request $request, $id)
	{
		$produk = Produk::where('id', $id)->first();

		if ($request->jumlah_pesan > $produk->stok) {
			return redirect('pesan/' . $id);
		}

		$cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

		if (empty($cek_pesanan)) {
			$pesanan = new Pesanan;
			$pesanan->user_id = Auth::user()->id;
			$pesanan->status = 0;
			$pesanan->jumlah_harga = 0;
			$pesanan->kode = mt_rand(100, 999);
			$pesanan->save();
		}

		$new_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

		$cek_pesanan_detail = PesananDetail::where('produk_id', $produk->id)->where('pesanan_id', $new_pesanan->id)->first();
		if (empty($cek_pesanan_detail)) {
			$pesanan_detail = new PesananDetail;
			$pesanan_detail->produk_id = $produk->id;
			$pesanan_detail->pesanan_id = $new_pesanan->id;
			$pesanan_detail->jumlah = $request->jumlah_pesan;
			$pesanan_detail->jumlah_harga = $produk->harga * $request->jumlah_pesan;
			$pesanan_detail->save();
		} else {
			$pesanan_detail = PesananDetail::where('produk_id', $produk->id)->where('pesanan_id', $new_pesanan->id)->first();
			$pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;
			$harga_pesanan_detail_baru = $produk->harga * $request->jumlah_pesan;
			$pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
			$pesanan_detail->update();
		}

		$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
		$pesanan->jumlah_harga = $pesanan->jumlah_harga + $produk->harga * $request->jumlah_pesan;
		$pesanan->update();

		return redirect('/check-out');
	}

	public function check_out()
	{
		
		$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
		$pesanan_details = [];
        
		if (!empty($pesanan)) {
			$pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            
		}
        
        

		return view('landingpage.cart', compact('pesanan', 'pesanan_details'));
	}

	public function delete($id)
	 {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();


        $pesanan_detail->delete();

        Alert::error('Pesanan Sukses Dihapus', 'Hapus');
        return redirect('check-out');
    }

     public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->alamat))
        {
            Alert::error('Identitasi Harap dilengkapi', 'Error');
            return redirect('profile');
        }

        if(empty($user->nohp))
        {
            Alert::error('Identitasi Harap dilengkapi', 'Error');
            return redirect('profile');
        }

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $produk = Produk::where('id', $pesanan_detail->produk_id)->first();
            $produk->stok = $produk->stok-$pesanan_detail->jumlah;
            $produk->update();
        }



        Alert::success('Pesanan Sukses Check Out Silahkan Lanjutkan Proses Pembayaran', 'Success');
        return redirect('history/'.$pesanan_id);

    }

    public function uploadFoto(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);

        if (!$pesanan) {
            // Handle jika pesanan tidak ditemukan
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }

        // Validasi input jika diperlukan
        $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

         if ($request->hasFile('bukti_bayar')) {
            $image = $request->file('bukti_bayar');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('admin/assets/img/bukti_bayar'), $imageName);

            // Simpan nama gambar ke dalam tabel
            // $pesanan = new Pesanan;
            $pesanan->bukti_bayar = $imageName;
            $pesanan->save();

        // if ($request->hasFile('bukti_bayar')) {
        //     $file = $request->file('bukti_bayar');

        //     // Simpan foto ke direktori yang sesuai (misalnya, storage/app/public/bukti_bayar)
        //     $path = $file->store('storage/app/public/bukti_bayar)');

        //     // Simpan path foto ke dalam model Pesanan
        //     $pesanan->bukti_bayar = $path;
        //     $pesanan->save();

            return redirect()->back()->with('success', 'Foto bukti pembayaran berhasil diunggah.');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah foto bukti pembayaran.');
    }
}
