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

    /**
     * Find all laporan kerusakan by id laboran
     * @param {mysqli | boolean} conn
     * @param {integer} idLaboran
     * @return {array}
     */
    static public function findByIdLaboran($conn, $idLaboran) {
        $query = "
            SELECT * FROM kerusakan
            INNER JOIN ruangan ON ruangan.id_ruangan = kerusakan.id_ruangan 
            WHERE ruangan.id_laboran = $idLaboran
        ";
        $result = mysqli_fetch_all(mysqli_query($conn, $query), MYSQLI_ASSOC);
        return $result;  
    }

    /**
     * Insert solution
     * @param {mysqli | boolean} conn
     * @param {array} data
     */
    static public function insertSolution($conn, $data) {
        $idRusak = $data["id_rusak"];
        $detail = $data["perbaikan"];
        $query = "
            UPDATE kerusakan SET detail_perbaikan = '$detail' WHERE id_rusak = $idRusak
        ";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn) > 0;
    }

    /**
     * Find laporan by id 
     * @param {mysqli | boolean} conn
     * @param {integer} idRusak
     */
    static public function findById($conn, $idRusak) {
        $query = "
            SELECT * FROM kerusakan WHERE id_rusak = $idRusak
        ";
        $result = mysqli_fetch_assoc(mysqli_query($conn,$query));
        return $result;
    }

    /**
     * Delete laporan
     * @param {mysqli | boolean} conn
     * @param {integer} idRusak
     */
    static public function delete($conn, $idRusak) {
        $query = "
            DELETE FROM kerusakan WHERE id_rusak = $idRusak
        ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn) > 0;
    }
}