<?php 
    include '../../Controller/connect.php';
    include '../../Controller/FuncJadwalPelajaran.php';
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
    $jadwal = query("SELECT * FROM jadwal_pelajaran WHERE id_jadwal = $id")[0];
    $daftarMapel = mysqli_query($conn, "SELECT * from mata_pelajaran");
    $daftarGuru = mysqli_query($conn, "SELECT * FROM guru");
    $daftarRuangan = mysqli_query($conn, "SELECT * FROM ruang_kelas");
    $daftarKelas = mysqli_query($conn, "SELECT * FROM kelas");
    if(isset($_POST['update'])){
        if(update($_POST)){
            echo "
                <script>
                    alert('Data Berhasil Dirubah');
                    document.location.href = 'JadwalPelajaran.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data gagal dirubah');
                    document.location.href = JadwalPelajaran.php';
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
    <link rel="stylesheet" href="../../../css/Admin/JadwalPelajaran.css">
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
                <input type="hidden" name="id" value="<?= $jadwal['id_jadwal']?>">
                <label for="hari">Hari</label>
                <input type="date" autocomplete="off" name="hari" value="<?= $jadwal['hari']?>" required><br><br>
                <label for="jmMulai">Jam Mulai</label>
                <input type="time" autocomplete="off" name="jmMulai" value="<?= $jadwal['jam_mulai']?>" max="<?= $jadwal['jam_selesai']?>" required>
                <label for="jmSelesai" style="margin-left: 78px;">Jam Selesai</label>
                <input type="time" autocomplete="off" name="jmSelesai" value="<?= $jadwal['jam_selesai']?>" min="<?= $jadwal['jam_mulai']?>" required><br><br>
                <label for="mapel">Mata Pelajaran</label>
                <select name="mapel" id="mapel">
                    <option value="<?= $jadwal['nama_mapel']?>"><?= $jadwal['nama_mapel']?></option>
                    <?php  while ($mapel = mysqli_fetch_assoc($daftarMapel)):?>
                        <option value="<?= $mapel['nama_mp'] ?>"><?= $mapel['nama_mp'] ?></option>
                    <?php endwhile;?>
                </select>
                <label for="guru" class="w15" style="padding-left: 50px;">Guru</label>
                <select name="guru" id="guru">
                    <option value="<?= $jadwal['nama_guru']?>"><?= $jadwal['nama_guru']?></option>
                    <?php  while ($guru = mysqli_fetch_assoc($daftarGuru)):?>
                        <option value="<?= $guru['nama_guru'] ?>"><?= $guru['nama_guru'] ?></option>
                    <?php endwhile;?>
                </select><br><br><br>
                <label for="kelas">Kelas</label>
                <select name="kelas" id="kelas">
                    <option value="<?= $jadwal['kelas']?>"><?= $jadwal['kelas']?></option>
                    <?php  while ($kelas = mysqli_fetch_assoc($daftarKelas)):?>
                        <option value="<?= $kelas['nama_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>
                    <?php endwhile;?>
                </select>
                <label for="ruangKelas" class="w15" style="padding-left: 50px;">Ruangan</label>
                <select name="ruangKelas" id="ruangKelas">
                    <option value="<?= $jadwal['ruangan']?>"><?= $jadwal['ruangan']?></option>
                    <?php  while ($ruangan = mysqli_fetch_assoc($daftarRuangan)):?>
                        <option value="<?= $ruangan['nama_ruang'] ?>"><?= $ruangan['nama_ruang'] ?></option>
                    <?php endwhile;?>
                </select><br>
                <button type="submit" name="update">Update</button>
            </form>
        </div>
    </div>
</body>
</html>