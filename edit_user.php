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

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $no_telepon = $_POST['no_telepon'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $email = $_POST['email'];
    $password_baru = $_POST['password_baru'];
    $ketik_ulang_password_baru = $_POST['ketik_ulang_password_baru'];

    if ($password_baru == '') {
        mysql_query("UPDATE
            `konsultasi_pajak`.`login`
            SET
            `nama` = '$nama',
            `nama_perusahaan` = '$nama_perusahaan',
            `no_telepon` = '$no_telepon',
            `email` = '$email'
            WHERE `id` = '$id'
        ");
    } else {
        $password = md5($password_baru);
        mysql_query("UPDATE
        `konsultasi_pajak`.`login`
        SET
        `nama` = '$nama',
        `nama_perusahaan` = '$nama_perusahaan',
        `no_telepon` = '$no_telepon',
        `email` = '$email',
        `password` = '$password'
        WHERE `id` = '$id'
    ");
    }
    echo "<script>alert('Berhasil Ubah Data'); window.location.href='data_user.php'</script>";
}
?>

<style>
    th,

    td {

        color: black !important;

    }

    .form-group label {
        margin-bottom: 0.5rem;
    }
</style>

<div class="container">

    <center><span><b style="font-size: 20px; margin: 5% 0;">EDIT USER</b></span>
        <div class="row" style="display: flex; justify-content: center;">
            <div class="col-md-4">
                <br />
                <form action="" method="POST" id="form-ubah-user">
                    <?php
                    $id = $_GET['id'];
                    $login = mysql_fetch_assoc(mysql_query("SELECT * FROM `login` WHERE id = '$id'"));
                    $nama = $login['nama'];
                    $nama_perusahaan = $login['nama_perusahaan'];
                    $no_telepon = $login['no_telepon'];
                    $email = $login['email'];
                    ?>
                    <input type="hidden" name="id" value="<?= $id ?>">

                    <div class="form-group">
                        <label for="nama">Nama Pribadi</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>">
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">No. Telepon</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?= $no_telepon ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                    </div>
                    <div class="form-group">
                        <label for="nama_perusahaan">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= $nama_perusahaan ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
                    </div>
                    <div class="form-group">
                        <label for="password_baru">Password Baru</label>
                        <input type="text" class="form-control" id="password_baru" name="password_baru">
                    </div>
                    <div class="form-group">
                        <label for="ketik_ulang_password_baru">Ketik UlangPassword Baru</label>
                        <input type="text" class="form-control" id="ketik_ulang_password_baru" name="ketik_ulang_password_baru">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </center>
</div>

<script>
    $(document).ready(function() {
        $('#form-ubah-user').submit(function() {
            let password_baru = $('#password_baru').val();
            let ketik_ulang_password_baru = $('#ketik_ulang_password_baru').val();
            if (password_baru != ketik_ulang_password_baru) {
                alert('Password baru dan ketik ulang password baru harus sama');
                return false;
            }
        })
        $('#data_user').addClass('menu__item--current');

    });
</script>

<br />

<br />

<br />

<?php

require_once('./bottom.php');

?>