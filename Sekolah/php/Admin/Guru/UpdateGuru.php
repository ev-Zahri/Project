<?php 
    include '../../Controller/connect.php';
    include '../../Controller/FuncGuru.php';
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
    $guru = query("SELECT * FROM guru WHERE id_guru = $id")[0];
    $daftarMapel = mysqli_query($conn, "SELECT * from mata_pelajaran");
    if(isset($_POST['update'])){
        if(update($_POST)){
            echo "
                <script>
                    alert('Data Berhasil Dirubah');
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
        <div class="contentEdit">         
            <form method="post">
                <input type="hidden" name="id" value="<?= $guru['id_guru']?>">
                <label for="nama">Nama Guru</label>
                <input type="text" autocomplete="off" name="namaGuru" placeholder="Nama Guru" value="<?= $guru['nama_guru']?>" required><br><br>
                <label for="mapel">Mata Pelajaran</label>
                <select name="mapel" id="mapel">
                    <option value=""><- SELECT -></option>
                    <?php  while ($mapel = mysqli_fetch_assoc($daftarMapel)):?>
                        <option value="<?= $mapel['nama_mp'] ?>"><?= $mapel['nama_mp'] ?></option>
                    <?php endwhile;?>
                </select><br><br>
                <label for="nip">NIP</label>
                <input type="text" autocomplete="off" name="nip" placeholder="NIP" value="<?= $guru['NIP']?>" required><br>
                <button type="submit" name="update">Update</button>
            </form>
        </div>
    </div>
</body>
</html>