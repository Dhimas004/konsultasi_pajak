<?php
$dbcon = mysqli_connect('localhost', 'root', '', 'konsultasi_pajak');
// Nama file backup
$backup_file = "backup/konsultasi_pajak_" . date('Y-m-d_H-i-s') . '.sql';

// Koneksi ke database

// Periksa koneksi
if (!$dbcon) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fungsi untuk menghapus karakter khusus dari query
function escape_string($string, $dbcon)
{
    return mysqli_real_escape_string($dbcon, $string);
}

// Buka file untuk menulis
$handle = fopen($backup_file, 'w+');

// Dapatkan semua tabel dari database
$tabels_result = mysqli_query($dbcon, 'SHOW TABLES');
while ($row = mysqli_fetch_row($tabels_result)) {
    $table = $row[0];

    // Buat query untuk membuat tabel
    $create_table_query = mysqli_query($dbcon, 'SHOW CREATE TABLE `' . $table . '`');
    $create_table = mysqli_fetch_row($create_table_query);
    fwrite($handle, "\n\n" . $create_table[1] . ";\n\n");

    // Ambil semua data dari tabel
    $table_data = mysqli_query($dbcon, 'SELECT * FROM `' . $table . '`');

    while ($data = mysqli_fetch_assoc($table_data)) {
        $columns = array_keys($data);
        $values  = array_values($data);

        $columns_escaped = array_map(function ($col) use ($dbcon) {
            return "`" . escape_string($col, $dbcon) . "`";
        }, $columns);

        $values_escaped = array_map(function ($val) use ($dbcon) {
            return "'" . escape_string($val, $dbcon) . "'";
        }, $values);

        $columns_list = implode(', ', $columns_escaped);
        $values_list  = implode(', ', $values_escaped);

        fwrite($handle, "INSERT INTO `$table` ($columns_list) VALUES ($values_list);\n");
    }
    fwrite($handle, "\n\n\n");
}

// Tutup file
fclose($handle);

// Tutup koneksi
mysqli_close($dbcon);

echo "Backup database berhasil disimpan ke $backup_file";
