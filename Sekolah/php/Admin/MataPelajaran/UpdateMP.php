<?php 
    include '../../Controller/connect.php';
    include '../../Controller/FuncMataPelajaran.php';
    session_start();
    if($_SESSION['login'] == false){
        echo "
            <script>
                alert('Anda Bukan Admin !!');
                document.location.href = '../../Dashboard/home.php';
            </script>
        ";
    }
    $id = $_GET['id'];
    $mapel = query("SELECT * FROM mata_pelajaran WHERE id_mp = $id")[0];
    $daftarGuru = mysqli_query($conn, "SELECT * FROM guru");
    if(isset($_POST['update'])){
        if(update($_POST)){
            echo "
                <script>
                    alert('Data Berhasil Dirubah');
                    document.location.href = 'MataPelajaran.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data gagal dirubah');
                    document.location.href = MataPelajaran.php';
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
    <link rel="stylesheet" href="../../../css/Admin/MataPelajaran.css">
</head>
<body>
    <div class="navbar">
    <a href=".../../Dashboard/home.php" id="home">Logo</a>
        <div class="menu">
            <a href="../../Dashboard/AboutUs.php">About Us</a>
            <a href="../../Dashboard/Contact.php">Contact</a>
            <a href="../../Dashboard/home.php">Log Out</a>
        </div>
    </div>
    <div class="sidebar">
        <div class="profile">
            <img src="../../../Img/admin.jpg" alt="">
            <h4>Admin</h4>
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
        <div class="contentEdit">                 <!-- Modal Tambah data-->
            <form method="post">
                <input type="hidden" name="id" value="<?= $mapel['id_mp']?>">
                <label for="namaMapel">Nama Mata Pelajaran</label>
                <input type="text" autocomplete="off" name="namaMapel" placeholder="Nama Mata Pelajaran" value="<?= $mapel['nama_mp']?>" required><br><br>
                <label for="pengampu">Pengampu Mata Pelajaran</label>
                <select name="pengampu" id="pengampu">
                    <?php while($guru = mysqli_fetch_assoc($daftarGuru)) :?>
                        <option value="<?= $guru['nama_guru'] ?>">
                        <?= $guru['nama_guru'] ?></option>
                    <?php endwhile?>
                </select><br>
                <button type="submit" name="update">Update</button>
            </form>
        </div>
    </div>
</body>
</html>