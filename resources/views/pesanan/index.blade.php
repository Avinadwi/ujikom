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
                    <h1 class="mt-4">Daftar Pesanan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Daftar Pesanan</li>
                    </ol>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card mb-4">
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pelanggan</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        {{-- <th>Produk</th> --}}
                                        <th>Jumlah Harga</th>
                                        <th>Bukti Bayar</th>
                                        <th>Status</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <a href="{{ url('/pesanan-pdf') }}" class="btn btn-danger" title="Export to PDF">
                                        <i class="bi bi-file-earmark-pdf-fill"></i></a>
                                        <a href="{{ url('/pesanan-excel') }}" class="btn btn-success" title="Export to Excel">
                                        <i class="bi bi-file-earmark-excel-fill"></i>
                                    </a>
                                    {{-- <a class="btn btn-info" href="{{ route('pesanan.create') }}" title="detail">Tambah
                                        Barang
                                        <i class="bi bi-eye-fill"></i></a> --}}
                                    <!-- <a class="btn btn-primary" href= "{{ route('produk.create') }}">Tambah Barang</a> -->
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($ar_pesanan as $data)
                                        <tr>
                                            <th>{{ $no }}</th>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>{{ $data->nohp }}</td>
                                            {{-- <td>{{ $data->produk_id }}</td> --}}
                                            <td>Rp. {{ number_format($data->jumlah_harga + $data->kode, 0, ',', '.') }}
                                            </td>
                                            <td>
                                                @empty($data->bukti_bayar)
                                                    <img src="{{ url('admin/assets/img/noimage.jpg') }}" width="15%"
                                                        style="width: 50px;border-radius: 10px;">
                                                @else
                                                    <img src="{{ url('admin/assets/img/bukti_bayar') }}/{{ $data->bukti_bayar }}"
                                                        width="15%" style="width: 50px;border-radius: 10px;" alt="Foto">
                                                @endempty
                                            </td>
                                            <td>{{ $data->status_bayar }}</td>
                                            <td>{{ $data->tanggal }}</td>
                                            <!--<td>
                                                                                                                                            @empty($data->foto)
        <img src="{{ url('assets/img/noimage.jpg') }}" width="15%" style="width: 50px;border-radius: 10px;">
    @else
        <img src="{{ url('assets/img') }}/{{ $data->foto }}" width="15%" style="width: 50px;border-radius: 10px;">
    @endempty
                                                                                                                                        </td>-->
                                            <td>
                                                <form method="POST" action="{{ route('pesanan.destroy', $data->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-info" href="{{ route('pesanan.show', $data->id) }}"
                                                        title="detail">Detail
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <!-- ubah data -->
                                                    <a class="btn btn-warning"
                                                        href="{{ route('pesanan.edit', $data->id) }}" title="edit">Edit
                                                        Status Bayar
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
