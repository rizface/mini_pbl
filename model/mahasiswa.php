<?php

class Mahasiswa {
    /**
     * Find one mahasiswa by username
     * @param {mysqli | boolean} conn
     * @param {string} username
     * @return {array}
     */
    static public function findOneByUsername($conn, $username) {
        $query = "
            SELECT * FROM mahasiswa WHERE username = '$username'
        ";
        $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
        return $result;
    }
}