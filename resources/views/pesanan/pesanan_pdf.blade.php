<h3 align="center">
    Daftar Pesanan</h3>
<table border="1" align="center" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Beli beli</th>
            <th>Nama</th>
            {{-- <th>Email</th> --}}
            <th>Alamat</th>
            <th>No Hp</th>
            <th>Produk</th>
            <th>jml</th>

            <th>Jml hrg</th>
            <th>Status byr</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($pesanan_details as $data)
            <tr>
                <th>{{ $no }}</th>
                <td>

                    {{ $data->tanggal }}

                </td>
                <td>{{ $data->pesanan->user->name }}</td>
                {{-- <td>{{ $data->user->email }}</td> --}}
                <td>{{ $data->pesanan->user->alamat }}</td>
                <td>{{ $data->pesanan->user->nohp }}</td>

                <td>
                    {{ $data->produk->nama_barang }}
                    {{-- @foreach ($pesanan_details as $datas)
                        ({{ $datas->tanggal }})
                        {{ $datas->produk->nama_barang }}
                        <br>
                    @endforeach --}}
                </td>
                <td>
                    {{ $data->jumlah }}
                    {{-- @foreach ($pesanan_details as $datas)
                        ({{ $datas->jumlah }})
                        <br>
                    @endforeach --}}
                </td>
                {{-- @foreach ($pesanan_details as $datas)
                    <td>

                        {{ $datas->jumlah }}

                    </td>
                @endforeach --}}


                {{-- <td>{{ $data->produk_id }}</td> --}}
                <td>Rp. {{ number_format($data->jumlah_harga, 0, ',', '.') }}</td>

                {{-- <td>
                    @empty($datas->bukti_bayar)
                        <img src="{{ url('admin/assets/img/noimage.jpg') }}" width="15%"
                            style="width: 50px;border-radius: 10px;">
                    @else
                        <img src="{{ url('admin/assets/img/bukti_bayar') }}/{{ $data->bukti_bayar }}" width="15%"
                            style="width: 50px;border-radius: 10px;" alt="Foto">
                    @endempty
                </td> --}}
                <td>{{ $data->pesanan->status_bayar }}</td>
            </tr>
            @php $no++ @endphp
        @endforeach
    </tbody>
