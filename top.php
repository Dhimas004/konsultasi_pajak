<?php
error_reporting(0);
session_start();
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title>PT HSS TAX CONSULTING</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Fontawesome -->
    <link rel="stylesheet" href="./fontawesome/css/all.css">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./images/favicon.jpg">

    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/highcharts.js"></script>
    <script type="text/javascript" src="js/exporting.js"></script>



    <!-- fonts -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>

    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->

    <!--start-date-piker-->
    <script src="js/jquery-ui.js"></script>
    <script>
        $(function() {
            // $("#datepicker,#datepicker1").datepicker();
        });
    </script>
    <!--/End-date-piker-->
    <script src="js/responsiveslides.min.js"></script>
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->

    <!-- Jquery + Data Table -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script>
        var jQuery3 = $.noConflict(true);
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- <style>
        /* CSS untuk membuat modal popup */
        .modal {
            display: none;
            /* Sembunyikan modal secara default */
            position: fixed;
            /* Letakkan modal di posisi tetap di layar */
            z-index: 1;
            /* Menempatkan modal di atas konten lain */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            /* Memungkinkan scrolling saat konten terlalu panjang */
            background-color: rgba(0, 0, 0, 0.4);
            /* Warna latar belakang semi-transparan */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* Tengahkan modal vertikal dan horizontal */
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
        }

        /* Tombol untuk menutup modal */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style> -->
</head>

<body>
    <!-- header -->
    <div class="header">
        <div class="container">
            <div class="header_left">
                <ul style="border: none;">
                    <li style="border: none;"><span class="fa-solid fa-industry" aria-hidden="true"></span>PT HSS TAX CONSULTING</li>
                </ul>
            </div>
            <div class="header_right">
                <div class="login">
                    <ul>

                        <?php
                        if (isset($_SESSION['authorized'])) { ?>
                            <li><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo ucwords($_SESSION['nama']); ?></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Logout</a></li>
                        <?php } else { ?>


                            <li><a href="#" data-toggle="modal" data-target="#myModal4"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Login</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#myModal5"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Register</a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- //header -->
    <div class="header-bottom ">
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="logo grid">
                        <div class="grid__item color-3">
                            <!--<h1><a class="link link--nukun" href="index.php"><i></i>E-Ho<span>SPI</span>tal</a></h1>-->
                        </div>
                    </div>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                    <nav class="menu menu--horatio">
                        <ul class="nav navbar-nav menu__list">
                            <li class="menu__item" id="dashboard"><a href="index.php" class="menu__link">Dashboard</a></li>
                            <?php
                            if ($_SESSION['level'] == 'admin') { ?>
                                <li class="menu__item" id="data-pelayanan"><a href="view_pelayanan.php" class="menu__link">Data Pelayanan</a></li>
                                <li class="menu__item" id="data_pembayaran"><a href="data_pembayaran.php" class="menu__link">Data Pembayaran</a></li>
                                <li class="menu__item" id="data_user"><a href="data_user.php" class="menu__link">Data User</a></li>
                                <li class="menu__item" id="data-laporan"><a href="laporan.php" class="menu__link">Laporan</a></li>

                            <?php } else if ($_SESSION['level'] == 'client') { ?>
                                <li class="menu__item" id="booking_pelayanan"><a href="booking_pelayanan.php" class="menu__link">Pelayanan</a></li>
                                <li class="menu__item" id="data_pembayaran"><a href="data_pembayaran.php" class="menu__link">Data Pembayaran</a></li>
                                <li class="menu__item" id="data-laporan"><a href="laporan.php" class="menu__link">Laporan</a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
    </div>