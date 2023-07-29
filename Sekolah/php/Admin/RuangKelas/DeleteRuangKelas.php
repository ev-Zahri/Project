<?php 
    include '../../Controller/connect.php';
    include '../../Controller/FuncRuangKelas.php';
    $id = $_GET['id'];
    if(delete($id)){
        echo "
            <script>
                alert('Data berhasil Dihapus');
                document.location.href = 'RuangKelas.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Data gagal dihapus');
                document.location.href = 'RuangKelas.php';
            </script>
        ";
    }
?>