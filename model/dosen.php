<?php
require("./interface/basic_crud.php");

class Dosen implements BasicCrud{
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
}