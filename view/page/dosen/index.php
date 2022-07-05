<?php

    $id_dosen = $_SESSION["id_dosen"];
    $pengajuan = PengajuanController::findByDosenId($conn, $id_dosen);
    
    $idPinjam = isset($_GET["id_pinjam"]) ? $_GET["id_pinjam"] : null;
    $status = isset($_GET["status"]) ? $_GET["status"] : null;
    if(isset($idPinjam) && isset($status)) {
        $status = "persetujuan_dosen = '$status'";
        $success = PengajuanController::updateStatus($conn, $idPinjam, $status);
        if($success) {
            alert("Status Peminjaman Berhasil Diupdate", "?p=dosen");
        } else {
            alert("Status Peminjaman Gagal Diupdate", "?p=dosen");
        }
    }
?>
<div class="container-fluid">

<!--Header-->
<div class="row header shadow-sm">

    <!--Logo-->
    <div class="col-sm-3 pl-0 text-center header-logo">
        <div class="bg-theme mr-3 pt-3 pb-2 mb-0">
            <h3 class="logo"><a href="#" class="text-secondary logo"><i class="fa fa-rocket"></i> WELCOME
                    
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
        <h5 class="mb-0"><strong>Data Pengajuan Ruangan</strong></h5>
        <span class="text-secondary">Data <i class="fa fa-angle-right"></i> Pengajuan</span>

        <div class="row mt-3">
            <div class="col-sm-12">
                <!--Default elements-->
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                    <h6 class="mb-2">Pengajuan Ruangan</h6>
                    <!-- <div class="search-rounded mr-3">
                    <input type="text" class="form-control search-box" placeholder="Enter keywords.." />
                    </div> -->
                    <form class="form-horizontal mt-4 mb-5">
                        <table class="display" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nim</th>
                                    <th>Dosen</th>
                                    <th>Ruangan</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Jam Peminjaman</th>
                                    <th>Teruskan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($pengajuan as $p) : ?>
                                    <tr>
                                        <td><?= $p["no"] ?></td>
                                        <td><?= $p["mahasiswa"] ?></td>
                                        <td><?= $p["nim"] ?></td>
                                        <td><?= $p["dosen"] ?></td>
                                        <td><?= $p["ruangan"] ?></td>
                                        <td><?= $p["tanggal_pinjam"] ?></td>
                                        <td><?= $p["jam_pinjam"] ?></td>
                                        <td>
                                        <?php if(is_null($p["status"])) : ?>
                                                <a 
                                                href="?p=dosen&id_pinjam=<?= base64_encode($p["id_peminjaman"])?>&status=disetujui" class="btn btn-primary btn-sm text-white">
                                                    Teruskan
                                                </a>
                                                <a href="?p=dosen&id_pinjam=<?= base64_encode($p["id_peminjaman"])?>&status=ditolak" class="btn btn-danger btn-sm text-white">
                                                    Tolak
                                                </a>
                                        <?php endif ?>
                                        </td>
                                        <td>
                                            <?php if(is_null($p["status"])) : ?>
                                                <p class="text-secondary">-</p>
                                            <?php elseif($p["status"] === "ditolak") : ?>
                                                <p class="text-danger">Ditolak</p>
                                            <?php elseif($p["status"] === "disetujui") : ?>
                                                <p class="text-success">
                                                    Diteruskan Pada Laboran
                                                </p>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </form>
                </div>
                <!--Footer-->
                <div class="row mt-5 mb-4 footer">
                    <div class="col-sm-8">
                        <span>&copy; All rights reserved 2019 designed by <a class="text-info"
                                href="#">A-Fusion</a></span>
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