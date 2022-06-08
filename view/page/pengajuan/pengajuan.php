<?php
    $dosen = Dosen::findAll($conn);
    $ruangan = Ruangan::findAll($conn);

    if(isset($_POST["submit"])) {
        $isSuccess = PengajuanController::create($conn, $_POST);
        if($isSuccess) {
            alert("Data Peminjaman Berhasil Ditambahkan", "?p=papan-informasi");
        } else {
            alert("Peminjaman Gagal Diajukan");
        }
    }
?>
<div class="container-fluid">

<!--Header-->
<div class="row header shadow-sm">

    <!--Logo-->
    <div class="col-sm-3 pl-0 text-center header-logo">
        <div class="bg-theme mr-3 pt-3 pb-2 mb-0">
            <h3 class="logo"><a href="#" class="text-secondary logo"><i class=""></i> WELCOME</a>
            </h3>
        </div>
    </div>
    <!--Logo-->

    <!--Header Menu-->
    <div class="col-sm-9 header-menu pt-2 pb-0">
        <div class="row">

            <!--Menu Icons-->
            <div class="col-sm-4 col-8 pl-0">
                <!--Toggle sidebar-->
                <span class="menu-icon" onclick="toggle_sidebar()">
                    <span id="sidebar-toggle-btn"></span>
                </span>
                <!--Toggle sidebar-->
            </div>
            <!--Menu Icons-->
        </div>
    </div>
    <!--Header Menu-->
</div>
<!--Header-->

<!--Main Content-->

<div class="row main-content">

    <?php require("./view/nav/general/nav.php") ?>

    <!--Content right-->
    <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
        <h5 class="mb-0"><strong>Peminjaman Ruangan</strong></h5>
        <span class="text-secondary">Form <i class="fa fa-angle-right"></i> Form Peminjaman Ruangan</span>

        <div class="row mt-3">
            <div class="col-sm-12">
                <!--Default elements-->
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                    <h6 class="mb-2">Form Peminjaman Ruangan</h6>

                    <form class="form-horizontal mt-4 mb-5" method="POST" action="">
                        <div class="form-group row">
                            <label class="control-label col-sm-2" for="input-3">Dosen</label>
                            <div class="col-sm-10">
                                <select name="dosen" id="nama_brg" class="form-control">
                                    <option value="" disabled selected>Dosen Penanggung Jawab</option>
                                    <?php foreach($dosen as $d) : ?>
                                        <option value="<?= $d["id_dosen"]; ?>"><?= $d["nama_dosen"]; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2" for="input-3">Ruangan</label>
                            <div class="col-sm-10">
                                <select name="ruangan" id="nama_brg" class="form-control">
                                    <option value="" disabled selected>Ruangan</option>
                                    <?php foreach($ruangan as $r) : ?>
                                        <option value="<?= $r["id_ruangan"] ?>">Ruang <?= $r["no_ruangan"] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2" for="input-5">Tanggal Peminjaman</label>
                            <div class="col-sm-10">
                                <input name="tanggal" type="date" class="form-control" id="input-5" placeholder="11/11/2019" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-2" for="input-6">Jam Peminjaman</label>
                            <div class="col-sm-10">
                                <input name="jam" type="time" class="form-control" id="input-6" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button name="submit" type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--Footer-->
                <div class="row mt-5 mb-4 footer">
                    <div class="col-sm-8">
                        <span>&copy; All rights reserved 2019 designed by <a class="text-info" href="#">Yandra
                                Muslim</a></span>
                    </div>
                    <div class="col-sm-4 text-right">
                        <a href="#" class="ml-2">Contact Us</a>
                        <a href="#" class="ml-2">Support</a>
                    </div>
                </div>
                <!--Footer-->

            </div>
        </div>

        <!--Main Content-->

    </div>
</div>
</div>