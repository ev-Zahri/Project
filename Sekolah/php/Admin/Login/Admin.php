<?php 
    include '../../Controller/connect.php';
    include '../../Controller/FuncAdmin.php';
    session_start();
    if($_SESSION['login'] == false){
        echo "
            <script>
                alert('Anda Bukan Admin !!');
                window.location.href = '../../Dashboard/home.php';
            </script>
        ";
    }
    $result = mysqli_query($conn, 'SELECT count(*) AS jmlJadwal FROM jadwal_pelajaran');
    $row = mysqli_fetch_assoc($result);
    $jmlJadwal = $row["jmlJadwal"];
    
    $result = mysqli_query($conn, 'SELECT count(*) AS jmlGuru FROM guru');
    $row = mysqli_fetch_assoc($result);
    $jmlGuru = $row["jmlGuru"];

    $result = mysqli_query($conn, 'SELECT count(*) AS jmlRuang FROM ruang_kelas');
    $row = mysqli_fetch_assoc($result);
    $jmlRuang = $row["jmlRuang"];

    $result = mysqli_query($conn, 'SELECT count(*) AS jmlKelas FROM kelas');
    $row = mysqli_fetch_assoc($result);
    $jmlKelas = $row["jmlKelas"];

    $result = mysqli_query($conn, 'SELECT count(*) AS jmlMapel FROM mata_pelajaran');
    $row = mysqli_fetch_assoc($result);
    $jmlMapel = $row["jmlMapel"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/Admin/Admin.css">
    
</head>
<body>
    <div class="navbar">
    <a href="../Dashboard/home.php" id="home">Logo</a>
        <div class="menu">
            <a href="../../Dashboard/AboutUs.php">About Us</a>
            <a href="../../Dashboard/Contact.php">Contact</a>
            <a href="../../Dashboard/home.php">Log Out</a>
        </div>
    </div>
    <div class="sidebar">
        <div class="profile">
            <img src="../../../Img/admin.jpg" alt="">
            <h4><a href="Admin.php">Admin</a></h4>
        </div>
        <div class="option">
            <a href="../JadwalPelajaran/JadwalPelajaran.php">Jadwal Pelajaran</a>
            <a href="../Guru/Guru.php">Guru</a>
            <a href="../Kelas/Kelas.php">Kelas</a>
            <a href="../MataPelajaran/MataPelajaran.php">Mata Pelajaran</a>
            <a href="../RuangKelas/RuangKelas.php">Ruang Kelas</a>
        </div>
    </div>
    <div class="main">
        <div class="firstContent">
            <div class="card-1" id="ruang">
                <h4>Total Ruangan <?= $jmlRuang ?></h4>
            </div>
            <div class="card-1" id="guru">
                <h4>Total Guru <?= $jmlGuru ?></h4>
            </div>
            <div class="card-1" id="kelas">
                <h4>Total Kelas <?= $jmlKelas ?></h4>
            </div>
        </div>
        <div class="secondContent">
            <div class="card-2" id="mapel">
                <h4>Total Mata Pelajaran <?= $jmlMapel ?></h4>
            </div>
            <div class="card-2" id="jadwal">
                <h4>Total Jadwal Pelajaran <?= $jmlJadwal ?></h4>
            </div>
        </div>
    </div>
</body>
</html>