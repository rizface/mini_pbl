<?php
    $sparepart = SparepartController::findAll($conn);
    if(isset($_POST["submit"])) {
      $data = [
        "nama" => $_POST["nama_alat"],
        "jumlah" => $_POST["jumlah"]
      ];
      $success = SparepartController::insert($conn, $data);
      if($success) {
        alert("Data Sparepart Berhasil Ditambahkan");
      } else {
        alert("Data Sparepart Gagal Ditambahkan");
      }
    }
?>
<div class="container-fluid">
    <!--Header-->
    <div class="row header shadow-sm">

        <!--Logo-->
        <div class="col-sm-3 pl-0 text-center header-logo">
            <div class="bg-theme mr-3 pt-3 pb-2 mb-0">
                <h3 class="logo"><a href="#" class="text-secondary logo"><i class="fa fa-rocket"></i> Selamat Datang
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

    <div class="row main-content">
        <?php require("./view/nav/general/nav.php") ?>
      <!--Content right-->
      <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
        <h5 class="mb-0"><strong>Sparepart Peralatan Lab</strong></h5>
        <span class="text-secondary">Data <i class="fa fa-angle-right"></i>Sparepart Peralatan Lab</span>

        <div class="row mt-3">
          <div class="col-sm-12">
            <!--Default elements-->
            <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
                <h6 class="mb-2">Penambahan Sparepart Alat Lab</h6>
                <form action="" method="post" class="form-horizontal mt-4 mb-5">
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="input-3">Nama Sparepart</label>
                        <div class="col-sm-10">
                            <input required name="nama_alat" type="text" id="input-4" class="form-control" placeholder="Masukkan Nama Sparepart" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="input-3">Jumlah</label>
                        <div class="col-sm-10">
                            <input required name="jumlah" type="number" id="input-4" class="form-control" placeholder="Masukkan Jumlah" />
                        </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-sm-10">
                        <button name="submit" type="submit" class="btn btn-dark">Submit</button>
                    </div>
                    </div>
                </form>
                <h6 class="mb-2">Alat Lab</h6>
                <table class="display" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jumlah</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($sparepart as $s) : ?>
                        <tr id="row-<?= $s['id'] ?>">
                            <td><?= $s["no"] ?></td>
                            <td><?= $s["nama"] ?></td>
                            <td id="count-<?= $s['id'] ?>" ><?= $s["jumlah"] ?></td>
                            <td>
                                <a data-id-sparepart="<?= $s["id"]; ?>" id="tambahSparepart" class="btn btn-primary btn-sm">
                                    <i data-id-sparepart="<?= $s["id"]; ?>" class="fa fa-plus text-white"></i>
                                </a>
                                <a data-id-sparepart="<?= $s["id"]; ?>" id="kurangSparepart" class="btn btn-danger btn-sm">
                                    <i data-id-sparepart="<?= $s["id"]; ?>" class="fa fa-minus text-white"></i>
                                </a>
                                <a data-id-sparepart="<?= $s["id"]; ?>" id="hapusSparepart" class="btn btn-success btn-sm">
                                    <i data-id-sparepart="<?= $s["id"]; ?>" class="fa fa-trash text-white"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
            </div>
            <!--Footer-->
            <div class="row mt-5 mb-4 footer">
              <div class="col-sm-8">
                <span>&copy; All rights reserved 2019 designed by <a class="text-info" href="#">A-Fusion</a></span>
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