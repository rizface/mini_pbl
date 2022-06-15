<?php
require("../database/index.php");

$conn = createConnection();

$requestBody = file_get_contents("php://input");
$data = json_decode($requestBody, true);

$jumlah = $data["stok"];
$idAlat = $data["idAlat"];
$query = null;

if($jumlah > 0) {
    $query = "
        UPDATE alat_ruangan SET jumlah = $jumlah WHERE id_alat = $idAlat
    ";
} else {
    $query = "
        DELETE FROM alat_ruangan WHERE id_alat = $idAlat
    ";
}
mysqli_query($conn,$query);
$success = ["success" => mysqli_affected_rows($conn) > 0];
mysqli_close($conn);
echo json_encode($success);