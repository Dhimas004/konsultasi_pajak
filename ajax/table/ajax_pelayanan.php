<?php
require_once('../../koneksi_oop.php');

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil parameter dari DataTables
$searchValue = isset($_GET['search']['value']) ? $_GET['search']['value'] : ''; // Nilai pencarian
$start = isset($_GET['start']) ? $_GET['start'] : 0; // Mulai pagination
$length = isset($_GET['length']) ? $_GET['length'] : 10; // Panjang pagination
$orderColumnIndex = isset($_GET['order'][0]['column']) ? $_GET['order'][0]['column'] : 0; // Index kolom untuk pengurutan
$orderDirection = isset($_GET['order'][0]['dir']) ? $_GET['order'][0]['dir'] : 'asc'; // Arah pengurutan, default: ascending

// Daftar kolom yang bisa diurutkan
$sortableColumns = array('no', 'id', 'nama_pelayanan', 'created_at', 'updated_at');
$orderColumn = $sortableColumns[$orderColumnIndex];

// Hitung total records tanpa filter
$totalRecordsQuery = "SELECT COUNT(*) as count FROM data_pelayanan";
$result = $conn->query($totalRecordsQuery);
$totalRecords = $result->fetch_assoc()['count'];

// Buat query dasar
$sql = "SELECT *, (@row_number:=@row_number + 1) AS no FROM data_pelayanan, (SELECT @row_number := 0) AS t WHERE deleted_at IS NULL";

// Tambahkan kondisi pencarian jika ada
if (!empty($searchValue)) {
    $sql .= " AND (nama_pelayanan LIKE '%" . $searchValue . "%')";
}

// Hitung total records dengan filter
$totalFilteredRecordsQuery = "SELECT COUNT(*) as count FROM data_pelayanan WHERE deleted_at IS NULL";
if (!empty($searchValue)) {
    $totalFilteredRecordsQuery .= " AND (nama_pelayanan LIKE '%" . $searchValue . "%')";
}
$result = $conn->query($totalFilteredRecordsQuery);
$totalFilteredRecords = $result->fetch_assoc()['count'];

// Tambahkan pengurutan
if ($orderColumn == 'no') {
    $sql .= " ORDER BY @row_number " . $orderDirection;
} else {
    $sql .= " ORDER BY " . $orderColumn . " " . $orderDirection;
}

// Tambahkan limit dan offset untuk pagination
$sql .= " LIMIT " . intval($start) . ", " . intval($length);

// Eksekusi query
$data = array();
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Format data untuk DataTables
$response = array(
    "draw" => intval($_GET['draw']),
    "recordsTotal" => intval($totalRecords),
    "recordsFiltered" => intval($totalFilteredRecords),
    "data" => $data
);

// Kembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
