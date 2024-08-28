<?php

require_once("./koneksi.php");

require_once('./top.php');



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

    echo "<script>window.location.href='data_pembayaran.php?stat=3'</script>";
}

?>

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

    <center><span><b style="font-size: 20px; margin: 5% 0;">DATA PEMBAYARAN</b></span></center>

    <!-- Tombol Tambah Data -->

    <br />

    <br />

    <div class="table-responsive">

        <table class="table table-bordered table-hover table-striped">

            <thead>

                <tr>

                    <th style="width: 5%;">No</th>

                    <th>Tanggal Transaksi</th>

                    <th>Jenis Pelayanan</th>

                    <th>Estimasi Pengerjaan</th>

                    <th>Status Transaksi</th>

                    <th>Status Pengerjaan</th>

                    <?php

                    if (in_array($_SESSION['level'], ['admin'])) {

                        echo "<th>Bukti Pembayaran</th>";
                    }

                    ?>

                    <th>Dikerjakan Oleh</th>

                    <th>User</th>

                    <th style="width: 15%;">

                        <center>Aksi</center>

                    </th>

                </tr>

            </thead>

            <tbody>

                <?php

                $no = 1;

                $list_pelayanan = mysql_query("SELECT *, pelayanan.created_at, pelayanan.id FROM pelayanan JOIN login ON login.id = pelayanan.id_login JOIN data_pelayanan ON data_pelayanan.id = pelayanan.id_data_pelayanan WHERE id_login = '$_SESSION[id]' ORDER BY pelayanan.id DESC");



                if (in_array($_SESSION['level'], ['manager partner', 'staff', 'finance', 'director', 'admin'])) {

                    $list_pelayanan = mysql_query("SELECT *, pelayanan.created_at, pelayanan.id FROM pelayanan JOIN login ON login.id = pelayanan.id_login JOIN data_pelayanan ON data_pelayanan.id = pelayanan.id_data_pelayanan  ORDER BY pelayanan.id DESC");
                }

                while ($data = mysql_fetch_assoc($list_pelayanan)) {

                    $id = $data['id'];

                    $id_data_pelayanan = $data['id_data_pelayanan'];

                    $estimasi_pengerjaan = $data['estimasi_pengerjaan'];

                    $status_transaksi = $data['status_transaksi'];

                    $created_at = $data['created_at'];

                    $nama_pelayanan = $data['nama_pelayanan'];

                    $status_pengerjaan = $data['status_pengerjaan'];

                    $bukti_pembayaran = $data['bukti_pembayaran'];

                    $nama = $data['nama'];

                    $dikerjakan_oleh = $data['dikerjakan_oleh'];

                ?>

                    <tr>

                        <td align="center"><?= $no ?></td>

                        <td><?= tgl_indo(date_format(date_create($created_at), 'Y-m-d')) ?></td>

                        <td><?= $nama_pelayanan ?></td>

                        <td><?= ucwords($estimasi_pengerjaan) ?></td>

                        <td style="font-weight: bold;">

                            <?php

                            if ($status_transaksi == 'belum dibayar') {

                                echo "<span class='text-warning'>" . ucwords($status_transaksi) . "</span>";
                            } else if ($status_transaksi == 'batal') {

                                echo "<span class='text-danger'>" . ucwords($status_transaksi) . "</span>";
                            } else if (in_array($status_transaksi, ['pembayaran disetujui', 'sudah dibayar'])) {

                                echo "<span class='text-success'>" . ucwords($status_transaksi) . "</span>";
                            } else {

                                echo "<span>" . ucwords($status_transaksi) . "</span>";
                            }

                            ?>

                        </td>

                        <td style="font-weight: bold;">

                            <?php

                            if ($status_transaksi == 'batal') {

                                echo "-";
                            } else {

                                if ($status_pengerjaan == 'belum selesai') {

                                    echo "<span class='text-danger'>" . ucwords($status_pengerjaan) . "</span>";
                                } else if ($status_pengerjaan == 'sedang diproses') {

                                    echo "<span class='text-primary'>" . ucwords($status_pengerjaan) . "</span>";
                                } else if ($status_pengerjaan == 'sudah selesai') {

                                    echo "<span class='text-success'>" . ucwords($status_pengerjaan) . "</span>";
                                }
                            }

                            ?>

                        </td>

                        <?php

                        if (in_array($_SESSION['level'], ['admin'])) {

                        ?>

                            <td align="center">

                                <?php

                                if (in_array($status_transaksi, ['sudah dibayar', 'pembayaran disetujui'])) {

                                ?>

                                    <a href="bukti_pembayaran/<?= $bukti_pembayaran ?>" target="_blank">

                                        <button type="button" class="btn btn-default">

                                            Lihat Bukti Pembayaran

                                        </button>

                                    </a>

                                <?php

                                }

                                ?>

                            </td>

                        <?php

                        }

                        ?>

                        <td align="center"><?php

                                            if ($dikerjakan_oleh == 0) {

                                                if ($_SESSION['level'] != 'client') {

                                                    echo " <a href='ambil_project.php?id_pelayanan=$id&id_user={$_SESSION['id']}' class='btn btn-success' style='margin-bottom: 5px'>Ambill Project</a><br />";
                                                }
                                            } else {

                                                echo ucwords(mysql_fetch_assoc(mysql_query("SELECT * FROM login WHERE id = '$dikerjakan_oleh'"))['nama']);
                                            }

                                            ?></td>

                        <td align="center"><?= ucwords($nama) ?></td>

                        <td>

                            <center>

                                <?php

                                if ($_SESSION['level'] == 'admin') {

                                    if ($status_transaksi == 'sudah dibayar') {

                                        echo " <a href='verifikasi_pembayaran.php?id=$id' class='btn btn-success' style='margin-bottom: 5px'>Verifikasi Pembayaran</a><br />";
                                    } else if ($status_pengerjaan == 'sedang diproses' && $status_transaksi == 'pembayaran disetujui') {

                                        echo " <a href='selesaikan_pengerjaan.php?id=$id' class='btn btn-success' style='margin-bottom: 5px'>Selesaikan Pengerjaan</a><br />";
                                    }
                                }

                                ?>

                                <a href="lihat_persyaratan.php?id=<?= $id ?>" class="btn btn-primary" style="margin-bottom: 5px;">

                                    Lihat Persyaratan

                                    <?php

                                    $persyaratan_terkirim = mysql_num_rows(mysql_query("SELECT * FROM persyaratan WHERE id_pelayanan = '$id'"));

                                    echo "($persyaratan_terkirim/" . count($array_persyaratan[$id_data_pelayanan]) . ")";

                                    ?>

                                </a>

                                <br />

                                <?php

                                if ($status_transaksi != 'batal' && $status_pengerjaan != 'sudah selesai') {

                                    echo " <a href='upload_pembayaran.php?id=$id' class='btn btn-warning' style='margin-bottom: 5px'>Upload Pembayaran</a><br />";
                                    if ($_SESSION['level'] != 'client') {
                                        echo "<a href='data_pembayaran.php?batal=$id' class='btn btn-danger' style='margin-bottom: 5px'>Batal</a><br />";
                                    }
                                }

                                ?>



                            </center>

                        </td>

                    </tr>

                <?php

                    $no++;
                }

                ?>

            </tbody>

        </table>

    </div>





