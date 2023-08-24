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

                <div class="container-fluid px-4">
                    <h1 class="mt-4">Form Edit Produk</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="container px-5 my-5">
                        <form method="POST" action="{{ route('produk.update', $row->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-floating mb-3">
                                <input class="form-control" name="kode" value="{{ $row->kode }}" id="kode"
                                    type="text" placeholder="Kode" data-sb-validations="required" />
                                <label for="kode">Kode</label>
                                <div class="invalid-feedback" data-sb-feedback="kode:required">Kode is required.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="nama_barang" value="{{ $row->nama_barang }}"
                                    id="produk" type="text" placeholder="Produk" data-sb-validations="required" />
                                <label for="produk">Produk</label>
                                <div class="invalid-feedback" data-sb-feedback="produk:required">Produk is required.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="harga" value="{{ $row->harga }}" id="harga"
                                    type="text" placeholder="Harga" data-sb-validations="required" />
                                <label for="harga">Harga</label>
                                <div class="invalid-feedback" data-sb-feedback="harga:required">Harga is required.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="berat" value="{{ $row->berat }}" id="berat"
                                    type="text" placeholder="Berat" data-sb-validations="required" />
                                <label for="berat">Berat</label>
                                <div class="invalid-feedback" data-sb-feedback="berat:required">Berat is required.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="stok" value="{{ $row->stok }}" id="stok"
                                    type="text" placeholder="Stok" data-sb-validations="required" />
                                <label for="stok">Stok</label>
                                <div class="invalid-feedback" data-sb-feedback="stok:required">Stok is required.</div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="deskripsi" value="{{ $row->deskripsi }}" id="deskripsi"
                                    type="text" placeholder="Deskripsi" data-sb-validations="required" />
                                <label for="deskripsi">Deskripsi</label>
                                <div class="invalid-feedback" data-sb-feedback="deskripsi:required">Deskripsi is required.
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="foto" value="{{ $row->foto }}" id="foto"
                                    type="file" placeholder="Foto" data-sb-validations="required" />
                                <label for="foto">Foto</label>
                                <div class="invalid-feedback" data-sb-feedback="foto:required">Foto is required.</div>
                            </div>
                            <button class="btn btn-primary" name="proses" value="ubah" id="ubah"
                                type="submit">Ubah</button>
                            <a class="btn btn-info" href="{{ url('/produk') }}">Batal</a>

                        </form>
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
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
