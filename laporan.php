<?php

require_once("./koneksi.php");

require_once('./top.php');

$tanggal_awal = $_GET['tanggal_awal'];

$tanggal_akhir = $_GET['tanggal_akhir'];

$array_persyaratan = [];

$list_persyaratan = mysql_query("SELECT * FROM persyaratan_data_pelayanan");

while ($data = mysql_fetch_assoc($list_persyaratan)) {

    $array_persyaratan[$data['id_data_pelayanan']][] = strtolower(str_replace('/', '_', str_replace(' ', '_', $data['nama_persyaratan'])));
}



function tgl_indo($tanggal)

{

    $bulan = array(

        1 =>   'Januari',

        'Februari',

        'Maret',

        'April',

        'Mei',

        'Juni',

        'Juli',

        'Agustus',

        'September',

        'Oktober',

        'November',

        'Desember'

    );

    $pecahkan = explode('-', $tanggal);



    // variabel pecahkan 0 = tanggal

    // variabel pecahkan 1 = bulan

    // variabel pecahkan 2 = tahun



    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}



if (isset($_GET['batal'])) {

    $id = $_GET['batal'];

    mysql_query("UPDATE pelayanan SET status_transaksi = 'batal',updated_at = NOW() WHERE id = '$id'");

    echo "<script>window.location.href='pembayaran.php?stat=3'</script>";
}

?>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>

<script>
    $(document).ready(function() {

        $(".datepicker").datepicker({

            dateFormat: 'yy-mm-dd',

        });

    })
</script>

<style>
    th,

    td {

        color: black !important;

    }



    th {

        vertical-align: middle !important;

        text-align: center !important;

    }
</style>

<div class="container">

    <form action="" method="GET">

        <div class="row" style="display: flex; justify-content: center;">

            <div class="col-md-4">

                <center><span><b style="font-size: 20px; margin: 5% 0;">Laporan</b></span></center>

                <br />

                <div class="form-group">

                    <label for="tanggal_awal" style="margin-bottom: 0.5rem;">Tanggal Awal</label>

                    <input type="text" class="form-control datepicker" id="tanggal_awal" name="tanggal_awal" value="<?= $tanggal_awal ?>" required autocomplete="off">

                </div>

                <div class="form-group">

                    <label for="tanggal_akhir" style="margin-bottom: 0.5rem;">Tanggal Akhir</label>

                    <input type="text" class="form-control datepicker" id="tanggal_akhir" name="tanggal_akhir" value="<?= $tanggal_akhir ?>" required autocomplete="off">

                </div>
                <center>
                    <button type="submit" class="btn btn-primary" name="cari" value="1">Cari</button>
                </center>
            </div>

        </div>

    </form>

    <?php

    if (isset($_GET['cari'])) {

    ?>

        <br><br>

        <center>

            <h3 style="text-transform: uppercase;">LAPORAN <?= tgl_indo($tanggal_awal) ?> - <?= tgl_indo($tanggal_akhir) ?></h5>

        </center>

        <br />

        <div class="table-responsive">

            <table class="table table-striped table-bordered table-hover">

                <thead>

                    <th style="width: 5%;">No</th>

                    <th>Tanggal Transaksi</th>

                    <th>Jenis Pelayanan</th>

                    <th>Estimasi Pengerjaan</th>

                    <th>Status Transaksi</th>

                    <th>Status Pengerjaan</th>

                    <th>Dikerjakan Oleh</th>

                    <th>User</th>

                </thead>

                <tbody>

                    <?php
                    if ($_SESSION['level'] == 'client') {

                        $list_pelayanan = mysql_query("SELECT * FROM pelayanan WHERE DATE(created_at) BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND id_login = '$_SESSION[id]'");
                    } else {
                        $list_pelayanan = mysql_query("SELECT * FROM pelayanan WHERE DATE(created_at) BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
                    }

                    $no = 1;

                    while ($row = mysql_fetch_assoc($list_pelayanan)) {

                        $id_data_pelayanan = $row['id_data_pelayanan'];

                        $pelayanan = mysql_fetch_assoc(mysql_query("SELECT * FROM data_pelayanan WHERE id = '$id_data_pelayanan'"))['nama_pelayanan'];

                        $status_transaksi = $row['status_transaksi'];

                        $status_pengerjaan = $row['status_pengerjaan'];

                        $id_login = $row['id_login'];

                        $user = mysql_fetch_assoc(mysql_query("SELECT * FROM `login` WHERE id = '$id_login'"))['nama'];;

                        $dikerjakan_oleh = mysql_fetch_assoc(mysql_query("SELECT * FROM `login` WHERE id = '$row[dikerjakan_oleh]'"))['nama'];;



                    ?>

                        <tr>

                            <td align="center"><?= $no ?></td>

                            <td align="center" style="text-transform: uppercase;"><?= tgl_indo(date_format(date_create($row['created_at']), 'Y-m-d')) ?></td>

                            <td><?= $pelayanan ?></td>

                            <td><?= ucwords($row['estimasi_pengerjaan']) ?></td>

                            <td><?php

                                if ($status_transaksi == 'belum dibayar') {

                                    echo  ucwords($status_transaksi);
                                } else if ($status_transaksi == 'batal') {

                                    echo  ucwords($status_transaksi);
                                } else if (in_array($status_transaksi, ['pembayaran disetujui', 'sudah dibayar'])) {

                                    echo  ucwords($status_transaksi);
                                } else {

                                    echo ucwords($status_transaksi);
                                }

                                ?></td>

                            <td><?php

                                if ($status_transaksi == 'batal') {

                                    echo "-";
                                } else {

                                    if ($status_pengerjaan == 'belum selesai') {

                                        echo  ucwords($status_pengerjaan);
                                    } else if ($status_pengerjaan == 'sedang diproses') {

                                        echo  ucwords($status_pengerjaan);
                                    } else if ($status_pengerjaan == 'sudah selesai') {

                                        echo  ucwords($status_pengerjaan);
                                    }
                                }

                                ?></td>

                            <td><?= ucwords($dikerjakan_oleh) ?></td>

                            <td><?= ucwords($user) ?></td>

                        </tr>

                    <?php

                        $no++;
                    }

                    ?>

                </tbody>

            </table>

        </div>

    <?php

    }

    ?>

</div>

<script>
    $(document).ready(function() {

        $('#data-laporan').addClass('menu__item--current');

    });
</script>

<br />

<br />

<br />

<?php

require_once('./bottom.php');

?>