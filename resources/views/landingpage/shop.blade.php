@extends('landingpage.index')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Zay Shop - Product Listing Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/templatemo.css">
        <link rel="stylesheet" href="assets/css/custom.css">

        <!-- Load fonts style after rendering the layout styles -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
        <link rel="stylesheet" href="assets/css/fontawesome.min.css">
        <!--
                                                                                                                                                                                                    
                                                                                                                                                                                                TemplateMo 559 Zay Shop

                                                                                                                                                                                                https://templatemo.com/tm-559-zay-shop

                                                                                                                                                                                                -->
    </head>

    <body>

        <!-- Close Header -->

        <!-- Modal -->
        <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="w-100 pt-1 mb-5 text-right">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="get" class="modal-content modal-body border-0 p-0">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="inputModalSearch" name="q"
                            placeholder="Search ...">
                        <button type="submit" class="input-group-text bg-success text-light">
                            <i class="fa fa-fw fa-search text-white"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>



        <!-- Start Content -->
        <div class="container py-5">
            <div class="row">
                <div class="row">
                    @foreach ($ar_shop as $data)
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    @empty($data->foto)
                                        <img src="{{ url('assets/img/nonphoto.jpg') }}" class="card-img rounded-0 img-fluid"
                                            alt="...">
                                    @else
                                        <img class="card-img rounded-0 img-fluid"
                                            src="{{ url('admin/assets/img') }}/{{ $data->foto }}">
                                    @endempty
                                </div>
                                <div class="card-body">
                                    <h2 class="h3 text-decoration-none">{{ $data->nama_barang }}</h2>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li> {{ $data->deskripsi }}</li>

                                    </ul>

                                    <p class="text-center mb-0">Rp. {{ number_format($data->harga, 0, ',', '.') }}</p>
                                    <a class="btn btn-success text-white mt-2"
                                        href="{{ url('/detailshop') }}/{{ $data->id }}"><i class="far fa-eye"></i></a>
                                    <a class="btn btn-success text-white mt-2" href="/pesan/{{ $data->id }}"><i
                                            class="fa fa-shopping-cart"></i> Pesan</a>
                                    {{-- <form method="post" action="{{ url('pesan') }}/{{ $data->id }}">
                                        @csrf
                                        <input type="text" name="jumlah_pesan" class="form-control" required="">
                                        <button type="submit" class="btn btn-primary mt-2"><i
                                                class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                                    </form> --}}
                                    {{-- <form action="{{ route('add_to_cart', $data) }}" method="post">
                                        @csrf
                                        <div class="py-1">
                                            <div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group"
                                                aria-label="...">
                                                <button type="button" class="m-btn btn btn-default"
                                                    onclick="decrementValue('amountInput{{ $data->id }}')"><i
                                                        class="fa fa-minus"></i></button>
                                                <input type="text" class="form-control" aria-describedby="basic-addon2"
                                                    name="amount" id="amountInput{{ $data->id }}" value="1"
                                                    min="1">
                                                <button type="button" class="m-btn btn btn-default"
                                                    onclick="incrementValue('amountInput{{ $data->id }}')"><i
                                                        class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="py-5">

                                            <a class="btn btn-success text-white mt-2"
                                                href="/detailshop/{{ $data->id }}"><i class="far fa-eye"></i></a>
                                            <button type="submit" class="btn btn-success btn-xl float-right">
                                                <i class="fa fa-cart-plus"></i> Add
                                            </button>
                                        </div>
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div div="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#"
                                tabindex="-1">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark"
                                href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark"
                                href="#">3</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        </div>
        <!-- End Content -->

        <!-- Start Brands -->




    </body>

    </html>
@endsection
