@extends('landingpage.index')
@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-success text-white mt-2" href="{{ url('/shop') }}" title="back">Tambah Produk</a>
                </div>
                <!-- <div class="col-md-12 mt-2">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                                </ol>
                            </nav>
                        </div> -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h1><i class="fa fa-shopping-cart"></i> Check-Out</h1>
                            <div class="table-responsive">
                                @if (!empty($pesanan))
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Total Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($pesanan_details as $pesanan_detail)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>
                                                        <img src="{{ url('admin/assets/img') }}/{{ $pesanan_detail->produk->foto }}"
                                                            width="100px" alt="">
                                                    </td>
                                                    <td>{{ $pesanan_detail->produk->nama_barang }}</td>
                                                    <td>{{ $pesanan_detail->jumlah }}</td>
                                                    <td align="right">Rp.
                                                        {{ number_format($pesanan_detail->produk->harga) }}</td>
                                                    <td align="right">Rp.
                                                        {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                                    <td>
                                                        <a href="/check-out/{{ $pesanan_detail->id }}/delete"
                                                            onclick="return confirm('Yakin ingin menghapus barang dikeranjang?');">
                                                            <button type="submit" title="delete" class="btn btn-danger"><i
                                                                    class="fa fa-trash" aria-hidden="true"></i>
                                                                Hapus</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                                <td align="right"><strong>Rp.
                                                        {{ number_format($pesanan->jumlah_harga) }}</strong>
                                                </td>
                                                <td>
                                                    <a href="{{ url('konfirmasi-check-out') }}"
                                                        onclick="return confirm('Check Out???????????');">
                                                        <button title="Checkout" type="submit"
                                                            class="btn btn-outline-warning"><i class="fa fa-cart-plus"
                                                                aria-hidden="true"></i> Checkout</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
