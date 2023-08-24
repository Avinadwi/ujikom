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
                    <div class="card border-secondary mb-3" style="max-width: 20rem; display: grid; place-items: center;">
                        @empty($rs->foto)
                            <img src="{{ url('admin/assets/img/noimage.jpg') }}" class="card-img-top" alt="...">
                        @else
                            <img src="{{ url('admin/assets/img') }}/{{ $rs->foto }}" class="card-img-top" alt="...">
                        @endempty
                        <div class="card-body">
                            <h4 class="card-title">{{ $rs->nama_barang }}</h4>
                            <p class="card-text">
                                <br />Kode Produk: {{ $rs->kode }}
                                <br />Harga Produk: Rp. {{ number_format($rs->harga, 0, ',', '.') }}
                                <br />Stok Produk: {{ $rs->stok }}
                                <br />Deskripsi: {{ $rs->deskripsi }}
                                <br />Berat: {{ $rs->berat }} g
                            </p>
                            <!-- <div class="goback"><a href="{{ url('/adproduk') }}" class="btn btn-primary">Go Back</a></div><br>-->
                            <div class="goback"><a class="btn btn-info" href="{{ url('/adproduk') }}"
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
