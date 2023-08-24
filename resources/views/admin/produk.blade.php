@extends('admin.index')
@section('content')
<h3>Daftar Produk</h3>
</br>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<br />
<a href="" class="btn btn-primary">Tambah</a>
<table class="table table-hover datatable">
  <thead>
    <tr>
      <th>No</th>
      <th>Produk</th>
      <th>Harga</th>
      <th>Jenis</th>
      <th>Foto</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @php
    $no = 1;
    @endphp
    @foreach($ar_barang as $data) 
    <tr>
      <th>{{ $no }}</th>
      <td>{{ $data->nama_barang }}</td>
      <td>Rp. {{ number_format($data->harga,0,',','.') }}</td>
      <td>{{ $data->kategori }}</td>
      <td>
        @empty($data->foto)
        <img src="{{ url('assets/img/noimage.jpg') }}" width="15%" style="width: 50px;border-radius: 10px;">
        @else
        <img src="{{ url('assets/img')}}/{{$data->foto}}" width="15%" style="width: 50px;border-radius: 10px;">
        @endempty 
      </td>
      <td>
        <form method="POST" action="">
          <a class="btn btn-info" href="{{ route('produk.show',$data->id) }}" title="detail">
            <i class="bi bi-eye-fill"></i>
          </a>
          <a class="btn btn-warning" href="" title="ubah">   
            <i class="bi bi-pencil-fill"></i>
          </a>
          <!-- hapus data -->
          <button class="btn btn-danger" type="submit" title="Hapus"
          name="proses" value="hapus"
          onclick="return confirm('Anda Yakin Data Dihapus?')">    
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
@endsection