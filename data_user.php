<?php

require_once("./koneksi.php");

require_once('./top.php');

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

?>

<style>
    th,

    td {

        color: black !important;

    }
</style>

<div class="container">

    <center><span><b style="font-size: 20px; margin: 5% 0;">DATA USER</b></span></center>

    <!-- Tombol Tambah Data -->

    <br />

    <br />

    <table class="table table-bordered table-hover table-striped">

        <thead>

            <tr>

                <th style="width: 5%;">No</th>

                <th>Nama Pribadi</th>

                <th>Nama Perusahaan</th>

                <th>No Telepon</th>

                <th>Email</th>

                <th>Tanggal Pembuatan</th>
                <th>Aksi</th>
            </tr>

        </thead>

        <tbody>

            <?php

            $no = 1;

            $list_client = mysql_query("SELECT * FROM `login` WHERE 1 ORDER BY nama");

            while ($data = mysql_fetch_assoc($list_client)) {

                $id = $data['id'];

                $nama = $data['nama'];

                $nama_perusahaan = $data['nama_perusahaan'];

                $no_telepon = $data['no_telepon'];

                $email = $data['email'];

                $level = $data['level'];

                $created_at = $data['created_at'];

            ?>

                <tr>

                    <td align="center"><?= $no ?></td>

                    <td><?= ucwords($nama) ?></td>

                    <td><?= strtoupper($nama_perusahaan) ?></td>

                    <td><?= $no_telepon ?></td>

                    <td><?= $email ?></td>

                    <td style="text-transform: uppercase;"><?= tgl_indo(date_format(date_create($created_at), 'Y-m-d')) ?></td>
                    <td align="center">
                        <a href="edit_user.php?id=<?= $id ?>" class="glyphicon glyphicon-edit" style="font-size: 20px;"></a>
                        <a href="hapus_user.php?id=<?= $id ?>" class="glyphicon glyphicon-trash" style="font-size: 20px; margin-left: 5px;"></a>
                    </td>

                </tr>

            <?php

                $no++;
            }

            ?>

        </tbody>

    </table>





</div>

<script>
    $(document).ready(function() {

        $('#data_user').addClass('menu__item--current');

    });
</script>

<br />

<br />

<br />

<?php

require_once('./bottom.php');

?>