</div>

<script>
    $(document).ready(function() {

        $('#data_pembayaran').addClass('menu__item--current');

        if (getParameterByName('stat') == '1') {

            Swal.fire({

                title: 'Berhasil Booking Pelayanan',

                icon: 'success', // ikon alert

                timer: 2000,

                timerProgressBar: true,

            }).then(() => {

                window.location.href = 'data_pembayaran.php';

            })

        } else if (getParameterByName('stat') == '3') {

            Swal.fire({

                title: 'Berhasil Batal Pelayanan',

                icon: 'success', // ikon alert

                timer: 2000,

                timerProgressBar: true,

            }).then(() => {

                window.location.href = 'data_pembayaran.php';

            })

        } else if (getParameterByName('stat') == '4') {

            Swal.fire({

                title: 'Berhasil Upload Pembayaran',

                icon: 'success', // ikon alert

                timer: 2000,

                timerProgressBar: true,

            }).then(() => {

                window.location.href = 'data_pembayaran.php';

            })

        } else if (getParameterByName('stat') == '5') {

            Swal.fire({

                title: 'Berhasil Menyetujui Pembayaran',

                icon: 'success', // ikon alert

                timer: 2000,

                timerProgressBar: true,

            }).then(() => {

                window.location.href = 'data_pembayaran.php';

            })

        } else if (getParameterByName('stat') == '6') {

            Swal.fire({

                title: 'Berhasil Pengerjaan Berhasil Diupdate',

                icon: 'success', // ikon alert

                timer: 2000,

                timerProgressBar: true,

            }).then(() => {

                window.location.href = 'data_pembayaran.php';

            })

        } else if (getParameterByName('stat') == '7') {

            Swal.fire({

                title: 'Berhasil Ambil Project',

                icon: 'success', // ikon alert

                timer: 2000,

                timerProgressBar: true,

            }).then(() => {

                window.location.href = 'data_pembayaran.php';

            })

        }



    });
</script>

<br />

<br />

<br />

<?php

require_once('./bottom.php');

?>