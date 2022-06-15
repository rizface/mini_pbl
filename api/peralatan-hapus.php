<?php
require("../database/index.php");

$conn = createConnection();

$requestBody = file_get_contents("php://input");
$data = json_decode($requestBody, true);

$idAlat = $data["idAlat"];

$query = "
DELETE FROM alat_ruangan WHERE id_alat = $idAlat
";

mysqli_query($conn,$query);
$success = ["success" => mysqli_affected_rows($conn) > 0];
mysqli_close($conn);
echo json_encode($success);