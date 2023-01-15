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
        $query = mysqli_query($conn, "INSERT INTO barang (kategori_id, kode_barang, rak, nama_barang, harga, stok)
            VALUES ('".$_POST['kategori_id']."', '".$_POST['kode_barang']."', '".$_POST['rak']."', '".$_POST['nama_barang']."', '".$_POST['harga']."', '".$_POST['stok']."')");
        $_SESSION['flash']['class']='alert alert-success';
        $_SESSION['flash']['label']='Penambahan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-progress-check';
        header('Location: ../../media.php?module='.$module);

    }else if($act == 'edit'){
        $query = mysqli_query($conn, "UPDATE barang SET kategori_id = '".$_POST['kategori_id']."', kode_barang = '".$_POST['kode_barang']."', rak = '".$_POST['rak']."', nama_barang = '".$_POST['nama_barang']."', harga = '".$_POST['harga']."', stok = '".$_POST['stok']."' WHERE id = '".$_POST['id']."'");
        $_SESSION['flash']['class']='alert alert-warning';
        $_SESSION['flash']['label']='Pengubahan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-circle-edit-outline';
        header('Location: ../../media.php?module='.$module);

    }else if($act == 'delete'){
        $query = mysqli_query($conn, "DELETE FROM barang WHERE id = '".$_GET['id']."'");
        $_SESSION['flash']['class']='alert alert-danger';
        $_SESSION['flash']['label']='Penghapusan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-delete-empty';
        header('Location: ../../media.php?module='.$module);

    }elseif($act == 'tambah_detail'){
        $query = mysqli_query($conn, "INSERT INTO detail_barang (id_barang, id_bahan, rasio)
            VALUES ('".$_POST['id_barang']."', '".$_POST['id_bahan']."', '".$_POST['rasio']."')");
        $_SESSION['flash']['class']='alert alert-success';
        $_SESSION['flash']['label']='Penambahan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-progress-check';
        header('Location: ../../media.php?module='.$module.'&act=detail&id='.$_POST['id_barang']);

    }else if($act == 'delete_detail'){
        $query = mysqli_query($conn, "DELETE FROM detail_barang WHERE id = '".$_GET['id']."'");
        $_SESSION['flash']['class']='alert alert-danger';
        $_SESSION['flash']['label']='Penghapusan '.$_GET['module'].' Berhasil';
        $_SESSION['flash']['icon']='mdi mdi-delete-empty';
        header('Location: ../../media.php?module='.$module.'&act=detail&id='.$_POST['id_barang']);
        
    }
}
?>