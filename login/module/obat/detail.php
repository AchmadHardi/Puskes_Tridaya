<?php 
$aksi="module/".$_GET['module']."/action.php";
$query  =   mysqli_query($conn, "SELECT * FROM barang WHERE id = '".$_GET['id']."'");
$row    =   mysqli_fetch_array($query);
$title  =   $row['nama_barang'];
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
                                    <label>Obat</label>
                                    <a href="media.php?module=<?php echo $_GET['module'] ?>&act=edit&id=<?php echo $row['id']; ?>" class="btn btn-warning" title="Edit"><i class="mdi mdi-circle-edit-outline"></i></a>
                                    <p>
                                        <b>
                                            <?php echo $row['nama_barang']; ?>
                                        </b>
                                        &nbsp; <?php echo "Rp. ".number_format($row['harga']); ?>
                                        <br>
                                        <sup class="text-muted">
                                            <?php echo $row['kode_barang']; ?>
                                        </sup>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <!--  <div class="form-group float-right">
                                  <label>Tanggal</label>
                                  <p><b><?php echo $row['tanggal']; ?></b></p>
                              </div> -->
                          </div>
                      </div>
                      <span class="float-right">
                        <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#modal_detail"><i class="mdi mdi-plus"></i></a>
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
                        <table id="example" class="table   " style="width:100%">
                            <thead>
                                <tr>
                                    <th>Bahan</th>
                                    <th>Harga</th>
                                    <th>Rasio</th>
                                    <th>Modal persatuan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                $list_detail = mysqli_query($conn, "SELECT * FROM detail_barang join bahan on bahan.id = detail_barang.id_bahan WHERE detail_barang.id_barang = '".$row['id']."' ORDER BY detail_barang.id DESC");
                                foreach($list_detail as $rowld){
                                    $rasio = $rowld['harga'] * $rowld['rasio']/100;
                                    $total += $rasio;
                                    ?>
                                    <tr>
                                        <td><?php echo $rowld['nama_bahan']; ?></td>
                                        <td><?php echo $rowld['harga']; ?>/<sub><?php echo $rowld['satuan']; ?></sub></td>
                                        <td><?php echo $rowld['rasio']; ?>%*<sup><?php echo $rowld['satuan']; ?></sup></td>
                                        <td>Rp <?php echo number_format($rasio,0,',','.'); ?></td>
                                        <td>
                                            <a href="<?php echo $aksi; ?>?module=transaksi&act=delete_detail&id=<?php echo $rowld['id']; ?>&transaksi=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?');"><i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" align="right">Harga Modal : </td>
                                    <td><b>Rp <?php 
                                    $count = mysqli_num_rows($list_detail);
                                    echo number_format($total,0,',','.');
                                    ?></b></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="right">Harga Aktual : </td>
                                    <td><b>Rp <?php echo number_format($row['harga'],0,',','.'); ?></b></td>
                                    <td></td>
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
                <input type="hidden" name="id_barang" value="<?php echo $row['id']; ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bahan</label>
                                <select name="id_bahan" class="form-control" required>
                                    <option selected disabled>--Pilih Bahan--</option>
                                    <?php
                                    $list_barang = mysqli_query($conn, "SELECT * FROM bahan where id not in (SELECT id_bahan FROM detail_barang WHERE detail_barang.id_barang = '".$row['id']."')");
                                    foreach($list_barang as $lb){
                                        echo '<option value="'.$lb['id'].'">'.$lb['nama_bahan'].'  (Rp. '.number_format($lb['harga']).')</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rasio (%)</label>
                                <input type="number" class="form-control"  name="rasio" required>
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