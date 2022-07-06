<?php
    if(isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $level = $_POST["level"];

        $loginIsSuccess = AuthController::Login($conn, $level, $username, $password);
        if($loginIsSuccess) {
            alert("Login Berhasil", "?p=$level");
        } else {
            alert("Login Gagal");
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
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
            <div class="form-group">
                <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>
            <div class="form-group">
              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Mahasiswa</label>
                        <input type="radio" name="level" value="mahasiswa">
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Dosen</label>
                        <input type="radio" name="level" value="dosen">
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Laboran</label>
                        <input type="radio" name="level" value="laboran">
                      </div>
                  </div>
              </div>
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="form-control btn btn-primary submit px-3">Masuk</button>
            </div>
            </form>
            </div>
            </div>
        </div>
    </div>
</section>
