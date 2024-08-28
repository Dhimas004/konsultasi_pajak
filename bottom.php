<!-- //capabilities -->
<!-- contact -->
<div class="contact">
    <div class="container">

        <div class="col-md-6 contact-right wow fadeIn animated animated" data-wow-delay="0.1s" data-wow-duration="2s">
            <h3>Contact Us</h3>
            <div class="strip"></div>
            <ul class="con-icons">
                <li><span class="glyphicon glyphicon-phone" aria-hidden="true"></span><a href="http://wa.me/6285888601454">+6285888601454</a></li>
                <li><a href="mailto:fujidedysinambela003@gmail.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>fujidedysinambela003@gmail.com</a></li>
            </ul>
        </div>
        <div class="col-md-6 contact-left wow fadeIn animated animated" data-wow-delay="0.1s" data-wow-duration="2s">
            <h2>Informasi</h2>
            <div class="strip"></div>
            <p class="para" style="text-wrap: wrap;">PT HSS Tax Consulting memiliki tim ahli yang terdiri dari para profesional berpengalaman dalam bidang perpajakan. Dengan pengetahuan mendalam tentang regulasi perpajakan yang selalu berubah, kami memastikan bahwa semua kebutuhan perpajakan Anda ditangani dengan tepat dan sesuai peraturan.</p>
            <p class="copy-right">© 2024 PT HSS TAX CONSULTING</a></p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //contact -->
<!-- login -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body modal-spa">
                <div class="login-grids">

                    <div class="login-right">
                        <h3>Login</h3>
                        <form action="session.php" method="post">
                            <div class="sign-in">
                                <h4>Email :</h4>
                                <input type="text" name="email" onfocus="this.value = '';" required="" style="color: black;">
                            </div>
                            <div class="sign-in">
                                <h4>Password :</h4>
                                <input type="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                                                            this.value = 'Password';}" required="" style="color: black;">
                            </div>

                            <div class="sign-in">
                                <input type="submit" name="login" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //login -->
<!-- login -->
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body modal-spa">
                <div class="login-grids">
                    <div class="login-bottom">
                        <h3>Daftar</h3>
                        <form action="input_user.php" method="post" id="form-register">
                            <div>
                                <h4>Nama Pribadi</h4>
                                <input type="text" name="nama" required="" autocomplete="off" style="color: black">
                            </div>
                            <div>
                                <h4>No. Telepon</h4>
                                <input type="text" name="no_telepon" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required="" autocomplete="off" style="color: black">
                            </div>
                            <div>
                                <h4>Nama Perusahaan</h4>
                                <input type="text" name="nama_perusahaan" required="" autocomplete="off" style="color: black">
                            </div>
                            <div>
                                <h4>Email</h4>
                                <input type="text" name="email" required="" autocomplete="off" style="color: black">
                            </div>
                            <div>
                                <h4>Password</h4>
                                <input type="password" name="password" id="password" required="" autocomplete="off" style="color: black">
                            </div>
                            <div>
                                <h4>Ketik Password Ulang</h4>
                                <input type="password" name="" id="retype-password" required="" autocomplete="off" style="color: black">
                                <input type="hidden" class='form-control' name="level" value="client">
                            </div>
                            <div>
                                <input type="submit" name="Simpan" value="Daftar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //login -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('#form-register').submit(function() {
            var password = $('#password').val();
            var retype_password = $('#retype-password').val();

            if (password != retype_password) {
                alert('Password dan Ketik Password Ulang Tidak Sama');
                return false;
            }
        })
    })

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
</script>
</body>

</html>