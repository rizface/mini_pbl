<?php

require("../database/index.php");
$conn = createConnection();

$query = "SELECT * FROM sparepart";
$result = mysqli_fetch_all(mysqli_query($conn, $query), MYSQLI_ASSOC);

mysqli_close($conn);
echo json_encode($result);