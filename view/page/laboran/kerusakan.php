<?php
    $kerusakan = KerusakanController::findByIdLaboran($conn, $_SESSION["id_laboran"]);
    if(isset($_POST["submit"])) {
      $success = KerusakanController::insertSolution($conn,$_POST);
      if($success) {
        alert("Detail Perbaikan Berhasil Ditambahkan");
      }
    }

    $action = isset($_GET["action"]) ? $_GET["action"] : null;
    $idRusak = isset($_GET["id_rusak"]) ? $_GET["id_rusak"] : null;

    if($action !== null && $action === "delete" && $idRusak !== null) {
      $success = KerusakanController::delete($conn, $idRusak);
      if($success) {
        alert("Laporan Kerusakan Berhasil Dihapus", "?p=list-kerusakan");
      } else {
        alert("Laporan Kerusakan Gagal Dihapus", "?p=list-kerusakan");
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

<!--Main Content-->

<div class="row main-content">
<?php require("./view/nav/general/nav.php") ?>
  <!--Content right-->
  <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <h5 class="mb-0"><strong>Detail Kerusakan Barang</strong></h5>
    <span class="text-secondary">Data <i class="fa fa-angle-right"></i> Kerusakan</span>

    <div class="row mt-3">
      <div class="col-sm-12">
        <!--Default elements-->
        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
          <h6 class="mb-2">Data Kerusakan Barang</h6>

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-body">
                  <form action="" method="POST">
                      <div class="form-group">
                        <label class="form-label">Nama Peminjam</label>
                        <input class="form-control" type="text" id="namaPeminjam" disabled>
                      </div>
                      <div class="form-group">
                        <label for="" class="form-label">NIM</label>
                        <input type="text" id="nim" class="form-control" disabled>
                      </div>
                      <div class="form-group">
                        <label for="" class="form-label">No.Ruangan</label>
                        <input type="text" id="noRuangan" class="form-control" disabled>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Detail Kerusakan</label>
                        <div class="accordion" id="accordionExample">
                          <div class="card">
                            <div class="card-header" id="headingOne">
                              <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Klik Disini Untuk Melihat Detail Kerusakan
                                </button>
                              </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                              <div class="card-body" id="detail_kerusakan">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="id_rusak" id="id_rusak">
                      <div class="form-group">
                        <label for="" class="form-label">Langkah Perbaikan</label>
                        <div class="accordion" id="accordionExample">
                          <div class="card">
                              <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Klik Disini Untuk Memasukan Langkah Perbaikan
                                  </button>
                                </h2>
                              </div>
                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                <textarea class="form-control" name="detail_perbaikan" id="detail_perbaikan_input" cols="30" rows="10" placeholder="Masukan Langkah Perbaikan Disini"></textarea>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Sparepart Yang Digunakan Dalam Perbaikan</label>
                        <div class="accordion" id="accordionExample">
                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Klik Disini Untuk Meilihat Sparepart Yang Digunakan Dalam Perbaikan
                                </button>
                              </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body">
                                <table class="display" id="myTable2">
                                  <thead>
                                    <tr>
                                      <th>Nama</th>
                                      <th>Jumlah</th>
                                    </tr>
                                  </thead>
                                  <tbody id="in-use-sparepart"></tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group" >
                          <div id="sparepart">
                            <label for="">Tambah Sparepart Yang Digunakan</label>
                          </div>
                          <a href="" class="btn btn-primary btn-sm" id="tambah-sparepart">Tambah</a>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm" name="submit">Submit</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <form class="form-horizontal mt-4 mb-5">
            <table class="display" id="myTable">
              <thead>
                <tr>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
              </thead>
               
              <tbody>
                <?php foreach($kerusakan as $k) : ?>
                      <tr>
                          <td>
                              <img style="width: 250px;" src="<?= $k["foto"]; ?>" alt="">
                          </td>
                          <td>
                            <a id="detail-kerusakan" data-id-rusak="<?= $k["id_rusak"] ?>" href="#" class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#exampleModal">Detail</a>
                            <a href="?p=list-kerusakan&action=delete&id_rusak=<?= $k["id_rusak"] ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')" class="btn btn-danger btn-sm text-white">
                              Hapus
                            </a>
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