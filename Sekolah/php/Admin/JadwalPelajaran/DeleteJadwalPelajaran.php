<?php 
    include '../../Controller/connect.php';
    include '../../Controller/FuncJadwalPelajaran.php';

    $id = $_GET['id'];
    if(delete($id)){
        echo "
            <script>
                alert('Data berhasil dihapus');
                document.location.href = 'JadwalPelajaran.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data gagal dihapus');
                document.location.href = 'JadwalPelajaran.php';
            </script>
        ";
    }
?> 