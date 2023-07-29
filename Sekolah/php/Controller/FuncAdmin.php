<?php 
    include 'connect.php';
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $row = [];
        while($rows = mysqli_fetch_assoc($result)){
            $rows[] = $row; 
        }
        return $rows;
    }
    
?>