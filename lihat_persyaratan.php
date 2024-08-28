<?php
require_once("./koneksi.php");
require_once('./top.php');


$id_pelayanan = $_GET['id'];
$id_jenis_pelayanan = mysql_fetch_assoc(mysql_query("SELECT * FROM pelayanan WHERE id = '$id_pelayanan'"))['id_data_pelayanan'];

?>
<style>
    th,
    td {
        color: black !important;
        padding: 0 !important;
    }

    .form-control {
        border: 1px solid black;
        padding: 5px;
        border-radius: 5px;
    }
</style>
<div class="container">
    <center><span><b style="font-size: 20px; margin: 5% 0;">PERSYARATAN</b></span></center>
    <br />
    <center>
        <div style="width: 40%;">
            <form method="POST" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <?php
                    $list_persyaratan = mysql_query("SELECT * FROM persyaratan_data_pelayanan WHERE id_data_pelayanan = '$id_jenis_pelayanan'");
                    while ($data = mysql_fetch_assoc($list_persyaratan)) {
                        $id_persyaratan_data_pelayanan = $data['id'];
                        $key = strtolower(str_replace('/', '_', str_replace(' ', '_', $data['nama_persyaratan'])));
                        $file = mysql_fetch_assoc(mysql_query("SELECT * FROM persyaratan WHERE id_pelayanan = '$id_pelayanan' AND `key` = '$key'"))['file'];
                    ?>
                        <tr>
                            <td style="padding: 8px !important; vertical-align: middle;" class="p-0">
                                <h5><?= $data['nama_persyaratan'] ?></h5>
                            </td>
                            <td style="padding: 8px !important; vertical-align: middle;" align="center" class="p-0">
                                <?php if ($file != '') { ?>
                                    <a href="file_persyaratan/<?= $file ?>" class="btn btn-sm btn-primary" target="_blank">Lihat</a>
                                    <a href="ubah_persyaratan.php?id=<?= $id_pelayanan ?>&id_persyaratan_data_pelayanan=<?= $id_persyaratan_data_pelayanan ?>" class="btn btn-sm btn-warning">Ubah</a>
                                <?php } else { ?>
                                    <a href="upload_persyaratan.php?id=<?= $id_pelayanan ?>&id_persyaratan_data_pelayanan=<?= $id_persyaratan_data_pelayanan ?>" class="btn btn-sm btn-primary">Upload</a>
                                <?php } ?>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </form>
        </div>
    </center>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.13.216/pdf.min.js"></script>
<script>
    $(document).ready(function() {
        $('#data_pembayaran').addClass('menu__item--current');
        if (getParameterByName('stat') == '1') {
            Swal.fire({
                title: 'Berhasil Upload Persyaratan',
                icon: 'success', // ikon alert
                timer: 2000,
                timerProgressBar: true,
            })
        } else if (getParameterByName('stat') == '2') {
            Swal.fire({
                title: 'Berhasil Ubah Persyaratan',
                icon: 'success', // ikon alert
                timer: 2000,
                timerProgressBar: true,
            })
        }
    })
</script>
<br />
<br />
<br />
<?php
require_once('./bottom.php');
?>