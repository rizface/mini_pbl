<?php
class Laboran {
    /** 
     * Create new dosen data 
     * @param {mysqli | boolean} $conn
     * @param {array} $data
     * @return {integer} 
     */ 
    static public function insert($conn, $data) {
        try {
            $username = $data["username"];
            $nama = $data["nama"];
            $password = password_hash($data["password"],PASSWORD_DEFAULT);

            $query = "INSERT INTO laboran (nama, username, password) VALUES('$nama', '$username', '$password')";

            return mysqli_insert_id($conn);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }
    }

    /**
     * Find one laboran by username
     * @param {mysqli | boolean}
     * @param {string} username
     * @return {array}
     */
    static public function findOneByUsername($conn, $username) {
        $query = "
            SELECT * FROM laboran WHERE username = '$username'
        ";
        $result = mysqli_fetch_assoc(mysqli_query($conn,$query));
        return $result;
    }
}