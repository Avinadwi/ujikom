@extends('landingpage.index')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ url('home') }}" class="btn btn-success text-white mt-2"><i class="fa fa-arrow-left"></i>
                        Kembali</a>
                </div>
                <!-- <div class="col-md-12 mt-2">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
                            </ol>
                        </nav>
                    </div> -->

                <div class="col-md-12">
                    <div class="content-wrapper">

                        <div class="alert alert-success" role="alert">
                            <h3 class="h3">Keterangan</h3>
                            <h5>Silahkan Upload Bukti Pembayaran Terlebih Dahulu dan Tunggu Admin untuk melakukan konfirmasi
                                pembayaran. Terimakasih
                            </h5>
                        </div>


                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h3><i class="fa fa-history"></i> Riwayat Pemesanan</h3>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Jumlah Harga</th>
                                            <th>Aksi</th>
                                            <th>Upload Bukti Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($pesanans as $pesanan)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $pesanan->tanggal }}</td>
                                                <td>{{ $pesanan->status_bayar }}</td>
                                                <td>Rp. {{ number_format($pesanan->jumlah_harga + $pesanan->kode) }}</td>
                                                <td>
                                                    <a href="{{ url('history') }}/{{ $pesanan->id }}"
                                                        class="btn btn-info"><i class="fa fa-info"></i> Detail</a>
                                                </td>
                                                <td>
                                                    @if ($pesanan->bukti_bayar)
                                                        Sudah Diunggah
                                                    @else
                                                        <form action="{{ route('upload.bukti', $pesanan->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="file" name="bukti_bayar">
                                                            <button type="submit" class="btn btn-primary">Upload</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




                </div>

            </div>
        </div>
    </div>
@endsection
