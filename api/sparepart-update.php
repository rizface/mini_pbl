<?php
require("../database/index.php");

$conn = createConnection();

$requestBody = file_get_contents("php://input");
$data = json_decode($requestBody, true);

$jumlah = $data["jumlah"];
$idAlat = $data["idSparepart"];
$query = null;

if($jumlah > 0) {
    $query = "
        UPDATE sparepart SET jumlah_sp = $jumlah WHERE id_sparepart = $idAlat
    ";
} else {
    $query = "
        DELETE FROM sparepart WHERE id_sparepart = $idAlat
    ";
}
mysqli_query($conn,$query);
$success = ["success" => mysqli_affected_rows($conn) > 0];
mysqli_close($conn);
echo json_encode($success);