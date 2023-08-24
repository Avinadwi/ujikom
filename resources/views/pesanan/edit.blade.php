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
                    <h1 class="mt-4">Form Edit Pesanan</h1>
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

                        <form method="POST" action="{{ route('pesanan.update', $row->id) }}" id="contactForm"
                            data-sb-form-api-token="API_TOKEN">
                            @csrf
                            @method('PUT')

                            <!-- <div class="form-floating mb-3">
                                                                <input class="form-control" name="status" value="{{ $row->alamat }}" id="alamat" type="text" placeholder="Alamat" data-sb-validations="required" />
                                                                <label for="alamat">Status</label>
                                                                <div class="invalid-feedback" data-sb-feedback="alamat:required">Alamat is required.</div>
                                                            </div> -->

                            <div class="mb-3">
                                <label class="form-label d-block">Status</label>
                                <div class="form-check form-check-inline">
                                    <label for="status">
                                        <input type="radio" name="status_bayar" value="Belum Bayar" id="status_bayar"
                                            {{ $row->status_bayar == 'Belum Bayar' ? 'checked' : '' }}>Belum Bayar
                                        <input type="radio" name="status_bayar" value="Sudah Bayar" id="status_bayar"
                                            {{ $row->status_bayar == 'Sudah Bayar' ? 'checked' : '' }}>Sudah Bayar
                                    </label>
                                </div>
                            </div>
                            <!--<select class="form-select" name="status" aria-label="Status">
                                                        <option value="">Status</option>
                                                        
                                                        
                                                        <option value="{{ $row->id }}" >{{ $row->status }}</option>
                                                        <option value="{{ $row->id }}" >{{ $row->status }}</option>
                                                        
                                                    </select>
                                                    <label for="status">Status</label>-->


                            <button class="btn btn-primary" name="proses" value="ubah" id="ubah"
                                type="submit">Ubah</button>
                            <a class="btn btn-info" href="{{ url('/pesanan') }}">Batal</a>

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
