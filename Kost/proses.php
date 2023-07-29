<?php
    $nama = ""; $alamat = ""; $email = ""; $status = ""; $komentar = ""; 
    $lokasi_file = ""; $nama_file = ""; $deskripsi = ""; $direktori = "";
    $data = "";$fp = null;
    if(isset($_POST['pesan'])) {
        $nama = $_POST['nama'];
        $pekerjaan = $_POST['pekerjaan'];
        $alamat = $_POST['alamat'];
        $noktp = $_POST['noktp'];
        $kost = $_POST['kost'];
        $tMulai = $_POST['tMulai'];
        $tSelesai = $_POST['tSelesai'];
        $tanggalMulai = strtotime($tMulai);
        $tanggalSelesai = strtotime($tSelesai);
        $jumlahHari = ($tanggalSelesai - $tanggalMulai) / (60 * 60 * 24);
        $data = "$nama|$pekerjaan|$alamat|$noktp|$kost|$tMulai|$tSelesai|$jumlahHari\n";
        header("location: index.php");
    }
    $fp = fopen("history.txt", "a+");
    fwrite($fp, $data);
    fclose($fp);
?>
