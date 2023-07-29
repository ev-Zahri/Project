<?php 
    include '../../Controller/connect.php';
    include '../../Controller/FuncJadwalPelajaran.php';
    session_start();
    if($_SESSION['login'] == false){
        echo "
            <script>
                alert('Anda Bukan Admin !!');
                window.location.href = '../../Dashboard/home.php';
            </script>
        ";
    }
    $query = query("SELECT * FROM jadwal_pelajaran");
    $daftarMapel = mysqli_query($conn, "SELECT * from mata_pelajaran");
    $daftarGuru = mysqli_query($conn, "SELECT * FROM guru");
    $daftarRuangan = mysqli_query($conn, "SELECT * FROM ruang_kelas");
    $daftarKelas = mysqli_query($conn, "SELECT * FROM kelas");
    if(isset($_POST['tambah'])){
        if(tambah($_POST)){
            echo "
                <script>
                    alert('Data Berhasil ditambah');
                    document.location.href = 'JadwalPelajaran.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Data gagal ditambah');
                    document.location.href = 'JadwalPelajaran.php';
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
                <h1>Jadwal Pelajaran</h1>
                <button id="myBtn">Tambah Jadwal Pelajaran</button>
                <div class="modal" id="myModal">
                    <div class="modal-content">
                        <span id="head">Tambah Jadwal Pelajaran</span>
                        <span class="close"><ion-icon name="close-outline"></ion-icon></span>
                        <form method="post">
                            <label for="hari">Hari</label>
                            <input type="date" autocomplete="off" name="hari" placeholder="Hari Mata Pelajaran" required><br><br>
                            <label for="jmMulai">Jam Mulai</label>
                            <input type="time" autocomplete="off" name="jmMulai" placeholder="Mulai Mata Pelajaran" required>
                            <label for="jmSelesai" style="margin-left: 60px;">Jam Selesai</label>
                            <input type="time" autocomplete="off" name="jmSelesai" placeholder="Selesai Mata Pelajaran" required><br><br>
                            <label for="mapel">Mata Pelajaran</label>
                            <select name="mapel" id="mapel">
                                <option value=""><- SELECT -></option>
                                <?php  while ($mapel = mysqli_fetch_assoc($daftarMapel)):?>
                                    <option value="<?= $mapel['nama_mp'] ?>"><?= $mapel['nama_mp'] ?></option>
                                <?php endwhile;?>
                            </select>
                            <label for="guru" style="margin-left: 90px;">Guru</label>
                            <select name="guru" id="guru">
                                <option value=""><- SELECT -></option>
                                <?php  while ($guru = mysqli_fetch_assoc($daftarGuru)):?>
                                    <option value="<?= $guru['nama_guru'] ?>"><?= $guru['nama_guru'] ?></option>
                                <?php endwhile;?>
                            </select><br><br>
                            <label for="kelas">Kelas</label>
                            <select name="kelas" id="kelas">
                                <option value=""><- SELECT -></option>
                                <?php  while ($kelas = mysqli_fetch_assoc($daftarKelas)):?>
                                    <option value="<?= $kelas['nama_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>
                                <?php endwhile;?>
                            </select>
                            <label for="ruangKelas" style="margin-left: 90px;">Ruangan</label>
                            <select name="ruangKelas" id="ruangKelas">
                                <option value=""><- SELECT -></option>
                                <?php  while ($ruangan = mysqli_fetch_assoc($daftarRuangan)):?>
                                    <option value="<?= $ruangan['nama_ruang'] ?>"><?= $ruangan['nama_ruang'] ?></option>
                                <?php endwhile;?>
                            </select><br><br>
                            <button type="submit" name="tambah">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <table>
                <tr>
                    <th >Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Mapel</th>
                    <th>Guru</th>
                    <th>Kelas</th>
                    <th>Ruangan</th>
                    <th class="w15">Operation</th>
                </tr>
                <?php foreach ($query as $row) :?>
                    <tr>
                        <td><?= $row['hari']?></td>
                        <td><?= $row['jam_mulai']?></td>
                        <td><?= $row['jam_selesai']?></td>
                        <td><?= $row['nama_mapel']?></td>
                        <td><?= $row['nama_guru']?></td>
                        <td><?= $row['kelas']?></td>
                        <td><?= $row['ruangan']?></td>
                        <td>
                            <button><a href="UpdateJadwalPelajaran.php?id=<?= $row['id_jadwal']?>">Update</a></button>
                            <button><a href="DeleteJadwalPelajaran.php?id=<?= $row['id_jadwal']?>">Delete</a></button>
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