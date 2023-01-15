<?php 
include '../../config/connection.php';
$user=$_SESSION['id_user'];
$now=date('Y-m-d H:i:s');
$table='kategori';
if(empty($_SESSION['username'])){
    header('Location: ../../index.php');
    
}else{
    $module = $_GET['module'];
    $act    = $_GET['act'];
    if($act == 'create'){
        $query = mysqli_query($conn, "INSERT INTO $table (nama_kategori)
            VALUES ('".$_POST['nama_kategori']."')");
        $_SESSION['flash']['class']='alert alert-success';
        $_SESSION['flash']['label']='Penambahan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-progress-check';
        header('Location: ../../media.php?module='.$module);
    }else if($act == 'edit'){
        $query = mysqli_query($conn, "UPDATE $table SET  nama_kategori = '".$_POST['nama_kategori']."' WHERE id = '".$_POST['id']."'");
        $_SESSION['flash']['class']='alert alert-warning';
        $_SESSION['flash']['label']='Pengubahan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-circle-edit-outline';
        header('Location: ../../media.php?module='.$module);
    }else if($act == 'delete'){
        $query = mysqli_query($conn, "DELETE FROM $table WHERE id = '".$_GET['id']."'");
        $_SESSION['flash']['class']='alert alert-danger';
        $_SESSION['flash']['label']='Penghapusan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-delete-empty';
        header('Location: ../../media.php?module='.$module);
    }
}
?>