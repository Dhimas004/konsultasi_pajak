<?php
require_once("./koneksi.php");
require_once('./top.php');

function generateRandomFileName($extension)
{
    return uniqid('pdf_', true) . '.' . $extension;
}

function uploadFile($file, $targetDir = "file_persyaratan/")
{
    // Ensure the upload directory exists
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Get the file extension
    $fileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    // Generate a random file name
    $randomFileName = generateRandomFileName($fileType);
    // Set the target file path
    $targetFile = $targetDir . $randomFileName;
    $uploadOk = 1;
    $message = "";

    // Check file size (limit: 5MB)
    if ($file["size"] > 5000000) {
        $message .= "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }

    // Allow certain file formats (you can adjust this list)
    $allowedTypes = ["jpg", "jpeg", "png", "gif", "pdf", "doc", "docx"];
    if (!in_array($fileType, $allowedTypes)) {
        $message .= "Sorry, only JPG, JPEG, PNG, GIF, PDF, DOC, and DOCX files are allowed.<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message .= "Sorry, your file was not uploaded.<br>";
        // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            $message .= "The file " . htmlspecialchars(basename($file["name"])) . " has been uploaded as " . htmlspecialchars($randomFileName) . ".<br>";
        } else {
            $message .= "Sorry, there was an error uploading your file.<br>";
        }
    }

    return $randomFileName;
}

$id_jenis_pelayanan = $_GET['id'];
if (isset($_POST['submit'])) {
    $id_login = $_SESSION['id'];
    $estimasi_pengerjaan = $_POST['estimasi_pengerjaan'];
    $id_pelayanan = mysql_fetch_assoc(mysql_query("SELECT `AUTO_INCREMENT`
                                                    FROM  INFORMATION_SCHEMA.TABLES
                                                    WHERE TABLE_SCHEMA = DATABASE()
                                                    AND   TABLE_NAME   = 'pelayanan';"))['AUTO_INCREMENT'];


    $list_persyaratan = mysql_query("SELECT * FROM persyaratan_data_pelayanan WHERE id_data_pelayanan = '$id_jenis_pelayanan'");
    while ($data = mysql_fetch_assoc($list_persyaratan)) {
        $key = strtolower(str_replace('/', '_', str_replace(' ', '_', $data['nama_persyaratan'])));
        if ($_FILES[$key]['name'] != '') {
            $file = uploadFile($_FILES[$key]);
            mysql_query("INSERT INTO `persyaratan` (`id_pelayanan`, `key`, `file`)
                    VALUES
                    ('$id_pelayanan', '$key', '$file');
            ");
        }
    }



    mysql_query("INSERT INTO `pelayanan` (
    `id`,
    `id_login`,
    `id_data_pelayanan`,
    `estimasi_pengerjaan`
  )
  VALUES
    (
      '$id_pelayanan',
      '$id_login',
      '$id_jenis_pelayanan',
      '$estimasi_pengerjaan'
    );
  ");
    echo "<script>window.location.href='data_pembayaran.php?stat=1'</script>";
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
    <center><span><b style="font-size: 20px; margin: 5% 0;">PELAYANAN</b></span></center>
    <br />
    <center>
        <div style="width: 75%;">
            <form method="POST" enctype="multipart/form-data">
                <table class="table table-bordered">
                    <?php
                    $login = mysql_fetch_assoc(mysql_query("SELECT * FROM `login` WHERE id = '$_SESSION[id]'"));
                    $nama = $login['nama'];
                    $nama_perusahaan = $login['nama_perusahaan'];
                    $no_telepon = $login['no_telepon'];
                    $email = $login['email'];

                    ?>
                    <tr>
                        <td><label for="">Nama</label></td>
                        <td align="center">:</td>
                        <td><?= ucwords($nama) ?></td>
                    </tr>
                    <tr>
                        <td><label for="">Email</label></td>
                        <td align="center">:</td>
                        <td><?= $email ?></td>
                    </tr>
                    <tr>
                        <td><label for="">Nama Perusahaan</label></td>
                        <td align="center">:</td>
                        <td><?= strtoupper($nama_perusahaan) ?></td>
                    </tr>
                    <tr>
                        <td><label for="">No Telepon</label></td>
                        <td align="center">:</td>
                        <td><?= $no_telepon ?></td>
                    </tr>
                    <tr>
                        <td><label for="">Jenis Pelayanan</label></td>
                        <td align="center">:</td>
                        <td><?= mysql_fetch_assoc(mysql_query("SELECT * FROM data_pelayanan WHERE id = '$id_jenis_pelayanan'"))['nama_pelayanan'] ?></td>
                    </tr>
                    <tr>
                        <td><label for="estimasi_pengerjaan">Estimasi Pengerjaan</label></td>
                        <td align="center">:</td>
                        <td>
                            <select name="estimasi_pengerjaan" id="estimasi_pengerjaan" class="form-control" required>
                                <option value="">-- Estimasi Pengerjaan --</option>
                                <option value="tahunan">Tahunan</option>
                                <option value="bulanan">Bulanan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="3"><b>PERSYARATAN</b></td>
                    </tr>
                    <?php
                    $list_persyaratan = mysql_query("SELECT * FROM persyaratan_data_pelayanan WHERE id_data_pelayanan = '$id_jenis_pelayanan'");

                    while ($data = mysql_fetch_assoc($list_persyaratan)) {
                    ?>
                        <tr>
                            <td><label for="<?= strtolower(str_replace('/', '_', str_replace(' ', '_', $data['nama_persyaratan']))) ?>"><?= $data['nama_persyaratan'] ?></label></td>
                            <td>:</td>
                            <td>
                                <input class="form-control persyaratan" type="file" name="<?= strtolower(str_replace('/', '_', str_replace(' ', '_', $data['nama_persyaratan']))) ?>" id="<?= strtolower(str_replace('/', '_', str_replace(' ', '_', $data['nama_persyaratan']))) ?>" accept="application/pdf"><br />
                                <center>
                                    <canvas id="pdf-preview-<?= strtolower(str_replace('/', '_', str_replace(' ', '_', $data['nama_persyaratan']))) ?>" style="width: 500px; display: none;"></canvas>
                                </center>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </table>
                <button type="submit" name="submit" class="btn btn-primary">Booking</button>
            </form>
        </div>
    </center>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.13.216/pdf.min.js"></script>
<script>
    $(document).ready(function() {
        $('#booking_pelayanan').addClass('menu__item--current');
        $('.persyaratan').on('change', function(event) {
            let id = $(this).attr('id');
            console.log(id);
            const file = event.target.files[0];
            if (file && file.type === 'application/pdf') {
                const fileReader = new FileReader();

                fileReader.onload = function() {
                    const typedarray = new Uint8Array(this.result);

                    pdfjsLib.getDocument(typedarray).promise.then(function(pdf) {
                        // Get the first page
                        pdf.getPage(1).then(function(page) {
                            const scale = 1.5;
                            const viewport = page.getViewport({
                                scale
                            });

                            // Prepare canvas using PDF page dimensions
                            const canvas = $('#pdf-preview-' + id)[0];
                            const context = canvas.getContext('2d');
                            canvas.height = viewport.height;
                            canvas.width = viewport.width;

                            // Render PDF page into canvas context
                            const renderContext = {
                                canvasContext: context,
                                viewport: viewport
                            };
                            page.render(renderContext);
                        });
                    });
                };

                $('#pdf-preview-' + id).show();

                fileReader.readAsArrayBuffer(file);
            } else {
                alert('Please select a PDF file.');
            }
        });
    });
</script>
<br />
<br />
<br />
<?php
require_once('./bottom.php');
?>