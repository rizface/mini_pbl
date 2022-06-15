<?php

class RuanganController {
    static public function findByLaboranId($conn, $idLaboran) {
        $result = Ruangan::findBuLaboranId($conn, $idLaboran);
        return $result;
    }
}