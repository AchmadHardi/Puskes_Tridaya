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
                    <div class="card-header">
                        <span class="float-left">
                            <a href="?module=<?php echo $_GET['module']; ?>&act=laporan" class="btn btn-info">
                                <i class="fa fa-print"></i> Print
                            </a>
                        </span>
                    </div>
                    <?php if (isset($_SESSION['flash'])): ?>
                        <div class="<?php echo $_SESSION['flash']['class'] ?>">
                            <i class="<?php echo $_SESSION['flash']['icon'] ?>"></i>
                            <?php echo "  ".$_SESSION['flash']['label'];
                            ?>
                        </div>
                    <?php endif ?>
                    <div class="card-body">
                        <div class="table-responsive p-t-10">
                            <table id="example" class="table" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Kode Transaksi</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $query = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY id DESC");
                                foreach($query as $row){
                                    $customer=mysqli_fetch_array(mysqli_query($conn,"SELECT * from customer where id = '$row[customer]'"));
                                    $no++;
                                    $kode=date_format(date_create($row['tanggal']),'ymd')*10000;
                                    $kode=$row['id']+$kode;
                                    $kode="TR".$kode;
                                    $sum=0;
                                    $jml=mysqli_query($conn,"SELECT * from detail_transaksi join barang on detail_transaksi.barang_id=barang.id where detail_transaksi.transaksi_id='$row[id]'");
                                    foreach ($jml as $j) {
                                        $item=$j['qty']*$j['harga'];
                                        $sum += $item;
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td>
                                            <a class="text-primary" href="media.php?module=transaksi&act=detail&id=<?php echo $row['id']; ?>">
                                                #<?php echo $kode; ?>
                                            </a>
                                            <br>
                                            <span class=""><?php echo @$customer['nama_customer'] ?></span>
                                            <span class="text-muted"> - <?php echo @$customer['alamat'] ?></span>
                                        </td>
                                        <td><?php echo $row['tanggal']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>