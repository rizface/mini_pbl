<?php 
try {
    session_start();

    $p = $_GET["p"];
    $page = "./view/page";

    // Load Helper
    require("./helper/helper.php");

    // Load Database Connection
    require("./database/index.php");

    // Load Model
    require("./model/dosen.php");
    require("./model/ruangan.php");
    require("./model/pengajuan.php");

    // Load Controller
    require("./controller/pengajuan.php");

    // Create Connection
    $conn = createConnection();

    if($p !== "login-dosen" && $p !== "login-laboran") {
        require("./view/template/general/header.php"); 
    } else {
        require("./view/template/auth/header.php");
    }
} catch (\Throwable $th) {
    echo $th->getMessage();
}
?>

<?php
try {
    if(!isset($p)) {
        require("$page/pengajuan/pengajuan.php");
    } else if($p === "papan-informasi") {
        require("$page/pengajuan/informasi.php");
    } else if($p === "lapor-kerusakan") {
        require("$page/pengajuan/lapor_kerusakan.php");
    } else if($p === "login-laboran") {
        require("$page/auth/login-laboran.php");
    } else if($p === "login-dosen") {
        require("$page/auth/login-dosen.php");
    }
} catch (\Throwable $th) {
    echo $th->getMessage();
}
?>

<?php 

if(!$isAuthPath) {
    require("./view/template/general/footer.php");
} else {
    require("./view/template/auth/footer.php");
}
?>
          