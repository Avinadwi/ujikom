@extends('landingpage.index')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ url('/shop') }}" class="btn btn-success text-white mt-2" title="Kembali"><i
                            class="fa fa-arrow-left"></i>
                        Kembali</a>
                </div>
                <div class="col-md-12 mt-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <!-- <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li> -->
                            <li class="breadcrumb-item active" aria-current="page">{{ $produk->nama_produk }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-12 mt-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ url('admin/assets/img') }}/{{ $produk->foto }}"
                                        class="rounded mx-auto d-block" width="100%" alt="">
                                </div>
                                <div class="col-md-6 mt-5">
                                    <h2>{{ $produk->nama_produk }}</h2>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Harga</td>
                                                <td>:</td>
                                                <td>Rp. {{ number_format($produk->harga) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Stok</td>
                                                <td>:</td>
                                                <td>{{ number_format($produk->stok) }}</td>
                                            </tr>

                                            <tr>
                                                <td>Keterangan</td>
                                                <td>:</td>
                                                <td>{{ $produk->deskripsi }}</td>
                                            </tr>
                                            <tr>
                                                <td>Berat</td>
                                                <td>:</td>
                                                <td>{{ $produk->berat }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Pesan</td>
                                                <td>:</td>
                                                <td>
                                                    <form method="post"
                                                        action="{{ url('pesanan') }}/{{ $produk->id }}">
                                                        @csrf
                                                        <input type="text" name="jumlah_pesan" class="form-control"
                                                            required=""><br>
                                                        <!-- <a  class="btn btn-success text-white mt-2" title="Masukkan Keranjang"><i class="fa fa-shopping-cart"></i>Masukkan Keranjang</a>   -->
                                                        <button type="submit" title="Masukkan Keranjang"
                                                            class="btn btn-success text-white mt-2"><i
                                                                class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
