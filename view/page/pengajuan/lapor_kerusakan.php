<?php
  if(isset($_POST["submit"])) {
    $file = $_FILES["foto_kerusakan"];
    $size = $file["size"];
    $tmpPath = $file["tmp_name"];
    $mimeType = mime_content_type($tmpPath);
    
    $allowedMimeType = [
      "image/png", "image/jpg", "image/jpeg"
    ];
    $sizeIsAllowed = $size <= 2000000;
    $mimeIsAllowed = array_search($mimeType,$allowedMimeType);

    if($sizeIsAllowed && $mimeIsAllowed !== false) {
      $fileExtension = explode(".",$file["name"]);
      $randomizeFileName = base64_encode($file["name"].$tmpPath).".".end($fileExtension);
      $uploadPath = "assets/uploaded/$randomizeFileName";
      $success = move_uploaded_file($tmpPath, $uploadPath);
      if($success) {
        $idPinjam = explode(".",base64_decode($_POST["kode_pinjam"]))[0];
        $keterangan = $_POST["keterangan"];
        $data = [
          "id_pinjam" => $idPinjam,
          "kerusakan" => $keterangan,
          "foto" => $uploadPath
        ];

        $success = KerusakanController::create($conn, $data);
        if($success) {
          alert("Pelaporan Kerusakan Berhasil");
        } else {
          unlink($uploadPath);
          alert("Pelaporan Kerusakan Gagal");
        } 
      } else {
        alert("Upload File Gagal");
      }
    } else {
      alert("Pelaporan Kerusakan Gagal Diajukan");
    }
  }
?>
<!--Page Wrapper-->

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
    <h5 class="mb-0"><strong>Laporan Kerusakan</strong></h5>
    <span class="text-secondary">Form <i class="fa fa-angle-right"></i> Form Laporan Kerusakan</span>

    <div class="row mt-3">
      <div class="col-sm-12">
        <!--Default elements-->
        <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
          <h6 class="mb-2">Form Laporan Kerusakan</h6>

          <form class="form-horizontal mt-4 mb-5" method="post" action="" enctype="multipart/form-data">
            <div class="form-group row">
              <label class="control-label col-sm-2" for="input-1">Kode Peminjam</label>
              <div class="col-sm-10">
                <input name="kode_pinjam" type="text" class="form-control" id="input-1" placeholder="Masukkan Kode Peminjaman" />
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-sm-2" for="input-1">Detail Kerusakan</label>
              <div class="col-sm-10">
                <textarea name="keterangan" name="editor1"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-sm-2" for="input-1">Foto Kerusakan</label>
              <div class="col-sm-10">
                <input name="foto_kerusakan" type="file" class="form-control" id="input-1" />
              </div>
            </div>
            <div class="form-group">
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