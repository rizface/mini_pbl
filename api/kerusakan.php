<?php
require("../database/index.php");

$conn = createConnection();

$idRusak = $_GET["id_rusak"];

$query = "
    SELECT * FROM kerusakan  
    INNER JOIN ruangan ON ruangan.id_ruangan = kerusakan.id_ruangan
    INNER JOIN peminjam ON peminjam.id_ruangan = ruangan.id_ruangan
    INNER JOIN mahasiswa ON mahasiswa.id_mahasiswa = peminjam.id_mahasiswa
    WHERE id_rusak = $idRusak
";

$result = mysqli_fetch_assoc(mysqli_query($conn, $query));
$result = json_encode($result);
mysqli_close($conn);
echo $result;