<?php 
$aksi="module/".$_GET['module']."/action.php";
$query  =   mysqli_query($conn, "SELECT * FROM transaksi WHERE id = '".$_GET['id']."'");
$row    =   mysqli_fetch_array($query);
$kode   =   date_format(date_create($row['tanggal']),'ymd')*10000;
$kode   =   $row['id']+$kode;
$kode   =   "TR".$kode;
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
                            <li class="breadcrumb-item active" aria-current="page"><a href="?module=<?php echo $_GET['module'] ?>"><?php echo ucwords($_GET['module']) ?></a></li>
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kode Transaksi</label>
                                    <p><b>#<?php echo $kode; ?></b></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group float-right">
                                  <label>Tanggal</label>
                                  <p><b><?php echo $row['tanggal']; ?></b></p>
                              </div>
                          </div>
                      </div>
                      <span class="float-right">
                        <?php if($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'petugas'){ ?>
                            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#modal_detail"><i class="mdi mdi-plus"></i></a>
                        <?php } ?>
                        <a href="module/transaksi/print.php?id=<?php echo $row['id']; ?>" class="btn btn-info" target="_blank"><i class="mdi mdi-printer"></i></a>
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
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>QTY</th>
                                    <th hidden>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                $list_detail = mysqli_query($conn, "SELECT * FROM detail_transaksi WHERE transaksi_id = '".$row['id']."' ORDER BY id DESC");
                                foreach($list_detail as $rowld){
                                    $barang = mysqli_query($conn, "SELECT * FROM barang WHERE id = '".$rowld['barang_id']."'");
                                    $rowbar = mysqli_fetch_array($barang);
                                    $subtotal = $rowbar['harga'] * $rowld['qty'];
                                    $total += $subtotal;
                                    ?>
                                    <tr>
                                        <td><?php echo $rowbar['kode_barang']; ?></td>
                                        <td><?php echo $rowbar['nama_barang']; ?></td>
                                        <td><?php echo $rowld['qty']; ?></td>
                                        <td hidden>Rp <?php echo number_format($subtotal,0,',','.'); ?></td>
                                        <td>
                                            <?php if($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'petugas'){ ?>
                                                <a href="<?php echo $aksi; ?>?module=transaksi&act=delete_detail&id=<?php echo $rowld['id']; ?>&transaksi=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?');"><i class="mdi mdi-delete"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot hidden>
                                <tr>
                                    <td colspan="3" align="right">Total : </td>
                                    <!--
                                    <td><b>Rp <?php echo number_format($total,0,',','.'); ?></b></td>
                                    -->
                                    <td>Rp 0</td>
                                    <td></td>
                                    <?php 
                                    $update = mysqli_query($conn, "UPDATE transaksi SET total = '".$total."' WHERE id = '".$_GET['id']."'");
                                    ?>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_detail" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?php echo $aksi; ?>?module=<?php echo $_GET['module'] ?>&act=tambah_detail" method="POST">
                <input type="hidden" name="transaksi_id" value="<?php echo $row['id']; ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Barang</label>
                                <select name="barang_id" class="form-control" required>
                                    <option selected disabled>--Pilih Barang--</option>
                                    <?php
                                    $kat = mysqli_query($conn, "SELECT * FROM kategori ORDER BY id asc");
                                    foreach($kat as $k){ ?>
                                        <optgroup label="<?php echo $k['nama_kategori'] ?>">
                                            <?php
                                            $list_barang = mysqli_query($conn, "SELECT * FROM barang where kategori_id='".$k['id']."' ORDER BY nama_barang asc ");
                                            foreach($list_barang as $lb){
                                                echo '<option value="'.$lb['id'].'">'.$lb['nama_barang'].'  (Rp. '.number_format($lb['harga']).')</option>';
                                            }
                                            ?>
                                        </optgroup>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>QTY</label>
                                <input type="number" class="form-control" min="1" name="qty">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
</section>