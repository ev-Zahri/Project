<?php 
    include '../../Controller/connect.php';
    include '../../Controller/FuncRuangKelas.php';
    session_start();
    if($_SESSION['login'] == false){
        echo "
            <script>
                alert('Anda Bukan Admin !!');
                window.location.href = '../../Dashboard/home.php';
            </script>
        ";
    }
    $query = query("SELECT * FROM ruang_kelas");
    if(isset($_POST['tambah'])){
        if(tambah($_POST)){
            echo "
                <script>
                    alert('Data Berhasil ditambah');
                    document.location.href = 'RuangKelas.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data gagal ditambah');
                    document.location.href = 'RuangKelas.php';
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/Admin/RuangKelas.css">
</head>
<body>
    <div class="navbar">
    <a href="../../Dashboard/home.php" id="home">Logo</a>
        <div class="menu">
            <a href="../../Dashboard/AboutUs.php">About Us</a>
            <a href="../../Dashboard/Contact.php">Contact</a>
            <a href="../../Dashboard/home.php">Log Out</a>
        </div>
    </div>
    <div class="sidebar">
        <div class="profile">
            <img src="../../../Img/admin.jpg" alt="">
            <h4><a href="../Login/Admin.php">Admin</a></h4>
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
        <div class="operation">                 
            <div class="outerModal">
                <h1>Ruang Kelas</h1>
                <button id="myBtn">Tambah Ruang Kelas</button>
                <div class="modal" id="myModal">
                    <div class="modal-content">
                        <span id="head">Tambah Ruang Kelas</span>
                        <span class="close"><ion-icon name="close-outline"></ion-icon></span>
                        <form method="post">
                            <label for="namaRuangan">Nama Ruangan</label>
                            <input type="text" autocomplete="off" name="namaRuangan" placeholder="Nama Ruang Kelas" required><br>
                            <label for="kapasitas">Kapasitas Ruangan</label>
                            <input type="text" autocomplete="off" name="kapasitas" placeholder="Jumlah Kapasitas Ruang Kelas" required>
                            <button type="submit" name="tambah">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <table>
                <tr>
                    <th class="w30">Nama Ruang</th>
                    <th class="w30">Kapasitas</th>
                    <th class="w15">Operation</th>
                </tr>
                <?php foreach ($query as $row) :?>
                    <tr>
                        <td><?= $row['nama_ruang']?></td>
                        <td><?= $row['kapasitas']?></td>
                        <td>
                            <button><a href="UpdateRuangKelas.php?id=<?= $row['id_ruang']?>">Update</a></button>
                            <button><a href="DeleteRuangKelas.php?id=<?= $row['id_ruang']?>">Delete</a></button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
    <script src="../../../Js/Admin/Admin.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>