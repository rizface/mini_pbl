<?php

class SparepartController {
    /**
     * Get all sparepart
     * @param {mysqli | boolean} conn
     * @return {array}
     */
    static public function findAll($conn) {
        $tmp = Sparepart::findAll($conn);
        $result = [];
        
        $no = 1;
        foreach($tmp as $t) {
            $result[] = [
                "no" => $no,
                "id" => $t["id_sparepart"],
                "nama" => $t["nama_sp"],
                "jumlah" => $t["jumlah_sp"]
            ];
            $no++;
        }

        return $result;
    }

    /**
     * Insert new sparepart
     * @param {mysqli | boolean} conn
     * @param {array} data
     * @return {boolean}
     */
    static public function insert($conn, $data) {
        return Sparepart::insert($conn, $data);
    }
}