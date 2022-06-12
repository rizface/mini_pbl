<?php

class KerusakanController {
    /**
     * Create one kerusakan
     * @param {mysql | boolean} conn
     * @param {array} data
     * @return {boolean}
     */
    static public function create($conn, $data) {
        if(!isset($data["kerusakan"]) || !isset($data["id_pinjam"])) {
            return false;
        }

        $existingHistory = Pengajuan::findOneById($conn, $data["id_pinjam"]);
        if(!$existingHistory) {
            return false;
        }

        $data = [
            "idRuangan" => $existingHistory["id_ruangan"],
            "kerusakan" => $data["kerusakan"] ,
            "foto" => $data["foto"]
        ];
        
        $success = Laporan::create($conn, $data);
        return $success;
    }    
}