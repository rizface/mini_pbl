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
            SELECT * FROM sparepart WHERE id_sparepart = $idSparepart
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
            UPDATE sparepart SET jumlah_sp = $qty WHERE id_sparepart = $idSparepart
        ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn) > 0;
    }

    /**
     * Find all sparepart
     * @param {mysqli | boolean} conn
     * @return {array}
     */
    static public function findAll($conn) {
        $query = "
            SELECT * FROM sparepart
        ";
        $result = mysqli_fetch_all(mysqli_query($conn, $query), MYSQLI_ASSOC);
        return $result;
    }

    static public function insert($conn, $data) {
        $nama = $data["nama"];
        $jumlah = $data["jumlah"];
        $query = "INSERT INTO sparepart (nama_sp,jumlah_sp) VALUES('$nama',$jumlah)";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn) > 0;
    }
}