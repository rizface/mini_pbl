<?php

class PengajuanController {
    static public function create($conn, $data) {
        $nama = $data["nama"];
        $nim = $data["nim"];
        $dosen = $data["dosen"];
        $ruangan = $data["ruangan"];
        $tanggal = $data["tanggal"];
        $jam = $data["jam"];

        // Check if the submission with the same ruangan, tanggal, and jam is exists;
        $submissionIsExists = Pengajuan::checkIfSubmissionExists($conn, $ruangan, $tanggal, $jam);
        if($submissionIsExists) {
            return false;
        } else {
            $isSuccess = Pengajuan::create($conn, $nim, $nama, $ruangan, $dosen, $tanggal, $jam);
            return $isSuccess;
        }
    }

    /**
     * Find all pengajuan
     * @param {mysqli | boolean}
     * @return {array}
     */
    static public function findAll($conn) {
        $tmpResult = Pengajuan::findAll($conn);
        $pengajuan = [];

        foreach($tmpResult as $t) {
            array_push($pengajuan,[
                "id_pinjam" => $t["id_pinjam"],
                "nim" => $t["nim"],
                "peminjam" => $t["nama"],
                "no_ruangan" => $t["no_ruangan"],
                "dosen" => $t["nama_dosen"],
                "status_pengajuan" => $t["persetujuan_dosen"] && $t["persetjuan_laboran"] ? true : false,
                "status_ruangan" => is_string($t["status_ruangan"]) ? "Sedang Digunakan" : "Tidak Digunakan",
                "jam_pemakaian" => $t["waktu_pinjam"],
                "jam_balik" => is_null($t["waktu_balik"]) ? "-" : $t["waktu_balik"],
                "tanggal" => $t["tanggal_pinjam"]
            ]);
        }

        return $pengajuan;
    }

    /**
     * Find peminjaman by id dosen
     * @param {mysqli | boolean} conn
     * @param {integer} idDosen
     * @return {array}
     */
    static public function findByDosenId($conn,$idDosen) {
        $tmp = Pengajuan::findByIdDosen($conn, $idDosen);
        $pengajuan = [];
        $no = 1;

        foreach($tmp as $t) {
            array_push($pengajuan, [
                "no" => $no,
                "id_peminjaman" => $t["id_pinjam"],
                "nama" => $t["nama"],
                "nim" => $t["nim"],
                "dosen" => $t["nama_dosen"],
                "ruangan" => $t["no_ruangan"],
                "tanggal_pinjam" => $t["tanggal_pinjam"],
                "jam_pinjam" => $t["waktu_pinjam"],
                "status" => $t["persetujuan_dosen"],
            ]);
            $no++;
        }

        return $pengajuan;
    }

    /**
     * Update status peminjaman
     * @param {mysqli | boolean} conn
     * @param {integer} idPinjam
     * @param {string} status
     */
    static public function updateStatus($conn, $idPinjam, $status) {
        $decodedIdPinjam = base64_decode($idPinjam);
        $success = Pengajuan::updateStatus($conn,$decodedIdPinjam, $status);

        return $success;
    }
}