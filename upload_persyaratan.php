<?php
require_once("./koneksi.php");
require_once('./top.php');
require_once('./function.php');

$id_pelayanan = $_GET['id'];
$id_persyaratan_data_pelayanan = $_GET['id_persyaratan_data_pelayanan'];
$nama_persyaratan = mysql_fetch_assoc(mysql_query("SELECT * FROM persyaratan_data_pelayanan WHERE id = '$id_persyaratan_data_pelayanan'"))['nama_persyaratan'];

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $key = $_POST['key'];
    $file = uploadFile($file);

    mysql_query("INSERT INTO `persyaratan` (
        `id_pelayanan`,
        `key`,
        `file`
        )
        VALUES
        (
            '$id_pelayanan',
            '$key',
            '$file'
        );
    ");
    echo "<script>window.location.href='lihat_persyaratan.php?id=$id_pelayanan&stat=1'</script>";
}

?>
<style>
    th,
    td {
        color: black !important;
    }

    .form-control {
        border: 1px solid black;
        padding: 5px;
        border-radius: 5px;
    }
</style>
<div class="container">
    <center><span><b style="font-size: 20px; margin: 5% 0;">UPLOAD PERSYARATAN <?= strtoupper($nama_persyaratan) ?></b></span></center>
    <br />
    <center>
        <div style="width: 50%;">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="key" value="<?= $key = strtolower(str_replace('/', '_', str_replace(' ', '_', $nama_persyaratan))); ?>">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="padding: 8px !important; vertical-align: middle;">
                                <h5><?= strtoupper($nama_persyaratan) ?></h5>
                            </td>
                            <td style="padding: 8px !important; vertical-align: middle;">:</td>
                            <td style="padding: 8px !important; vertical-align: middle;"><input type="file" name="file" class="form-control" accept="application/pdf"></td>
                        </tr>
                    </tbody>
                </table>
                <center>
                    <button type="submit" class="btn btn-sm btn-primary" name="submit">Submit</button>
                </center>
            </form>
        </div>
    </center>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.13.216/pdf.min.js"></script>