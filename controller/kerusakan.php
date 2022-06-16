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

    /**
     * Find all kerusakan by id laboran
     * @param {mysqli | boolean} conn
     * @param {integer} idLaboran
     * @return {array}
     */
    static public function findByIdLaboran($conn, $idLaboran) {
        $data= [];
        $tmp = Laporan::findByIdLaboran($conn, $idLaboran);

        $no = 1;
        foreach($tmp as $t) {
            array_push($data, [
                "no" => $no,
                "id_rusak" => $t["id_rusak"],
                "detail" => $t["detail_rusak"],
                "foto" => $t["foto"]
            ]);
            $no++;
        }

        return $data;
    }

    /**
     * Insert solution
     * @param {mysqli | boolean} conn
     * @param {array} data
     * @return {boolean}
     */
    static public function insertSolution($conn, $data) {
        $dataMap = [
            "id_rusak" => $data["id_rusak"],
            "perbaikan" => $data["detail_perbaikan"]
        ];
        $laporaIsSuccess = Laporan::insertSolution($conn, $dataMap);
        if(isset($data["id_sparepart"])) {
            $sparepart = $data["id_sparepart"];
            $qty = $data["qty"];
            for ($i=0; $i < count($sparepart) ; $i++) {
                $existingSparepart = Sparepart::findById($conn, $sparepart[$i]);
                if(isset($existingSparepart) && $existingSparepart["jumlah_sp"] >= $qty[$i]) {
                    $updateSparepartSuccess = Sparepart::updateStok($conn, $sparepart[$i], $existingSparepart["jumlah_sp"] - $qty[$i]);
                    if($updateSparepartSuccess) {
                        KerusakanSparepart::insert($conn, $data["id_rusak"], $sparepart[$i], $qty[$i]);
                    }
                }
            }
        }
        return true;
    }

    /**
     * Delete kerusakan
     * @param {mysqli | boolean} conn
     * @param {integer} $idRusak
     */
    static public function delete($conn, $idRusak) {
        $existing = Laporan::findById($conn, $idRusak);
        if(!$existing) {
            return false;
        }   

        $dataIsDeleted = Laporan::delete($conn, $idRusak);
        if($dataIsDeleted) {
            unlink($existing["foto"]);
        }

        return true;
    }
}