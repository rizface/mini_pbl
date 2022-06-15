<?php

class PeralatanController {
    /**
     * Insert peralatan
     * @param {mysqli | boolean} conn
     * @param {array} data
     * @return {boolean}
     */
    static public function insert($conn, $data) {
        if(!isset($data["nama_alat"]) || !isset($data["jumlah"]) || $data["jumlah"] < 1) {
            return false;
        }

        return Peralatan::insert($conn, $data);
    }

    /**
     * Find peralatan by id laboran
     * @param {mysqli | boolean} conn
     * @param {integer} id
     * @return {array}
     */
    static public function findByIdLaboran($conn, $idLaboran) {
        $tmp = Peralatan::findByIdLaboran($conn, $idLaboran);
        $result = [];

        $no = 1;
        foreach ($tmp as $t) {

            array_push($result, [
                "no" => $no,
                "id_alat" => $t["id_alat"],
                "nama_alat" => $t["nama_alat"],
                "jumlah" => $t["jumlah"],
                "ruangan" => $t["no_ruangan"]
            ]);

            $no+=1;
        }

        return $result;
    }
}