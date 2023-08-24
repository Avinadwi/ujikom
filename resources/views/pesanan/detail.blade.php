@extends('admin.index')
@section('content')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ url('/dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="{{ url('/produk') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-box-seam"></i></i></div>
                            Produk
                        </a>
                        <a class="nav-link" href="{{ url('/pelanggan') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
                            Pelanggan
                        </a>
                        <a class="nav-link" href="{{ url('/pesanan') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-cart"></i></div>
                            Pesanan
                        </a>





                        {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages

                        </a>

                        <a class="nav-link" href="{{ url('/login') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Login
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            About
                        </a> --}}
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <link href="{{ asset('admin/assets/css/containerdetail.css') }}" rel="stylesheet" />

                <div id="containerdetail">
                    <div class="card border-secondary mb-3" style="max-width: 35rem; display: grid; place-items: center;">
                        <h1>{{ $pesanan->user->name }}</h1>
                        @empty($pesanan->bukti_bayar)
                            <img src="{{ url('assets/img/noimage.jpg') }}" class="card-img-top" alt="...">
                        @else
                            <img src="{{ url('admin/assets/img/bukti_bayar') }}/{{ $pesanan->bukti_bayar }}"
                                class="card-img-top" alt="...">
                        @endempty
                        @foreach ($pesanan_details as $pesanan_detail)
                            <div class="card-body">
                                <h4 class="card-title">{{ $pesanan_detail->produk->nama_barang }}</h4>
                                <p class="card-text">
                                    <br />Harga Produk: Rp.
                                    {{ number_format($pesanan_detail->produk->harga, 0, ',', '.') }}
                                    <br />Berat Satuan: {{ $pesanan_detail->produk->berat }} g
                                    <br />Jumlah: {{ $pesanan_detail->jumlah }}
                                    <br />Jumlah Harga:
                                    {{ $pesanan_detail->jumlah_harga + $pesanan_detail->pesanan->kode }}
                                    <br />Berat Total: {{ $pesanan_detail->produk->berat * $pesanan_detail->jumlah }} g
                                </p>
                        @endforeach
                        <!-- <div class="goback"><a href="{{ url('/adproduk') }}" class="btn btn-primary">Go Back</a></div><br>-->
                        <div class="goback"><a class="btn btn-info" href="{{ url('pesanan') }}"
                                title="back">Kembali</i></a></div>

                        </p>
                    </div>

                </div>
        </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2021</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
@endsection
