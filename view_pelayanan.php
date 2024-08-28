<?php

require_once('./top.php');

?>

<style>
    .center-no {

        text-align: center !important;

    }



    .action-btns {

        text-align: center;

    }



    .edit-btn {

        margin-right: 10px;

    }



    input[type="text"] {

        padding: 0;

        margin: 0;

    }
</style>

<div class="container">

    <center><span><b style="font-size: 20px; margin: 5% 0;">DATA PELAYANAN</b></span></center>

    <!-- Tombol Tambah Data -->

    <button id="addBtn" data-toggle="modal" data-target="#modal-pelayanan">Tambah Data</button>

    <br />

    <br />

    <table id="table-pelayanan" class="display" style="width:100%">

        <thead>

            <tr>

                <th style="width: 5px;">No</th>

                <th>Nama Pelayanan</th>

                <th>Action</th>

            </tr>

        </thead>

        <tbody>



        </tbody>

    </table>



    <!-- login -->

    <div class="modal fade" id="modal-pelayanan" tabindex="-1" role="dialog">

        <div class="modal-dialog" role="document">

            <div class="modal-content modal-info">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>

                <div class="modal-body modal-spa">

                    <div class="login-grids">



                        <h3 id="modal-title">Login</h3>

                        <br />

                        <form id="addForm" method="POST">

                            <input type="hidden" name="id" id="modal-id">

                            <table>

                                <tr>

                                    <td><label for="nama_pelayanan">Nama Pelayanan</label></td>

                                    <td style="padding: 0px 5px;">:</td>

                                    <td><input type="text" id="nama_pelayanan" name="nama_pelayanan" required></td>

                                </tr>

                            </table>

                            <br />

                            <button type="submit" id="submitBtn" style="float: right;">Tambah Data</button>

                            <br />

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- //login -->



</div>

<script>
    $(document).ready(function() {

        $('#data-pelayanan').addClass('menu__item--current');

        $('#table-pelayanan').DataTable({
            "processing": true,
            "serverSide": true,
            'responsive': true,
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
                    "data": null,
                    "className": "action-btns",
                    "render": function(data, type, row) {
                        return '<div style="display: flex;"><button class="edit-btn" onclick="editData(' + row.id + ')" data-toggle="modal" data-target="#modal-pelayanan">Edit</button>' +
                            '<button onclick="deleteData(' + row.id + ')">Delete</button></div>';
                    }
                }
            ]
        });



        // Menampilkan modal tambah data ketika tombol tambah diklik

        $('#addBtn').click(function() {

            $('#modal-title').text('Tambah Data Pelayanan');

            $('#modal-id').val('');

            $('#submitBtn').text('Tambah Data');

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

        $('#submitBtn').text('Ubah Data');

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



    function getParameterByName(paramName) {

        // Dapatkan URL saat ini

        const url = window.location.href;



        // Melarikan karakter-karakter khusus dalam nama parameter

        paramName = paramName.replace(/[\[\]]/g, "\\$&");



        // Buat regex untuk mencari parameter

        const regex = new RegExp("[?&]" + paramName + "(=([^&#]*)|&|#|$)");

        const results = regex.exec(url);



        // Jika tidak ditemukan, kembalikan null

        if (!results) return null;



        // Jika tidak ada nilai (mis. ?param), kembalikan string kosong

        if (!results[2]) return '';



        // Decode nilai parameter dan kembalikan

        return decodeURIComponent(results[2].replace(/\+/g, " "));

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