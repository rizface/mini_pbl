<?php

class Pengajuan {
    /**
     * Check if the submission is exists
     * $conn {mysqli | boolean}
     * @param {integer} - id ruangan
     * @param {string} - tanggal pinjam
     * @param {string} - jam pinjam
     * @return {boolean}
     */ 
    static function checkIfSubmissionExists($conn, $ruangan, $tanggal, $jam) {
        $query = "
            SELECT * FROM peminjam WHERE id_ruangan = $ruangan AND tanggal_pinjam = '$tanggal' AND waktu_pinjam = '$jam'
        ";

        $result = mysqli_fetch_assoc(mysqli_query($conn, $query));
        return isset($result);
    }    

    /**
     * Create new pengajuan
     * @param {mysqli | boolean}
     * @param {string} nim
     * @param {string} nama
     * @param {integer} ruangan
     * @param {integer} dosen
     * @param {string} tanggal
     * @param {string} jam
     * @return {boolean} 
     */
    public static function create($conn, $nim, $nama, $ruangan, $dosen, $tanggal, $jam) {
        $query = "
            INSERT INTO peminjam (
                nim, nama, id_ruangan, id_dosen, tanggal_pinjam, waktu_pinjam
            )
            VALUES(
                '$nim', '$nama', $ruangan, $dosen, '$tanggal', '$jam'      
            )
        ";

        $result = mysqli_query($conn, $query);
        $isSuccess = mysqli_affected_rows($conn) > 0;
        return $isSuccess;
    }

    /**
     * Get all pengajuan
     * @param {mysqli | boolean}
     * @return {array}
     */
    static public function findAll($conn) {
        $query = "
            SELECT * FROM peminjam INNER JOIN ruangan ON ruangan.id_ruangan = peminjam.id_ruangan
            INNER JOIN dosen ON dosen.id_dosen = peminjam.id_dosen 
        ";
        $result = mysqli_fetch_all(mysqli_query($conn, $query),MYSQLI_ASSOC);
        return $result;
    }

    /**
     * Find pengajuan by dosen id
     * @param {mysqli | boolean} conn
     * @param {integer} idDosen
     * @return {array}
     */
    static public function findByIdDosen($conn, $idDosen) {
        $query = "
            SELECT * FROM peminjam INNER JOIN dosen ON dosen.id_dosen = peminjam.id_dosen
            INNER JOIN ruangan ON ruangan.id_ruangan = peminjam.id_ruangan WHERE peminjam.id_dosen = $idDosen
        ";
        $result = mysqli_fetch_all(mysqli_query($conn, $query), MYSQLI_ASSOC);

        return $result;
    }

     /**
     * Update status peminjaman
     * @param {mysqli | boolean} conn
     * @param {integer} idPinjam
     * @param {string} status
     * @return {boolean}
     */
    static public function updateStatus($conn, $idPinjam, $status) {
        $query = "
            UPDATE peminjam SET persetujuan_dosen = '$status' WHERE id_pinjam = $idPinjam
        ";
        $result = mysqli_query($conn, $query);

        return mysqli_affected_rows($conn) > 0;
    }
}