<?php
require("../database/index.php");

try {
    $conn = createConnection();

    $requestBody = file_get_contents("php://input");
    $data = json_decode($requestBody, true);

    $idSparepart = $data["idSparepart"];

    $query = "
    DELETE FROM sparepart WHERE id_sparepart = $idSparepart
    ";

    mysqli_query($conn,$query);
    $success = ["success" => mysqli_affected_rows($conn) > 0];
    mysqli_close($conn);
    echo json_encode($success);
} catch (\Throwable $th) {
    echo $th->getMessage();
}