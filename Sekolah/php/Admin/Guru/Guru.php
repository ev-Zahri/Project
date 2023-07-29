<?php 
    include '../../Controller/connect.php';
    require '../../Controller/FuncGuru.php';
    session_start();
    if($_SESSION['login'] == false){
        echo "
            <script>
                alert('Anda Bukan Admin !!');
                window.location.href = '../../Dashboard/home.php';
            </script>
        ";
    }
    $query = query("SELECT * FROM guru");
    $daftarMapel = mysqli_query($conn, "SELECT * from mata_pelajaran");
    // fungsi tambah 
    if(isset($_POST['tambah'])){
        if(tambah($_POST)){
            echo "
                <script>
                    alert('Data Berhasil ditambah');
                    document.location.href = 'Guru.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data gagal ditambah');
                    document.location.href = 'Guru.php';
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
    <link rel="stylesheet" href="../../../css/Admin/Guru.css">
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
                <h1>Guru</h1>
                <button id="myBtn">Tambah Guru</button>
                <div class="modal" id="myModal">
                    <div class="modal-content">
                        <span id="head">Tambah Guru</span>
                        <span class="close"><ion-icon name="close-outline"></ion-icon></span>
                        <form method="post">
                            <label for="nama">Nama</label>
                            <input type="text" autocomplete="off" name="namaGuru" placeholder="Nama Guru" required><br>
                            <label for="mapel">Mata Pelajaran</label>
                            <select name="mapel" id="mapel">
                                <option value=""><- SELECT -></option>
                                <?php  while ($mapel = mysqli_fetch_assoc($daftarMapel)):?>
                                    <option value="<?= $mapel['nama_mp'] ?>"><?= $mapel['nama_mp'] ?></option>
                                <?php endwhile;?>
                            </select><br>
                            <label for="nip">NIP</label>
                            <input type="text" autocomplete="off" name="nip" placeholder="NIP" required><br>
                            <button type="submit" name="tambah"><h3>Tambah</h3></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <table>
                <tr>
                    <th class="w10">NIP</th>
                    <th class="w25">Nama</th>
                    <th class="w25">Mata Pelajaran</th>
                    <th class="w10">Operation</th>
                </tr>
                <?php foreach ($query as $row) :?>
                    <tr>
                        <td><?= $row['NIP']?></td>
                        <td><?= $row['nama_guru']?></td>
                        <td><?= $row['nama_mp']?></td>
                        <td>
                            <button><a href="UpdateGuru.php?id=<?= $row['id_guru']?>">Update</a></button>
                            <button><a href="DeleteGuru.php?id=<?= $row['id_guru']?>">Delete</a></button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../../../Js/Admin/Admin.js"></script>
</body>
</html>