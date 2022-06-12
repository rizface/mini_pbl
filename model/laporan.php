<?php

class Laporan {
    /**
     * Create new laporan
     * @param {mysqli | boolean} conn
     * @param {array} data
     * @return {boolean}
     */
    static public function create($conn, $data) {
        $idRuangan = $data['idRuangan'];
        $kerusakan = $data['kerusakan'];
        $foto = $data["foto"];
        $query = "
            INSERT INTO kerusakan (id_ruangan, detail_rusak, foto) VALUES($idRuangan, '$kerusakan', '$foto')
        ";
        $resut = mysqli_query($conn,$query);
        return mysqli_affected_rows($conn) > 0;
    }    
}