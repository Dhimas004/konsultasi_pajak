<?php

require_once('./koneksi.php');



?>

<div class="banner">



    <script>
        // You can also use "$(window).load(function() {"

        $(function() {

            // Slideshow 4

            $("#slider3").responsiveSlides({

                auto: true,

                pager: true,

                nav: false,

                speed: 500,

                namespace: "callbacks",

                before: function() {

                    $('.events').append("<li>before event fired.</li>");

                },

                after: function() {

                    $('.events').append("<li>after event fired.</li>");

                }

            });

        });
    </script>

    <div id="top" class="callbacks_container">

        <ul class="rslides" id="slider3">

            <li>

                <div class="banner1">

                    <div class="container">

                        <div class="banner-info">

                            <h3>PT HSS TAX CONSULTING<span> Konsultasi Perpajakan Untuk Anda </span></h3>

                            <p style="color: #FDA30E; font-weight: bold;">PT HSS Tax Consulting adalah perusahaan yang bergerak di bidang konsultasi perpajakan, didirikan dengan tujuan memberikan layanan dan solusi terbaik bagi klien dalam menghadapi berbagai masalah perpajakan.</p>

                            <a href="#book" class="hvr-outline-out button2 scroll">Pelayanan Kami</a>

                        </div>

                    </div>

                </div>

            </li>

            <!-- <li>

                    <div class="banner2">

                        <div class="container">

                            <div class="banner-info2 text-center">

                                <h3>E-Hospital<span> Solusi Kesehatan Untuk Anda </span> Orang Tua,Dewasa Dan Anak"</h3>

                                <p>E-Hospital merupakan aplikasi yang mencakup bidang apotik yang dimana memanage data pembelian pasien secara detail</p>

                                <a href="#book" class="hvr-outline-out button2 scroll">Pelayanan Kami</a>

                            </div>

                        </div>

                    </div>

                </li>

                <li>

                    <div class="banner1">

                        <div class="container">

                            <div class="banner-info">

                                <h3>E-Hospital<span> Solusi Kesehatan Untuk Anda </span> Orang Tua,Dewasa Dan Anak"</h3>

                                <p>E-Hospital merupakan aplikasi yang mencakup bidang apotik yang dimana memanage data pembelian pasien secara detail</p>

                                <a href="#book" class="hvr-outline-out button2 scroll">Pelayanan Kami</a>

                            </div>

                        </div>

                    </div>

                </li> 

                <li>

                    <div class="banner2">

                        <div class="container">

                            <div class="banner-info2 text-center">

                                <h3>E-Hospital<span> Solusi Kesehatan Untuk Anda </span> Orang Tua,Dewasa Dan Anak"</h3>

                                <p>E-Hospital merupakan aplikasi yang mencakup bidang apotik yang dimana memanage data pembelian pasien secara detail</p>

                                <a href="#book" class="hvr-outline-out button2 scroll">Pelayanan Kami	</a>

                            </div>

                        </div>

                    </div>

                </li> -->

        </ul>

    </div>

    <div class="clearfix"></div>

</div>

<!-- //banner -->

<!-- services -->

<div class="services">

    <div class="container">

        <div class="col-md-4 services_left wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="0s">

            <h3>Pelayanan Kami</h3>

            <p class="ser-para">Menciptakan pelayan yang baik dan nyaman ,serta memberikan solusi terbaik untuk masalah pajak anda</p>

            <a href="#" class="hvr-outline-out button2">Lihat Tentang Kami</a>

            <script>
                // You can also use "$(window).load(function() {"

                $(function() {

                    // Slideshow 4

                    $("#slider4").responsiveSlides({

                        auto: true,

                        pager: true,

                        nav: false,

                        speed: 500,

                        namespace: "callbacks",

                        before: function() {

                            $('.events').append("<li>before event fired.</li>");

                        },

                        after: function() {

                            $('.events').append("<li>after event fired.</li>");

                        }

                    });

                });
            </script>

            <div class="clearfix"></div>

        </div>

        <div class="col-md-8 services_right ">

            <div class="list-left text-center wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="0.1s">

                <!-- <i class="fa-solid fa-id-card"></i> -->

                <span class="fa-solid fa-id-card" aria-hidden="true"></span>

                <h4>Layanan Pembuatan EFIN</h4>

                <!-- <p>Mengobati secara mendetail tentang penyakit anak</p> -->

            </div>

            <div class="list-left text-center wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">

                <span class="fa-solid fa-file-contract" aria-hidden="true"></span>

                <h4>Layanan Pelaporan Pajak</h4>

                <!-- <p>Mengobati organ - organ indra</p> -->

            </div>

            <div class="list-left text-center no_marg wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="0.3s">

                <span class="fa-solid fa-people-robbery" aria-hidden="true"></span>

                <h4>Konsultasi</h4>

                <!-- <p>Konsultasi bagi pasien dan ibu hamil</p> -->

            </div>

            <div class="list-left text-center no_marg wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="0.4s">

                <span class="fa-solid fa-file-signature" aria-hidden="true"></span>

                <h4>Pengurusan Surat Perizinan PT</h4>

                <!-- <p></p> -->

            </div>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>

<!-- //services -->

<!-- capabilities -->

<div class="capacity">

    <div class="container">

        <h3>Capabilities</h3>

        <div class="col-md-4 capabil_grid1 wow fadeInDownBig animated animated text-center" data-wow-delay="0.4s">

            <div class="capil_text">

                <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='700' data-delay='.5' data-increment="10">700</div>

                <p>Jumlah Pelayanan</p>

            </div>

        </div>

        <div class="col-md-4 capabil_grid2 wow fadeInUpBig animated animated text-center" data-wow-delay="0.4s">

            <div class="capil_text">

                <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='30' data-delay='.5' data-increment="10">30</div>

                <p>Karyawan</p>

            </div>

        </div>

        <div class="col-md-4 capabil_grid4 wow fadeInUpBig animated animated text-center" data-wow-delay="0.4s">

            <div class="capil_text">

                <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='100' data-delay='.5' data-increment="10">100</div>

                <p>Klien</p>

            </div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>

<script>
    jQuery3(document).ready(function() {

        jQuery3('#dashboard').addClass('menu__item--current');

    })



    $(document).ready(function() {

        $('#btn-booking').click(function() {

            let data = {};



            $('#book input').each(function() {

                console.log($(this));

                var name = $(this).attr('name');

                var value = $(this).val();

                console.log(`${name} : ${value}`);

                data[name] = value;

            })



            $('#book select').each(function() {

                var name = $(this).attr('name');

                var value = $(this).val();

                data[name] = value;

            })



            console.log(data);

        })

    })
</script>