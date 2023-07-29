<?php 
    $fp = fopen("history.txt", "r");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/history.css">
</head>
<body>
    <div class="header" id="header">
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="history.php">History</a>
        </div>
    </div>
    <table>
        <th>Nama</th>
        <th>Pekerjaan</th>
        <th>Alamat</th>
        <th>No KTP</th>
        <th>Nama Kost</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
        <th>Total Hari</th>
        <?php while ($isi = fgets($fp, 250)): $pisah = explode("|", $isi); ?>
            <tr>
                <td><?= $pisah[0];?></td>
                <td><?= $pisah[1];?></td>
                <td><?= $pisah[2];?></td>
                <td><?= $pisah[3];?></td>
                <td><?= $pisah[4];?></td>
                <td><?= $pisah[5];?></td>
                <td><?= $pisah[6];?></td>
                <td><?= $pisah[7];?></td>
            </tr>
        <?php endwhile?>
    </table>
</body>
</html>
