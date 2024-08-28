<?php
require_once("./koneksi.php");
require_once('./top.php');
?>
<style>
    th,
    td {
        color: black !important;
    }
</style>
<div class="container">
    <center><span><b style="font-size: 20px; margin: 5% 0;">PELAYANAN</b></span></center>
    <!-- Tombol Tambah Data -->
    <br />
    <br />
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th>Pelayanan</th>
                <th style="width: 15%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $list_pelayanan = mysql_query("SELECT * FROM data_pelayanan WHERE deleted_at IS NULL ORDER BY nama_pelayanan");
            while ($data = mysql_fetch_assoc($list_pelayanan)) {
                $id = $data['id'];
                $nama_pelayanan = $data['nama_pelayanan'];
            ?>
                <tr style="font-weight: bold;">
                    <td align="center"><?= $no ?></td>
                    <td><?= $nama_pelayanan ?></td>
                    <td align="center">
                        <a href="booking_pelayanan_preform.php?id=<?= $id ?>"> <button type="button" class="btn btn-default">Booking
                            </button>
                        </a>
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
        $('#booking_pelayanan').addClass('menu__item--current');
        $('#table-pelayanan').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "ajax/table/ajax_pelayanan.php",
                "type": "GET"
            },
            "columns": [{
                    "data": "no",
                    "className": "center-no"
                },
                {
                    "data": "nama_pelayanan"
                },
                {
                    "data": "created_at"
                },
                {
                    "data": "updated_at"
                },
                {
                    "data": null,
                    "className": "action-btns",
                    "render": function(data, type, row) {
                        return '<button class="edit-btn" onclick="editData(' + row.id + ')" data-toggle="modal" data-target="#modal-pelayanan">Edit</button>' +
                            '<button onclick="deleteData(' + row.id + ')">Delete</button>';
                    }
                }
            ]
        });

        // Menampilkan modal tambah data ketika tombol tambah diklik
        $('#addBtn').click(function() {
            $('#modal-title').text('Tambah Data Pelayanan');
            $('#modal-id').val('');
        });


        // Menyembunyikan form tambah data ketika form disubmit
        $('#addForm').submit(function(event) {
            event.preventDefault();
            var nama_pelayanan = $('#nama_pelayanan').val();
            var modal_id = $('#modal-id').val();
            if (modal_id == '') {
                $.post('ajax/function/ajax_tambah_pelayanan.php', {
                    nama_pelayanan
                }, function(res) {
                    res = JSON.parse(res);
                    if (res.res == true) {
                        window.location.href = 'view_pelayanan.php?stat=1';
                    } else if (res.res == 'duplicate') {
                        Swal.fire({
                            title: 'Nama Pelayanan Sudah Ada',
                            icon: 'info', // ikon alert
                            timer: 2000,
                            timerProgressBar: true,
                        });
                    } else {
                        Swal.fire({
                            title: 'Gagal Tambah Pelayanan',
                            icon: 'error', // ikon alert
                            timer: 2000,
                            timerProgressBar: true,
                        });
                    }
                })
            } else {
                $.post('ajax/function/ajax_ubah_data_pelayanan.php', {
                    id: modal_id,
                    nama_pelayanan
                }, function(res) {
                    res = JSON.parse(res);
                    if (res.res == true) {
                        window.location.href = 'view_pelayanan.php?stat=2';
                    } else if (res.res == 'duplicate') {
                        Swal.fire({
                            title: 'Nama Pelayanan Sudah Ada',
                            icon: 'info', // ikon alert
                            timer: 2000,
                            timerProgressBar: true,
                        });
                    } else {
                        Swal.fire({
                            title: 'Gagal Ubah Pelayanan',
                            icon: 'error', // ikon alert
                            timer: 2000,
                            timerProgressBar: true,
                        });
                    }
                })
            }
        });

        if (getParameterByName('stat') == '1') {
            Swal.fire({
                title: 'Berhasil Tambah Pelayanan',
                icon: 'success', // ikon alert
                timer: 2000,
                timerProgressBar: true,
            }).then(() => {
                // Menggunakan window.location.href untuk mengalihkan halaman
                window.location.href = 'view_pelayanan.php';
            });;
        }

        if (getParameterByName('stat') == '2') {
            Swal.fire({
                title: 'Berhasil Ubah Pelayanan',
                icon: 'success', // ikon alert
                timer: 2000,
                timerProgressBar: true,
            }).then(() => {
                // Menggunakan window.location.href untuk mengalihkan halaman
                window.location.href = 'view_pelayanan.php';
            });;
        }

        if (getParameterByName('stat') == '3') {
            Swal.fire({
                title: 'Berhasil Hapus Pelayanan',
                icon: 'success', // ikon alert
                timer: 2000,
                timerProgressBar: true,
            }).then(() => {
                // Menggunakan window.location.href untuk mengalihkan halaman
                window.location.href = 'view_pelayanan.php';
            });;
        }


    });

    function editData(id) {
        // Lakukan sesuatu ketika tombol edit diklik
        $('#modal-title').text('Ubah Data Pelayanan');
        $.post('ajax/function/ajax_get_data_pelayanan.php', {
            id
        }, function(res) {
            res = JSON.parse(res);
            $('#modal-id').val(id);
            $('#nama_pelayanan').val(res.nama_pelayanan);
            $('#modal-id').val(res.id);
        })

    }

    function deleteData(id) {
        // Lakukan sesuatu ketika tombol delete diklik
        $.post('ajax/function/ajax_hapus_pelayanan.php', {
            id
        }, function(res) {
            res = JSON.parse(res);
            if (res.res == true) {
                window.location.href = 'view_pelayanan.php?stat=3';
            } else {
                Swal.fire({
                    title: 'Gagal Hapus Pelayanan',
                    icon: 'error', // ikon alert
                    timer: 2000,
                    timerProgressBar: true,
                });
            }
        })
    }

    $(document).keydown(function(event) {
        if (event.key === "Escape") {
            $('#addModal').css('display', 'none');
        }
    });
</script>
<br />
<br />
<br />
<?php
require_once('./bottom.php');
?>