@extends('landingpage.index')
@section('content')
    <!-- Team Section - Home Page -->
    <section id="team" class="team">

        <!--  Section Title -->
        <div class="container section-title">
            <h2>Team</h2>
            <p>Hai perkenalkan kami dari kelompok 4 MSIB 4, project akhir ini sebagai bentuk hasil pencapaian kami dalam
                mengikuti kegiatan Kampus Merdeka. Kami membuat membuat website penjualan, produk yang kami dagangkan adalah
                Kerupuk Kemplang. Kerupuk Kemplang adalah salah satu makanan ringan yang berasal dari Sumatra Selatan dengan bahan dasar ikan. Kerupuk ini juga merupakan UMKM maysarakat setempat.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="col">
                <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example" data-bs-ride="carousel">
                    <!--Slides-->
                    <div class="carousel-inner product-links-wap" role="listbox">

                        <!--First slide-->
                        <div class="carousel-item active">
                            <div class="row gy-5">

                                <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                                    <div class="member-img">
                                        <img src="{{ asset('assets/img/team/Angga_.jpg') }}" class="img-fluid" alt="">
                                        <div class="social">
                                            <a href="https://www.facebook.com/profile.php?id=100007576277209"><i class="bi bi-facebook"></i></a>
                                            <a href="https://instagram.com/aanggastar?igshid=ZDc4ODBmNjlmNQ=="><i class="bi bi-instagram"></i></a>
                                            <a href="https://www.linkedin.com/in/angga-saputra-65149b221/"><i class="bi bi-linkedin"></i></a>
                                        </div>
                                    </div>
                                    <div class="member-info text-center">
                                        <h4>Angga Saputra</h4>
                                        <span>Front End</span>
                                        <p>Universitas Alma Ata</p>
                                    </div>
                                </div><!-- End Team Member -->

                                <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="200">
                                    <div class="member-img">
                                        <img src="{{ asset('assets/img/team/Reza.jpg') }}" class="img-fluid" alt="">
                                        <div class="social">
                                            <a href="https://www.facebook.com/reza.a.permana.58/"><i class="bi bi-facebook"></i></a>
                                            <a href="https://www.instagram.com/reza.adper/"><i class="bi bi-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="member-info text-center">
                                        <h4>Reza Aditya Permana</h4>
                                        <span>Ketua Kelompok</span>
                                        <p>Universitas Amikom Purwokerto</p>
                                    </div>
                                </div><!-- End Team Member -->

                                <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="300">
                                    <div class="member-img">
                                        <img src="{{ asset('assets/img/team/Nisaul.jpg') }}" class="img-fluid" alt="">
                                        <div class="social">
                                            <a href="https://www.facebook.com/nisaul.apriyanti"><i class="bi bi-facebook"></i></a>
                                            <a href="https://instagram.com/nisaulaprynt?igshid=MzRlODBiNWFlZA=="><i class="bi bi-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="member-info text-center">
                                        <h4>Nisaul Apriyanti</h4>
                                        <span>UI/UX</span>
                                        <p>Politeknik Negeri Banyuwangi</p>
                                    </div>
                                </div><!-- End Team Member -->

                            </div>
                        </div>
                        <!--End First slide-->



                        <!--Second slide-->
                        <div class="carousel-item">
                            <div class="row gy-5">
                                <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="200">
                                    <div class="member-img">
                                        <img src="{{ asset('assets/img/team/Reza.jpg') }}" class="img-fluid" alt="">
                                        <div class="social">
                                        <a href="https://www.facebook.com/reza.a.permana.58/"><i class="bi bi-facebook"></i></a>
                                            <a href="https://www.instagram.com/reza.adper/"><i class="bi bi-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="member-info text-center">
                                        <h4>Reza Aditya Permana</h4>
                                        <span>Ketua Kelompok</span>
                                        <p>Universitas Amikom Purwokerto</p>
                                    </div>
                                </div><!-- End Team Member -->


                                <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="400">
                                    <div class="member-img">
                                        <img src="{{ asset('assets/img/team/Nizar.jpg') }}" class="img-fluid" alt="">
                                        <div class="social">
                                        <a href="https://www.linkedin.com/in/nizar-arifin-90a545262"><i class="bi bi-linkedin"></i></a>
                                            <a href="https://instagram.com/agung18nizar?igshid=ZDc4ODBmNjlmNQ=="><i class="bi bi-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="member-info text-center">
                                        <h4>Nisar Arifin</h4>
                                        <span>Backend</span>
                                        <p>Politeknik Negeri Sriwijaya</p>
                                    </div>
                                </div><!-- End Team Member -->

                                <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="500">
                                    <div class="member-img">
                                        <img src="{{ asset('assets/img/team/Dimas.jpg') }}" class="img-fluid" alt="">
                                        <div class="social">
                                            <a href="https://www.facebook.com/ubi230902?mibextid=LQQJ4d"><i class="bi bi-facebook"></i></a>
                                            <a href="https://instagram.com/dimasarvianto?igshid=MmIzYWVlNDQ5Yg=="><i class="bi bi-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="member-info text-center">
                                        <h4>Dimas Prasetya Arvianto</h4>
                                        <span>Database</span>
                                        <p>Universitas Esa Unggul</p>
                                    </div>
                                </div><!-- End Team Member -->



                            </div>
                        </div>
                        <!--End Second slide-->

                    </div>
                    <!--End Slides-->
                </div>
            </div>
            <!--End Carousel Wrapper-->

        </div>
    </section><!-- End Team Section -->
@endsection
