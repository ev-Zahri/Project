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
        $nama = $data['namaGuru'];
        $mapel = $data['mapel'];
        $nip = $data['nip'];
        
        $query = "INSERT INTO `guru` (nama_guru, nama_mp, NIP) values('$nama', '$mapel', '$nip')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    function update($data){
        global $conn;
        $id = $data['id'];
        $nama = $data['namaGuru'];
        $mapel = $data['mapel'];
        $nip = $data['nip'];
        
        $query = "UPDATE guru SET nama_guru = '$nama', nama_mp = '$mapel', NIP = '$nip' WHERE id_guru = $id";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    function delete($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM guru WHERE id_guru = $id");
        return mysqli_affected_rows($conn);
    }
?>