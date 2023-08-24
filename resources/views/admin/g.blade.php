@extends('admin.index')
@section('content')
<div class="card border-secondary mb-3" style="max-width: 20rem;">
@empty($rs->foto)
    	<img src="{{ url('assets/img/noimage.jpg') }}" class="card-img-top" alt="...">
    @else
        <img src="{{ url('assets/img')}}/{{$rs->foto}}" class="card-img-top" alt="...">
    @endempty
  <div class="card-body">
    <h4 class="card-title">{{ $rs->nama_barang }}</h4>
    <p class="card-text">	Kode Produk: {{ $rs->kode }}
			<br/>Harga Produk: Rp. {{ number_format($rs->harga,0,',','.') }}
			<br/>Stok Produk: {{ $rs->stok }}
			<br/>Deskripsi: {{ $rs->deskripsi }}</p>
            <a href="{{ url('/adproduk') }}" class="btn btn-primary">Go Back</a>

    </p>
  </div>
</div>
@endsection

@extends('admin.index')
@section('content')
<br>
<br>
<br>
<div class="card" style="width: 18rem;">
	@empty($rs->foto)
    	<img src="{{ url('assets/img/noimage.jpg') }}" class="card-img-top" alt="...">
    @else
        <img src="{{ url('assets/img')}}/{{$rs->foto}}" class="card-img-top" alt="...">
    @endempty
	<div class="card-body">
		<h5 class="card-title">{{ $rs->nama_barang }}</h5>
		<p class="card-text">
			Kode Produk: {{ $rs->kode }}
			<br/>Harga Produk: Rp. {{ number_format($rs->harga,0,',','.') }}
			<br/>Stok Produk: {{ $rs->stok }}
			
		</p>
		<a href="{{ url('/ad') }}" class="btn btn-primary">Go Back</a>
	</div>
</div>
@endsection


@extends('admin.index')
@section('content')
<br>
<br>
<br>

<div class="card border-primary mb-3" style="max-width: 20rem;">
  <div class="card-header"></div>
  @empty($rs->foto)
    	<img src="{{ url('assets/img/noimage.jpg') }}" class="card-img-top" alt="...">
    @else
        <img src="{{ url('assets/img')}}/{{$rs->foto}}" class="card-img-top" alt="...">
    @endempty
  <div class="card-body">
    <h4 class="card-title">{{ $rs->nama_barang }}</h4>
    <p class="card-text">	Kode Produk: {{ $rs->kode }}
			<br/>Harga Produk: Rp. {{ number_format($rs->harga,0,',','.') }}
			<br/>Stok Produk: {{ $rs->stok }}
			<br/>Deskripsi: {{ $rs->deskripsi }}</p>
            <a href="{{ url('/adproduk') }}" class="btn btn-primary">Go Back</a>
  </div>
</div>
@endsection

