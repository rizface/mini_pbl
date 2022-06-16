<?php 
try {
    session_start();

    $p = $_GET["p"];
    $page = "./view/page";

    // Load Middleware
    require("./middleware/middleware.php");

    // Load Helper
    require("./helper/helper.php");

    // Load Database Connection
    require("./database/index.php");

    // Load Model
    require("./model/dosen.php");
    require("./model/ruangan.php");
    require("./model/pengajuan.php");
    require("./model/laboran.php");
    require("./model/mahasiswa.php");
    require("./model/laporan.php");
    require("./model/peralatan.php");
    require("./model/kerusakan_sparepart.php");
    require("./model/sparepart.php");

    // Load Controller
    require("./controller/pengajuan.php");
    require("./controller/auth.php");
    require("./controller/kerusakan.php");
    require("./controller/ruangan.php");
    require("./controller/peralatan.php");

    // Create Connection
    $conn = createConnection();

    if(isset($p) && $p !== "login") {
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
    if(!isset($p) || $p === "login") {
        require("$page/auth/login.php");
    }else if($p === "mahasiswa") {
        auth();
        require("$page/pengajuan/pengajuan.php");
    } else if($p === "papan-informasi") {
        auth();
        require("$page/pengajuan/informasi.php");
    } else if($p === "lapor-kerusakan") {
        auth();
        require("$page/pengajuan/lapor_kerusakan.php");
    } else if($p === "dosen") {
        auth();
        require("$page/dosen/index.php");
    } else if($p === "laboran") {
        auth();
        require("$page/laboran/index.php");
    } else if($p === "list-kerusakan") {
        auth();
        require("$page/laboran/kerusakan.php");
    } else if($p === "peralatan") {
        auth();
        require("$page/laboran/peralatan.php");
    } else if($p === "logout") {
        auth();
        session_destroy();
        $_SESSION = [];
        session_unset();
        header("Location: ./");
    }
} catch (\Throwable $th) {
    echo $th->getMessage();
}
?>

<?php 

if(isset($p) && $p !== "login") {
    require("./view/template/general/footer.php");
} else {
    require("./view/template/auth/footer.php");
}
?>
          