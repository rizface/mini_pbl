<?php

class Ruangan {
    /**
     * Find all ruangan
     * @param {mysqli | boolean}
     * @return {array} 
     */    
    static public function findAll($conn) {
        $query = "SELECT * FROM ruangan";
        $result = mysqli_fetch_all(mysqli_query($conn, $query),MYSQLI_ASSOC);

        return $result;
    }

    /**
     * Find by laboran id
     * @param {mysqli | boolean} conn
     * @param {string} idLaboran
     * @return {array} 
     */
    static public function findBuLaboranId($conn, $idLaboran) {
        $query = "
            SELECT * FROM ruangan WHERE id_laboran = $idLaboran
        ";
        $result = mysqli_fetch_all(mysqli_query($conn, $query),MYSQLI_ASSOC);
        
        return $result;
    }
}