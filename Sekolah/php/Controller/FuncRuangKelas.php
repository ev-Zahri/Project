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
        $nama = $data['namaRuangan'];
        $kapasitas = $data['kapasitas'];
        
        $query = "INSERT INTO `ruang_kelas` (nama_ruang, kapasitas) values('$nama', '$kapasitas')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    function update($data){
        global $conn;
        $id = $data['id'];
        $nama = $data['namaRuangan'];
        $kapasitas = $data['kapasitas'];
        
        $query = "UPDATE ruang_kelas SET nama_ruang = '$nama', kapasitas = '$kapasitas' WHERE id_ruang = $id";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    function delete($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM ruang_kelas WHERE id_ruang = $id");
        return mysqli_affected_rows($conn);
    }
?>