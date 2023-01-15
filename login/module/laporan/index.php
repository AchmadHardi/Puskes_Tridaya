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
                                        <th>Nama Obat</th>
                                        <th>Kategori</th>
                                        <th>Nomor Rak</th>
                                        <!-- <th>Harga</th> -->
                                        <th colspan="2">Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $query=mysqli_query($conn,"SELECT * from barang order by id desc");$no=1; ?>
                                    <?php 
                                    foreach ($query as $row): 
                                        $kategori=mysqli_fetch_array(mysqli_query($conn,"SELECT * from kategori where id = '$row[kategori_id]'"));
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nama_barang']; ?>
                                                <br>
                                                <small class="text-muted">
                                                    <?php echo $row['kode_barang']; ?>
                                                </small>
                                            </td>
                                            <td><?php echo $kategori['nama_kategori']; ?></td>
                                            <td><?php echo $row['rak']; ?></td>
                                            <!-- <td><?php echo "Rp. ".number_format($row['harga']); ?></td> -->
                                            <td><?php echo $row['stok']; ?></td>

                                            <td><?php if($row['stok'] < 100){ ?><small class="badge badge-sm badge-danger">Stok menipis</small><?php } ?></td>
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