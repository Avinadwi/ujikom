<br>
<br>
<br>
<link href="{{ asset('admin/assets/css/containerdetail.css') }}" rel="stylesheet" />


<div id="containerdetail">
    <div class="card border-secondary mb-3" style="max-width: 20rem; display: grid; place-items: center;">
        @empty($rs->foto)
            <img src="{{ url('assets/img/noimage.jpg') }}" class="card-img-top" alt="...">
        @else
            <img src="{{ url('assets/img') }}/{{ $rs->foto }}" class="card-img-top" alt="...">
        @endempty
        <div class="card-body">
            <h4 class="card-title">{{ $rs->nama_barang }}</h4>
            <p class="card-text"> Kode Produk: {{ $rs->kode }}
                <br />Harga Produk: Rp. {{ number_format($rs->harga, 0, ',', '.') }}
                <br />Stok Produk: {{ $rs->stok }}
                <br />Deskripsi: {{ $rs->deskripsi }}
                <br />Berat: {{ $rs->berat }}
            </p>
            <div class="goback"><a href="{{ url('/adproduk') }}" class="btn btn-primary">Go Back</a></div><br>
            <div class="goback"><a class="btn btn-info" href="{{ url('/adproduk') }}" title="detail">Kembali<i
                        class="bi bi-eye-fill"></i></a></div>
            </p>
        </div>
    </div>
</div>
