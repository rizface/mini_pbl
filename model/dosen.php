<?php
class Dosen{
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

            $query = "INSERT INTO dosen (nama, username, password) VALUES('$nama', '$username', '$password')";

            return mysqli_insert_id($conn);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }
    }

    /**
     * Get all dosen
     * @return {array}
     */
    static public function findAll($conn) {
        $query = "SELECT * FROM dosen";
        $result = mysqli_fetch_all(mysqli_query($conn, $query), MYSQLI_ASSOC);

        return $result;
    }
}