<?php 
$aksi="module/".$_GET['module']."/action.php";
?>
<section class="admin-content">
    <div class="bg-dark">
        <div class="container  m-b-30">
            <div class="row">
                <div class="col-12 text-white p-t-40 p-b-90">
                    <div class="float-right">
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?" style="color: grey">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo ucwords($_GET['module']) ?></li>
                        </ol>
                    </nav>
                </div>
                <h4 class="">
                    <?php echo ucwords($_GET['module']) ?>
                </h4>
                    <!-- <p class="opacity-75 ">
                        <a class="text-underline" target="_blank" href="https://datatables.net/">DataTables</a> is a
                        plug-in for the jQuery Javascript library. <br>
                        It is a highly flexible tool, build upon the foundations of progressive enhancement, <br>
                        that adds all of these advanced features to any HTML table.
                    </p> -->
                </div>
            </div>
        </div>
    </div>
    <div class="container  pull-up">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <?php if($_SESSION['level'] == 'admin'){ ?>
                    <div class="card-header">
                        <span class="float-left">
                            <a href="?module=<?php echo $_GET['module']; ?>&act=create" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Tambah Data <?php echo isset($_GET['module']) ? ucwords($_GET['module']) : ""; ?>
                            </a>
                        </span>
                    </div>
                    <?php } ?>
                    <?php if (isset($_SESSION['flash'])): ?>
                        <div class="<?php echo $_SESSION['flash']['class'] ?>">
                            <i class="<?php echo $_SESSION['flash']['icon'] ?>"></i>
                            <?php echo "  ".$_SESSION['flash']['label'];
                            ?>
                        </div>
                    <?php endif ?>
                    <div class="card-body">
                        <div class="table-responsive p-t-10">
                            <table id="example" class="table   " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Nomor Telpon</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if($_SESSION['level'] == 'admin'){
                                        $query = mysqli_query($conn,"SELECT * from user order by id desc");
                                    }else{
                                        $query = mysqli_query($conn,"SELECT * from user WHERE id = '".$_SESSION['id_user']."' order by id desc");
                                    }

                                    $no=1; 
                                    ?>
                                    <?php 
                                    foreach ($query as $row): 
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['nama']; ?></td>
                                            <td><?php echo $row['no_telp']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['level']; ?></td>
                                            <td>
                                                <a href="media.php?module=<?php echo $_GET['module'] ?>&act=edit&id=<?php echo $row['id']; ?>" class="btn btn-warning" title="Edit"><i class="mdi mdi-circle-edit-outline"></i></a>
                                                <?php if($_SESSION['level'] == 'admin'){ ?>
                                                    <a href="<?php echo $aksi; ?>?module=<?php echo $_GET['module'] ?>&act=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" title="Hapus"><i class="mdi mdi-delete-circle-outline"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>