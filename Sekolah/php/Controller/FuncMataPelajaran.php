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
        $nama = $data['namaMapel'];
        $pengampu = $data['pengampu'];
        
        $query = "INSERT INTO `mata_pelajaran` (nama_mp, pengampu) values('$nama', '$pengampu')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    function update($data){
        global $conn;
        $id = $data['id'];
        $nama = $data['namaMapel'];
        $pengampu = $data['pengampu'];
        
        $query = "UPDATE mata_pelajaran SET nama_mp = '$nama', pengampu = '$pengampu' WHERE id_mp = $id";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    function delete($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM mata_pelajaran WHERE id_mp = $id");
        return mysqli_affected_rows($conn);
    }
?>