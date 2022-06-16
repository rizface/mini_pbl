<?php

class KerusakanSparepart {
    /**
     * Insert sparepart
     * @param {mysqli | boolean} conn
     * @param {integer} idKerusakan
     * @param {integer} idSparepart
     * @param {integer} jumlah
     */    

     static public function insert($conn, $idKerusakan, $sparepart, $jumlah) {
         $query = "
            INSERT INTO kerusakan_sparepart (id_kerusakan, id_sparepart, jumlah) VALUES($idKerusakan, $sparepart, $jumlah)  
         ";
         mysqli_query($conn, $query);
     }
}