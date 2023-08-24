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
                        <a class="nav-link" href="{{ url('/adproduk') }}">
                            <div class="sb-nav-link-icon"><i class="bi bi-box-seam"></i></i></div>
                            Produk
                        </a>
                        <a class="nav-link" href="{{ url('/adpelanggan') }}">
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
                    <h1 class="mt-4">Daftar Produk</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Daftar Produk</li>
                    </ol>
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <div class="card mb-4">
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <a class="btn btn-primary" href="{{ route('produk.create') }}" title="detail">
                                        <i class="bi bi-plus-square"></i></a>
                                    <a href="{{ url('/produk-pdf') }}" class="btn btn-danger" title="Export to PDF">
                                        <i class="bi bi-file-earmark-pdf-fill"></i></a>
                                    <a href="{{ url('/produk-excel') }}" class="btn btn-success" title="Export to Excel">
                                        <i class="bi bi-file-earmark-excel-fill"></i>
                                    </a>
                                    </a>
                                    <!-- <a class="btn btn-primary" href= "{{ route('produk.create') }}">Tambah Barang</a> -->
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($ar_barang as $data)
                                        <tr>
                                            <th>{{ $no }}</th>
                                            <td>{{ $data->kode }}</td>
                                            <td>{{ $data->nama_barang }}</td>
                                            <td>Rp. {{ number_format($data->harga, 0, ',', '.') }}</td>
                                            <td>{{ $data->stok }}</td>
                                            <td>
                                                @empty($data->foto)
                                                    <img src="{{ url('admin/assets/img/noimage.jpg') }}" width="15%"
                                                        style="width: 50px;border-radius: 10px;">
                                                @else
                                                    <img src="{{ url('admin/assets/img') }}/{{ $data->foto }}"
                                                        width="15%" style="width: 50px;border-radius: 10px;">
                                                @endempty
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('produk.destroy', $data->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-info" href="{{ route('produk.show', $data->id) }}"
                                                        title="detail">Detail
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <!-- ubah data -->
                                                    <a class="btn btn-warning" href="{{ route('produk.edit', $data->id) }}"
                                                        title="edit">Edit
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </a>
                                                    <!-- hapus data -->
                                                    <button class="btn btn-danger" type="submit" title="delete"
                                                        name="proses" value="hapus"
                                                        onclick="return confirm('Anda Yakin Data Dihapus?')">Delete
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                    <input type="hidden" name="idx" value="" />

                                                </form>
                                            </td>
                                        </tr>
                                        @php $no++ @endphp
                                    @endforeach
                                </tbody>
                            </table>
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
