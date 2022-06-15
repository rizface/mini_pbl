<?php
require("../database/index.php");
$conn = createConnection();

$idRuangan = $_GET["id_ruangan"];
$query = "SELECT * FROM alat_ruangan WHERE id_ruangan = $idRuangan";
$result = mysqli_fetch_all(mysqli_query($conn,$query),MYSQLI_ASSOC);

mysqli_close($conn);
echo json_encode($result);