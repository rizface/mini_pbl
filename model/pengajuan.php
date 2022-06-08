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
     * @param {integer} idMahasiswa
     * @param {integer} ruangan
     * @param {integer} dosen
     * @param {string} tanggal
     * @param {string} jam
     * @return {boolean} 
     */
    public static function create($conn, $idMahasiswa, $ruangan, $dosen, $tanggal, $jam) {
        $query = "
            INSERT INTO peminjam (
                id_mahasiswa, id_ruangan, id_dosen, tanggal_pinjam, waktu_pinjam
            )
            VALUES(
                $idMahasiswa, $ruangan, $dosen, '$tanggal', '$jam'      
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
    static public function findMySubmission($conn) {
        $query = "
            SELECT mahasiswa.nim, mahasiswa.nama as nama_mahasiswa, peminjam.*,dosen.*, ruangan.* FROM 
            peminjam 
            INNER JOIN ruangan ON ruangan.id_ruangan = peminjam.id_ruangan
            INNER JOIN dosen ON dosen.id_dosen = peminjam.id_dosen 
            INNER JOIN mahasiswa ON mahasiswa.id_mahasiswa = peminjam.id_mahasiswa
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
            SELECT mahasiswa.nama as nama_mahasiswa, mahasiswa.nim, dosen.*, peminjam.* FROM 
            peminjam 
            INNER JOIN dosen ON dosen.id_dosen = peminjam.id_dosen
            INNER JOIN ruangan ON ruangan.id_ruangan = peminjam.id_ruangan 
            INNER JOIN mahasiswa ON mahasiswa.id_mahasiswa = peminjam.id_mahasiswa
            WHERE peminjam.id_dosen = $idDosen
        ";
        $result = mysqli_fetch_all(mysqli_query($conn, $query), MYSQLI_ASSOC);

        return $result;
    }

    /**
     * Find pengajuan by laboran id
     * @param {mysqli | boolean} conn
     * @param {integer} idLaboran
     * @param {string} status
     * @return {array}
     */
    static public function findByIdLaboran($conn, $idLaboran, $status) {
        $query = "
            SELECT mahasiswa.nama as nama_mahasiswa, mahasiswa.nim, dosen.*, peminjam.*, ruangan.* 
            FROM 
            peminjam 
            INNER JOIN dosen ON dosen.id_dosen = peminjam.id_dosen
            INNER JOIN ruangan ON ruangan.id_ruangan = peminjam.id_ruangan 
            INNER JOIN mahasiswa ON mahasiswa.id_mahasiswa = peminjam.id_mahasiswa
            WHERE ruangan.id_laboran = $idLaboran AND persetujuan_dosen = '$status'
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
            UPDATE peminjam SET $status WHERE id_pinjam = $idPinjam
        ";
        $result = mysqli_query($conn, $query);

        return mysqli_affected_rows($conn) > 0;
    }

     /**
     * Update Waktu Balik
     * @param {mysqli | boolean} conn
     * @param {integer} idPinjam
     * @param {string} waktuBalik
     * @return {boolean}
     */
    static public function updateWaktuBalik($conn, $idPinjam, $waktuBalik) {
        $query = "
            UPDATE peminjam SET waktu_balik = '$waktuBalik' WHERE id_pinjam = $idPinjam
        ";
        $result = mysqli_query($conn, $query);

        return mysqli_affected_rows($conn) > 0;
    }
}