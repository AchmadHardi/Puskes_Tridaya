<?php 
include '../../config/connection.php';
$user=$_SESSION['id_user'];
$now=date('Y-m-d H:i:s');
$table='barang';
if(empty($_SESSION['username'])){
    header('Location: ../../index.php');
}else{
    $module = $_GET['module'];
    $act    = $_GET['act'];

    if($act == 'create'){
        $query = mysqli_query($conn, "INSERT INTO user (username, password, nama, no_telp, email, alamat, level, aktif)
            VALUES ('".$_POST['username']."', '".md5($_POST['password'])."', '".$_POST['nama']."', '".$_POST['no_telp']."', '".$_POST['email']."', '".$_POST['alamat']."', '".$_POST['level']."', 'Y')");
        $_SESSION['flash']['class']='alert alert-success';
        $_SESSION['flash']['label']='Penambahan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-progress-check';
        header('Location: ../../media.php?module='.$module);

    }else if($act == 'edit'){
        if(!empty($_POST['password'])){
            $query = mysqli_query($conn, "UPDATE user SET username = '".$_POST['username']."', password = '".$_POST['password']."', nama = '".$_POST['nama']."', no_telp = '".$_POST['no_telp']."', email = '".$_POST['email']."', alamat = '".$_POST['alamat']."', level = '".$_POST['level']."' WHERE id = '".$_POST['id']."'");
        }else{
            $query = mysqli_query($conn, "UPDATE user SET username = '".$_POST['username']."', nama = '".$_POST['nama']."', no_telp = '".$_POST['no_telp']."', email = '".$_POST['email']."', alamat = '".$_POST['alamat']."', level = '".$_POST['level']."' WHERE id = '".$_POST['id']."'");            
        }
        $_SESSION['flash']['class']='alert alert-warning';
        $_SESSION['flash']['label']='Pengubahan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-circle-edit-outline';
        header('Location: ../../media.php?module='.$module);

    }else if($act == 'delete'){
        $query = mysqli_query($conn, "DELETE FROM user WHERE id = '".$_GET['id']."'");
        $_SESSION['flash']['class']='alert alert-danger';
        $_SESSION['flash']['label']='Penghapusan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-delete-empty';
        header('Location: ../../media.php?module='.$module);

    }
}
?>