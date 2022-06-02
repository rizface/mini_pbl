<?php

    if(isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hash = password_hash($password,PASSWORD_DEFAULT);
        echo "<script>alert('$hash')</script>";
    }

?>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">SELAMAT DATANG</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
            <h3 class="mb-4 text-center">Login Laboran</h3>
            <form action="" method="POST" class="signin-form">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
            <div class="form-group">
                <input name="password" id="password-field" type="password" class="form-control" placeholder="Password" required>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="form-group">
                <button  name="login" type="submit" class="form-control btn btn-primary submit px-3">Masuk</button>
            </div>
            <div class="form-group d-md-flex">
                <div class="w-50">
                    <label class="checkbox-wrap checkbox-primary">Remember Me
                        <input type="checkbox" checked>
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="w-50 text-md-right">
                    <a href="?p=login-dosen" style="color: #fff">Login Sebagai Dosen</a>
                </div>
            </div>
            </form>
            </div>
            </div>
        </div>
    </div>
</section>
