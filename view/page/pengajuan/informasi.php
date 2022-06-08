<?php
  $idMahasiswa = $_SESSION["id_mahasiswa"];
  $pengajuan = PengajuanController::findMySubmission($conn, $idMahasiswa);
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
    <h5 class="mb-0"><strong>Informasi Pengajuan Peminjaman</strong></h5>
    <span class="text-secondary">Form <i class="fa fa-angle-right"></i> Kerusakan</span>

    <div class="row mt-3">
      <div class="col-sm-12">
        <!--Default elements-->
        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
          <h6 class="mb-2">Data Pengajuan</h6>

          <form class="form-horizontal mt-4 mb-5">
            <table class="table table-striped table-responsive">
              <tr>
                <th>NIM</th>
                <th>Nama Peminjam</th>
                <th>Dosen</th>
                <th>Ruangan</th>
                <th>Status Pengajuan</th>
                <th>Status Ruangan</th>
                <th>Tanggal Peminjaman</th>
                <th>Jam Pemakaian</th>
                <th>Jam Pengembalian</th>
              </tr>
              <?php foreach($pengajuan as $p) : ?>
                <tr>
                  <td><?= $p["nim"] ?></td>
                  <td><?= $p["mahasiswa"] ?></td>
                  <td><?= $p["dosen"] ?></td>
                  <td><?= $p["no_ruangan"] ?></td>
                  <td>
                    <?php if(!$p["status_pengajuan"]) : ?>
                      <p class="text-danger">Belum Disetujui</p>
                    <?php else : ?>
                      <p class="text-success">Disetujui</p>
                    <?php endif ?>
                  </td>
                  <td><?= $p["status_ruangan"] ?></td>
                  <td><?= $p["tanggal"] ?></td>
                  <td><?= $p["jam_pemakaian"]?></td>
                  <td><?= $p["jam_balik"] ?></td>
                </tr>
              <?php endforeach ?>
            </table>
          </form>
        </div>
        <!--Footer-->
        <div class="row mt-5 mb-4 footer">
          <div class="col-sm-8">
            <span>&copy; All rights reserved 2019 designed by <a class="text-info" href="#">Yandra Muslim</a></span>
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