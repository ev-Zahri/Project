<?php 
    include 'function.php';
    $gambarKost = ['img/kos1.jpg', 'img/kos2.jpg', 'img/kos3.jpg', 'img/kos4.jpg', 'img/kos5.jpg', 'img/kos6.jpg'];
    $displayKost = query("SELECT * FROM `keterangan_kost`");
    $querykost = mysqli_query( $conn ,"SELECT * FROM `keterangan_kost`");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</style>
</head>
<body>
    <div class="header" id="header">
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="history.php">History</a>
        </div>
        <div class="typing-effect" id="typing-effect">
            <div class="text" id="text">SELAMAT DATANG DIKOST IBU AYU</div>
        </div>
    </div>
    <div class="content">
        <div class="main-content">
            <h1>SOROT UNTUK MENAMPILKAN DETAIL KOST</h1>
            <?php foreach($displayKost as $index => $tampilkan):?>
                <div class="card">
                    <img src="<?= $gambarKost[$index]; ?>" alt="">
                    <h3><?= $tampilkan['nama_kost']?></h3>
                    <h3>Harga <?= number_format($tampilkan['harga'], 0, ',', '.');?></h3>
                    <div class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <p>Nama <?= $tampilkan['nama_kost']?></p>
                            <p>Harga Rp. <?= number_format($tampilkan['harga'], 0, ',', '.');?></p>
                            <p>Fasilitas : </p>
                            <?php $pisah = explode('/',$tampilkan['fasilitas']); $temp = 1; foreach($pisah as $baris):?>
                                <p><?= $temp. '. '. $baris; $temp++?></p>
                            <?php endforeach?>
                            <p>Kost khusus : <?= $tampilkan['kelamin']?></p>
                            <p>Jumlah kamar : <?= $tampilkan['jumlah_kamar']?></p>
                            <p>Alamat : <?= $tampilkan['alamat']?></p>
                        </div>
                    </div>
                </div> 
            <?php endforeach?>
        </div>
    </div>
    <div class="footer">
        <div class="footer-left">
            <?php foreach($displayKost as $index => $show):?>
                <div class="show">
                    <img src="<?= $gambarKost[$index]?>" alt="">
                    <h3><?= $show['nama_kost']?></h3>
                </div>
            <?php endforeach?>
        </div>
        <div class="input">
            <form action="proses.php" method="post" enctype="multipart/form-data" onsubmit="return confirmSubmit()"> 
                <h1>SILAHKAN INPUT JIKA INGIN MEMESAN</h1><br><br>
                <label for="nama">Nama</label><input type="text" autocomplete="off" name="nama"><br>
                <label for="pekerjaan">Pekerjaan</label><input type="text" autocomplete="off" name="pekerjaan"><br>
                <label for="alamat">Alamat</label><input type="text" autocomplete="off" name="alamat"><br>
                <label for="noktp">Nomor KTP</label><input type="text" autocomplete="off" name="noktp"><br>
                <label for="kost">Pilih Kost</label>
                <select name="kost" id="mapel">
                    <option value="" style="text-align: center;"><- NONE -> </option>
                    <?php  while ($kost = mysqli_fetch_assoc($querykost)):?>
                        <option value="<?= $kost['nama_kost'] ?>"><?= $kost['nama_kost'] ?></option>
                    <?php endwhile;?>
                </select><br>
                <label for="tMulai">Mulai</label><input type="date" name="tMulai" id="tMulai"><br>
                <label for="tSelesai">Selesai</label><input type="date" name="tSelesai" id="tSelesai" min="tMulai"><br>
                <button type="submit" name="pesan">Pesan</button>
            </form>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>
