<?php 
    include 'connect.php';
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row; 
        }
        return $rows;
    }
    function tambah($data){
        global $conn;
        $hari = $data['hari'];
        $jamMulai = $data['jmMulai'];
        $jamSelesai = $data['jmSelesai'];
        $mapel = $data['mapel'];
        $guru = $data['guru'];
        $kelas = $data['kelas'];
        $ruangKelas = $data['ruangKelas'];
        
        $query = "INSERT INTO jadwal_pelajaran (hari, jam_mulai, jam_selesai, nama_mapel, nama_guru, kelas, ruangan) values('$hari', '$jamMulai', '$jamSelesai', '$mapel', '$guru', '$kelas', '$ruangKelas')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    function update($data){
        global $conn;
        $id = $data['id'];
        $hari = $data['hari'];
        $jamMulai = $data['jmMulai'];
        $jamSelesai = $data['jmSelesai'];
        $mapel = $data['mapel'];
        $guru = $data['guru'];
        $kelas = $data['kelas'];
        $ruangKelas = $data['ruangKelas'];
        
        $query = "UPDATE jadwal_pelajaran SET hari = '$hari', jam_mulai = '$jamMulai', jam_selesai = '$jamSelesai', nama_mapel = '$mapel', nama_guru = '$guru', kelas = '$kelas', ruangan = '$ruangKelas' WHERE id_jadwal = $id";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    function delete($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM jadwal_pelajaran WHERE id_jadwal = $id");
        return mysqli_affected_rows($conn);
    }
?>