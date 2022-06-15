<?php

class Peralatan {
    /**
     * Insert peralata
     * @param {mysqli | boolean} conn
     * @param {array} data
     * @return {boolean}
     */
    static public function insert($conn, $data) {
        $idRuangan = $data["ruangan"];
        $alat = $data["nama_alat"];
        $jumlah = $data["jumlah"];

        $query = "
            INSERT INTO alat_ruangan (id_ruangan, nama_alat, jumlah) VALUES($idRuangan, '$alat', $jumlah)
        ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn) > 0;
    }

    static public function findByIdLaboran($conn, $idLaboran) {
        $query = "
        SELECT * FROM alat_ruangan INNER JOIN ruangan ON ruangan.id_ruangan = alat_ruangan.id_ruangan WHERE ruangan.id_laboran = $idLaboran
        ";
        $result = mysqli_fetch_all(mysqli_query($conn, $query), MYSQLI_ASSOC);

        return $result;
    }
}