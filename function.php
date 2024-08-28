<?php

function generateRandomFileName($fileType, $extension)
{
    return uniqid($fileType . '_', true) . '.' . $extension;
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
    $randomFileName = generateRandomFileName(str_replace('.', '', $fileType), $fileType);
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
