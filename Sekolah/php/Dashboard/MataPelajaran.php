<?php
    include '../Controller/connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../css/Dashboard/MataPelajaran.css">
</head>
<body>
    <div class="navbar">
    <a href="home.php" id="home">Logo</a>
        <div class="menu">
            <a href="AboutUs.php">About Us</a>
            <a href="Contact.php">Contact</a>
            <a href="Login.php">Login</a>
        </div>
    </div>
    </div>
    <div class="Content1">
        <div class="content">
            <h1>Kelas 10</h1>
            <div class="grade10">
            <?php 
                $sql = 'select * from `mata_pelajaran` where kelas_mp = 10';
                $result = mysqli_query($conn, $sql);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id_mp'];
                        $nama_mp = $row['nama_mp'];
                        $pengampu_mp = $row['pengampu_mp'];
                        $kode_mp = $row['kode_mp'];
                        $kelompok_mp = $row['kelompok_mp'];
                        $jumlahSks_mp = $row['jumlah_sks_mp'];
                        echo '
                            <div class="card">
                                <p>'.$nama_mp.'</p>
                                <p>'.$pengampu_mp.'</p>
                                <p>'.$kode_mp.'</p>
                                <p>'.$kelompok_mp.'</p>
                                <p>'.$jumlahSks_mp.'</p>
                            </div>
                        ';
                    }
                }
            ?>
            </div>
        </div>
        <div class="content">
            <h1>Kelas 11</h1>
            <div class="grade11">
            <?php 
                $sql = 'select * from `mata_pelajaran` where kelas_mp = 11';
                $result = mysqli_query($conn, $sql);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id_mp'];
                        $nama_mp = $row['nama_mp'];
                        $pengampu_mp = $row['pengampu_mp'];
                        $kode_mp = $row['kode_mp'];
                        $kelompok_mp = $row['kelompok_mp'];
                        $jumlahSks_mp = $row['jumlah_sks_mp'];
                        echo '
                            <div class="card">
                                <p>'.$nama_mp.'</p>
                                <p>'.$pengampu_mp.'</p>
                                <p>'.$kode_mp.'</p>
                                <p>'.$kelompok_mp.'</p>
                                <p>'.$jumlahSks_mp.'</p>
                            </div>
                        ';
                    }
                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>