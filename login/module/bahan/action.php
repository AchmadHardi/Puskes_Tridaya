<?php 
include '../../config/connection.php';
$user=$_SESSION['id_user'];
$now=date('Y-m-d H:i:s');
$table='bahan';
if(empty($_SESSION['username'])){
    header('Location: ../../index.php');
}else{
    $module = $_GET['module'];
    $act    = $_GET['act'];
    if($act == 'create'){
        $query = mysqli_query($conn, "INSERT INTO bahan (nama_bahan,satuan,harga)
            VALUES ('".$_POST['nama_bahan']."', '".$_POST['satuan']."', '".$_POST['harga']."')");
        $_SESSION['flash']['class']='alert alert-success';
        $_SESSION['flash']['label']='Penambahan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-progress-check';
        header('Location: ../../media.php?module='.$module);
    }else if($act == 'edit'){
        $query = mysqli_query($conn, "UPDATE bahan SET nama_bahan = '".$_POST['nama_bahan']."',satuan= '".$_POST['satuan']."', harga = '".$_POST['harga']."' WHERE id = '".$_POST['id']."'");
        $_SESSION['flash']['class']='alert alert-warning';
        $_SESSION['flash']['label']='Pengubahan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-circle-edit-outline';
        header('Location: ../../media.php?module='.$module);
    }else if($act == 'delete'){
        $query = mysqli_query($conn, "DELETE FROM bahan WHERE id = '".$_GET['id']."'");
        $_SESSION['flash']['class']='alert alert-danger';
        $_SESSION['flash']['label']='Penghapusan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-delete-empty';
        header('Location: ../../media.php?module='.$module);
    }
}
?>