<h3 align="center">Daftar Produk</h3>
<table border="1" align="center" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>

            <th>Produk</th>
            <th>Harga</th>
            <th>Stok</th>

        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($ar_produk as $data)
            <tr>
                <th>{{ $no }}</th>

                <td>{{ $data->nama_barang }}</td>
                <td>Rp. {{ number_format($data->harga, 0, ',', '.') }}</td>
                <td>{{ $data->stok }}</td>

            </tr>
            @php $no++ @endphp
        @endforeach
    </tbody>
