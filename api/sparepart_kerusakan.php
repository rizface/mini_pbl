<?php

require("../database/index.php");
$conn = createConnection();
$idRusak = $_GET["id_rusak"];

$query = "
    SELECT * FROM sparepart INNER JOIN kerusakan_sparepart ON kerusakan_sparepart.id_sparepart = sparepart.id_sparepart WHERE kerusakan_sparepart.id_kerusakan = $idRusak;
";
$result = mysqli_fetch_all(mysqli_query($conn, $query), MYSQLI_ASSOC);

mysqli_close($conn);
echo json_encode($result);