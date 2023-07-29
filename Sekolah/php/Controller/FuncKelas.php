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
        $namaKelas = $data['namaKelas'];
        $wali = $data['waliKelas'];
        
        $query = "INSERT INTO kelas (nama_kelas, wali) values('$namaKelas', '$wali')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    function update($data){
        global $conn;
        $id = $data['id'];
        $namaKelas = $data['namaKelas'];
        $wali = $data['waliKelas'];
        
        $query = "UPDATE kelas SET nama_kelas = '$namaKelas', wali = '$wali' WHERE id_kelas = $id";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    function delete($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas = $id");
        return mysqli_affected_rows($conn);
    }
?>