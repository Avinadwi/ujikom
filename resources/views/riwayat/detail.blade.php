@extends('landingpage.index')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ url('history') }}" class="btn btn-success text-white mt-2"><i class="fa fa-arrow-left"></i>
                        Kembali</a>
                </div>
                <div class="col-md-12 mt-2">
                    <!-- <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pemesanan</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                                </ol>
                            </nav> -->
                </div>
                <div class="col-md-12">
                    <div class="content-wrapper">
                        <div class="card">

                            <span class="badge text-bg-success">
                                <h3>Sukses Check Out</h3>
                                <h5>Pesanan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di
                                    rekening
                                </h5>
                                <h5><strong>Bank BRI Nomer Rekening : 32133-234125-123</strong></h5>
                                <h5><strong>Bank BNI Nomer Rekening : 3214231</strong></h5>
                                <h5>dengan nominal : <strong>Rp.
                                        {{ number_format($pesanan->kode + $pesanan->jumlah_harga) }}</strong>
                                </h5>
                            </span>
                            <!-- <h3>Sukses Check Out</h3>
                                    <h5>Pesanan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di rekening
                                    </h5>
                                    <h5><strong>Bank BRI Nomer Rekening : 32133-234125-123</strong></h5>
                                    <h5><strong>Bank BNI Nomer Rekening : 3214231</strong></h5>
                                    <h5>dengan nominal : <strong>Rp.
                                            {{ number_format($pesanan->kode + $pesanan->jumlah_harga) }}</strong>
                                    </h5> -->
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                            @if (!empty($pesanan))
                                <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($pesanan_details as $pesanan_detail)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>
                                                        <img src="{{ url('admin/assets/img') }}/{{ $pesanan_detail->produk->foto }}"
                                                            width="100" alt="...">
                                                    </td>
                                                    <td>{{ $pesanan_detail->produk->nama_barang }}</td>
                                                    <td>{{ $pesanan_detail->jumlah }}</td>
                                                    <td align="right">Rp.
                                                        {{ number_format($pesanan_detail->produk->harga) }}</td>
                                                    <td align="right">Rp.
                                                        {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                                <td align="right"><strong>Rp.
                                                        {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" align="right"><strong>Kode Unik :</strong></td>
                                                <td align="right"><strong>Rp. {{ number_format($pesanan->kode) }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" align="right"><strong>Total yang harus ditransfer
                                                        :</strong></td>
                                                <td align="right"><strong>Rp.
                                                        {{ number_format($pesanan->kode + $pesanan->jumlah_harga) }}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>


                </div>

                <div class="btn" style="display: flex; justify-content: flex-start;">
                    <div class="col-md-12">
                        <a href="{{ url('history') }}" class="btn btn-primary" style="background-color: green;"><i
                                class="fa fa-arrow-right"></i> Bayar</a>
                    </div>
                </div>

            </div>

        </div>

    </div>


    </div>
    </div>
@endsection
