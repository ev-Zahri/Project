<?php 
    include '../../Controller/connect.php';
    include '../../Controller/FuncGuru.php';
    $id = $_GET['id'];
    if(delete($id)){
        echo "
            <script>
                alert('Data berhasil Dihapus');
                document.location.href = 'Guru.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data gagal dihapus');
                document.location.href = 'Guru.php';
            </script>
        ";
    }
?>