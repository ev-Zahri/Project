<?php
    $conn = new mysqli('localhost', 'root', '', 'sekolah');
    if(!$conn){
        die(mysqli_error($conn));
    }
?>