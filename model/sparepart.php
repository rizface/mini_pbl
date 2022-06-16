<?php

class Sparepart {
    /**
     * Find one sparepart by id
     * @param {mysqli | boolean} conn
     * @param {integer} idSparepart
     * @return {array}
     */
    static public function findById($conn, $idSparepart) {
        $query = "
            SELECT * FROM sparepart WHERE id_alat = $idSparepart
        ";

        return mysqli_fetch_assoc(mysqli_query($conn, $query));
    }

    /**
     * Update spareprt stok
     * @param {mysqli | boolean} conn
     * @param {integer} idSparepart
     * @param {integer} qty
     * @return {boolean}
     */
    static public function updateStok($conn, $idSparepart, $qty) {
        $query = "
            UPDATE sparepart SET jumlah_sp = $qty WHERE id_alat = $idSparepart
        ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn) > 0;
    }
}