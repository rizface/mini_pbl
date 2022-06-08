<?php
require("../database/index.php");

try {
    $conn = createConnection();
if(!$conn) {
    echo "DATABASE CONNECTION FAILED!!!";
    return;
}

$dataDosen = [
    [
        "username" => "dosen1",
        "nidn" => "33121010110",
        "nama" => "dosen1",
        "password" => password_hash("dosen1", PASSWORD_DEFAULT)
    ]
];

$dataLaboran = [
    [
        "nip" => "3312101017",
        "username" => "laboran1",
        "nama" => "laboran1",
        "password" => password_hash("laboran1", PASSWORD_DEFAULT)
    ]
];

$dataRuang = [
    [
        "no_ruangan" => 703      
    ]
];

$dataMahasiswa = [
    [
        "nama" => "muhammad al farizzi",
        "nim" => "3312101017",
        "username" => "mahasiswa1",
        "password" => password_hash("mahasiswa1", PASSWORD_DEFAULT)
    ]
];

$laboran = [];

// Input data dosen
foreach ($dataDosen as $dosen) {
    $username = $dosen["username"];
    $nama_dosen = $dosen["nama"];
    $password = $dosen["password"];
    $nidn = $dosen["nidn"];

    $query = "INSERT INTO dosen (nidn, nama_dosen, username, password) VALUES('$nidn', '$nama_dosen', '$username', '$password')";
    mysqli_query($conn, $query);
}

// Input data laboran
foreach ($dataLaboran as $laboran) {
    $username = $laboran["username"];
    $password = $laboran["password"];
    $nip = $laboran["nip"];
    $query = "INSERT INTO laboran (nip, username, password) VALUES($nip, '$username', '$password')";
    mysqli_query($conn, $query);
    $laboran[] = mysqli_insert_id($conn);
}

// Input data ruangan
foreach ($dataRuang as $key => $ruangan) {
    $noRuangan = $ruangan["no_ruangan"];
    $idLaboran = $laboran[$key];

    $query = "INSERT INTO ruangan (id_laboran, no_ruangan) VALUES($idLaboran, $noRuangan)";
    mysqli_query($conn, $query);
}

// Input data ruangan
foreach ($dataMahasiswa as $m) {
    $nama = $m["nama"];
    $nim = $m["nim"];
    $password = $m["password"];
    $username = $m["username"];

    $query = "
        INSERT INTO mahasiswa (nama, nim, username, password) VALUES('$nama', '$nim', '$username', '$password')
    ";
    mysqli_query($conn, $query);
}

echo "INPUT DATA SUCCESS";
} catch (\Throwable $th) {
    echo $th->getMessage();
}