<?php

class AuthController {
    /**
     * Login
     * @param {mysql | boolean}
     * @param {string} level
     * @param {string} username
     * @param {string} password
     * @return {boolean}
     */
    static public function Login($conn,$level, $username, $password) {
        $account = null;
        switch ($level) {
            case 'mahasiswa':
                $account = Mahasiswa::findOneByUsername($conn, $username);
                break;
            case 'dosen':
                $account = Dosen::findOneByUsername($conn, $username);
                break;
            case 'laboran':
                $account = Laboran::findOneByUsername($conn, $username);
                break;
            default:
                return false;
            break;
        }

        if(password_verify($password, $account["password"])) {
            $_SESSION = [
                "login" => true,
                "username" => $username,
                "level" => $level
            ];
            if($level === "dosen") {
                $_SESSION["id_dosen"] = $account["id_dosen"]; 
                $_SESSION["nama_dosen"] = $account["nama_dosen"];
                $_SESSION["nidn"] = $account["nidn"];
            } else if($level === "laboran") {
                $_SESSION["id_laboran"] = $account["id_laboran"];
                $_SESSION["nip"] = $account["nip"];
            } else if($level === "mahasiswa") {
                $_SESSION["id_mahasiswa"] = $account["id_mahasiswa"];
                $_SESSION["nim"] = $account["nim"];
                $_SESSION["nama"] = $account["nama"];
            }
            return true;
        } else {
            return false;
        }
    }
}