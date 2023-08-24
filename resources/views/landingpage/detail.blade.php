@extends('landingpage.index')
@section('content')
    <link href="{{ asset('admin/assets/css/containerdetail.css') }}" rel="stylesheet" />

    <div id="containerdetail">
        <div class="card border-secondary mb-3" style="max-width: 20rem; display: grid; place-items: center;">
            @empty($ditel->foto)
                <img src="{{ url('assets/img/noimage.jpg') }}" class="card-img-top" alt="...">
            @else
                <img src="{{ url('admin/assets/img') }}/{{ $ditel->foto }}" class="card-img-top" alt="...">
            @endempty
            <div class="card-body">
                <h4 class="card-title">{{ $ditel->nama_barang }}</h4>
                <p class="card-text">
                    <br />Harga Produk: Rp. {{ number_format($ditel->harga, 0, ',', '.') }}
                    <br />Stok Produk: {{ $ditel->stok }}
                    <br />Deskripsi: {{ $ditel->deskripsi }}
                    <br />Berat: {{ $ditel->berat }} g
                </p>
                <!-- <div class="goback"><a href="{{ url('/adproduk') }}" class="btn btn-primary">Go Back</a></div><br>-->
                <div class="goback"><a class="btn btn-info" href="{{ url('/shop') }}" title="back">Kembali</i></a></div>

                </p>
            </div>
        </div>
    </div>
@endsection
