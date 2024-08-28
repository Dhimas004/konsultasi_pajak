<?php

require_once("./koneksi.php");

require_once('./top.php');



function generateRandomFileName($extension)

{

    return uniqid('bukti_pembayaran_', true) . '.' . $extension;
}



function uploadFile($file, $targetDir = "bukti_pembayaran/")

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



$id_pelayanan = $_GET['id'];

$id_jenis_pelayanan = mysql_fetch_assoc(mysql_query("SELECT * FROM pelayanan WHERE id = '$id_pelayanan'"))['id_data_pelayanan'];

$last_bukti_pembayaran = mysql_fetch_assoc(mysql_query("SELECT * FROM pelayanan WHERE id = '$id_pelayanan'"))['bukti_pembayaran'];



if (isset($_POST['submit'])) {

    unlink("bukti_pembayaran/$last_bukti_pembayaran");

    $bukti_pembayaran = $_FILES['bukti_pembayaran'];

    $bukti_pembayaran = uploadFile($bukti_pembayaran);



    mysql_query("UPDATE pelayanan SET bukti_pembayaran = '$bukti_pembayaran', bukti_pembayaran_timestamp = NOW(), status_transaksi = 'sudah dibayar' WHERE id = '$id_pelayanan'");

    echo "<script>window.location.href='data_pembayaran.php?stat=4'</script>";
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

    <center><span><b style="font-size: 20px; margin: 5% 0;">UPLOAD PEMBAYARAN</b></span></center>

    <br />

    <center>

        <div style="width: 50%;">

            <form method="POST" enctype="multipart/form-data">

                <table class="table table-bordered">

                    <tr>

                        <td style="vertical-align: middle;" align="center">

                            <h5>Bukti Pembayaran</h5>

                        </td>

                        <td style="vertical-align: middle;" align="center"><input class="form-control" type="file" id="bukti-pembayaran" name="bukti_pembayaran" accept="image/*">

                            <div id="div-bukti-pembayaran" style="<?= ($last_bukti_pembayaran == '' ? 'display:none;' : '') ?>">

                                <br />

                                <img id="bukti-pembayaran-preview" width="250" src="bukti_pembayaran/<?= $last_bukti_pembayaran ?>" alt="Image Preview">

                            </div>

                        </td>

                    </tr>

                </table>

                <button type="submit" class="btn btn-primary" name="submit" style="float: right;">Upload</button>

            </form>

        </div>

    </center>





</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.13.216/pdf.min.js"></script>

<script>
    $(document).ready(function() {

        $('#pembayaran').addClass('menu__item--current');

        $('#bukti-pembayaran').on('change', function(event) {

            const file = event.target.files[0];

            if (file && file.type.startsWith('image/')) {

                const reader = new FileReader();

                reader.onload = function(e) {

                    $('#div-bukti-pembayaran').show();

                    $('#bukti-pembayaran-preview').attr('src', e.target.result);

                };

                reader.readAsDataURL(file);

            }

        });

    })
</script>

<br />

<br />

<br />

<?php

require_once('./bottom.php');

?>