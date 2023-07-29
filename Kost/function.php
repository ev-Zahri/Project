<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'kost');
    function query($query){                         // function dengan parameter query seperti select
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
?>