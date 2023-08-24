@extends('landingpage.index')
@section('content')
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{ asset('assets/img/kerupuk_ikan.png') }}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Ranidan</b>Store</h1>
                                <h3 class="h2">Krupuk Kemplang</h3>
                                <p>
                                    Kerupuk kemplang merupakan kerupuk khas Kota Palembang atau
                                    beberapa tempat lain di Sumatera Selatan. Kerupuk kemplang terbuat dari
                                    bahan dasar seperti tepung tapioka, daging ikan putih, dan bahan-bahan
                                    bumbu lainnya. Selain di Provinsi Sumatera Selatan, kemplang juga menyebar
                                    hingga Provinsi Lampung dan Provinsi Bangka Belitung, tak heran kemplang
                                    sangat mudah ditemukan di kawasan Sumatera Bagian Selatan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{ asset('assets/img/gabus.png') }}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Krupuk Kemplang (Ikan Gabus)</h1>
                                <h3 class="h2" class="text-align-right">Krupuk kemplang terbaik adalah menggunakan Ikan
                                    Gabus</h3>
                                <p>
                                    Proses pembuatan kerupuk kemplang ini terbilang gampang-gampang susah.
                                    Daging ikan digiling halus, kemudian dicampur dengan
                                    sedikit air dan bumbu-bumbu penyedap, lalu diaduk hingga tercampur rata,
                                    kemudian adonan dicetak, dikukus, dipotong sesuai ukuran, dijemur hingga
                                    kering dan digoreng sampai kerupuk benar-benar mengembang.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{ asset('assets/img/pengusaha.jpg') }}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h2 class="h2">Penjual yang sukses dengan menjual kerupuk</h2>
                                <h3 class="h3">Toko Ema Mulyadi yang telah
                                    <br>sukses hanya dengan menjual kerupuk
                                </h3>
                                <p>
                                    Untuk menuju ke Toko Ema Mulyadi dari Pasar Shopping hanya berjarak 1 KM sembari
                                    menyusuri
                                    dan melihat keindahan cagar budaya yang berada dipinggiran sungai. Kemplang ikan gabus
                                    ini,
                                    timpal Rosdiah, sangat berbeda dengan kemplang ikan lainnya, dilihat dari komposisinya
                                    seperti,
                                    air, garam, ikan gabus, dan sagu, bisa membuat Anda akan mengulang-ngulangi memakan
                                    satu-persatu
                                    kerupuk ikan gabus ini.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>


    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                <div class="container section-title">
                    <h2 class="h1">Produk Kami</h2>
                    <p>

                    </p>
                </div>
                </div>
            </div>
            <div class="row">
                @foreach ($ar_produk as $data)
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="{{ url('/shop') }}">
                                @empty($data->foto)
                                    <img src="{{ url('assets/img/nonphoto.jpg') }}" class="card-img-top" alt="...">
                                @else
                                    <img src="{{ url('admin/assets/img') }}/{{ $data->foto }}" class="card-img-top">
                                @endempty
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li class="text-muted text-right">Rp. {{ number_format($data->harga, 0, ',', '.') }}
                                    </li>
                                </ul>
                                <a href="shop-single.html" class="h2 text-decoration-none text-dark">{{ $data->nama }}</a>
                                <p class="card-text">
                                    {{ $data->deskripsi }}
                                </p>
                                <p class="text-muted">Reviews (24)</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
