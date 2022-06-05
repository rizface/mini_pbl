<?php
    if(isset($_POST["login"])) {
        $nidn = $_POST['nidn'];
        $password = $_POST['password'];

        $query = "SELECT * FROM dosen WHERE nidn = '$nidn'";
        $result = mysqli_fetch_assoc(mysqli_query($conn, $query));

        if(!isset($result)) {
            echo "NIDN tidak ditemukan";
            die;
        } else {
            $passwordIsMatch = password_verify($password,$result["password"]);
            if($passwordIsMatch) {
                $_SESSION["login"] = true;
                $_SESSION["nidn"] = $result["nidn"];
                $_SESSION["nama_dosen"] = $result["nama_dosen"];
                $_SESSION["username"] = $result["username"];
                $_SESSION["level"] = "dosen";

                echo "berhasil login";
                die;
                // header("Location: ?p=dosen");
            } else {
                echo "Password Salah";
            }
        }
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
            <h3 class="mb-4 text-center">Login Dosen</h3>
            <form action="" method="POST" class="signin-form">
                <div class="form-group">
                    <input type="text" name="nidn" class="form-control" placeholder="NIDN" required>
                </div>
            <div class="form-group">
                <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="form-control btn btn-primary submit px-3">Masuk</button>
            </div>
            <div class="form-group d-md-flex">
                <div class="w-50">
                    <label class="checkbox-wrap checkbox-primary">Remember Me
                        <input type="checkbox" checked>
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="w-50 text-md-right">
                    <a href="?p=login-laboran" style="color: #fff">Login Laboran</a>
                </div>
            </div>
            </form>
            </div>
            </div>
        </div>
    </div>
</section>
