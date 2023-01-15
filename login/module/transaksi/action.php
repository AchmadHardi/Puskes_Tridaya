<?php 
include '../../config/connection.php';
$user=$_SESSION['id_user'];
$now=date('Y-m-d H:i:s');
$table='transaksi';
if(empty($_SESSION['username'])){
    header('Location: ../../403.html');
    // include '../../403.html';

}else{
    $module = $_GET['module'];
    $act    = $_GET['act'];
    // exit;
    if($act == 'create'){

        $query = mysqli_query($conn, "INSERT INTO transaksi (tanggal,customer)
            VALUES ('".$_POST['tanggal']."','".$_POST['customer']."')");

        $id = mysqli_insert_id($conn);

        $_SESSION['flash']['class']='alert alert-success';
        $_SESSION['flash']['label']='Penambahan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-progress-check';
        header('Location: ../../media.php?module=transaksi');
        
    }else if($act == 'edit'){

        $query = mysqli_query($conn, "UPDATE transaksi SET method = '".$_POST['method']."', tanggal = '".$_POST['tanggal']."' WHERE id = '".$_POST['id']."'");
        $_SESSION['flash']['class']='alert alert-warning';
        $_SESSION['flash']['label']='Pengubahan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-circle-edit-outline';
        header('Location: ../../media.php?module=transaksi');
        
    }else if($act == 'delete'){
        $query = mysqli_query($conn, "DELETE FROM transaksi WHERE id = '".$_GET['id']."'");
        $_SESSION['flash']['class']='alert alert-danger';
        $_SESSION['flash']['label']='Penghapusan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-delete-empty';
        header('Location: ../../media.php?module=transaksi');

    }else if($act == 'tambah_detail'){

        $barang = mysqli_query($conn, "SELECT * FROM barang WHERE id = '".$_POST['barang_id']."'");
        $row    = mysqli_fetch_array($barang);
        $total  = $row['harga'] * $_POST['qty'];

        $query = mysqli_query($conn, "INSERT INTO detail_transaksi (transaksi_id, barang_id, qty)
            VALUES ('".$_POST['transaksi_id']."', '".$_POST['barang_id']."', '".$_POST['qty']."')");

        $update = mysqli_query($conn, "UPDATE transaksi SET total = total + '".$total."' WHERE id = '".$_POST['transaksi_id']."'");

        $stok   = mysqli_query($conn, "UPDATE barang SET stok = ".$row['stok']." - ".$_POST['qty']." WHERE id = '".$_POST['barang_id']."'");

        $_SESSION['flash']['class']='alert alert-success';
        $_SESSION['flash']['label']='Penambahan Item Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-progress-check';
        header('Location: ../../media.php?module=transaksi&act=detail&id='.$_POST['transaksi_id']);

    }else if($act == 'delete_detail'){
        $dt = mysqli_query($conn, "SELECT * FROM detail_transaksi WHERE id = '".$_GET['id']."'");
        $dt=mysqli_fetch_array($dt);
        $b=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM barang WHERE id = '".$dk['barang_id']."'"));
        $total=$b['harga']*$dt['qty'];
        $update = mysqli_query($conn, "UPDATE transaksi SET total = total - '".$total."' WHERE id = '".$_POST['transaksi_id']."'");
        $query = mysqli_query($conn, "DELETE FROM detail_transaksi WHERE id = '".$_GET['id']."'");

        $_SESSION['flash']['class']='alert alert-danger';
        $_SESSION['flash']['label']='Penghapusan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-delete-empty';
        header('Location: ../../media.php?module=transaksi&act=detail&id='.$_GET['transaksi']);
    }
}
?>