<?php 
$aksi   = "module/".$_GET['module']."/action.php";
$row    = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id = '".$_GET['id']."'"));
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
                            <h4><?php echo ucwords($_GET['act']) ?></h4>
                        </span>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo $aksi ?>?module=<?php echo $_GET['module'] ?>&act=<?php echo $_GET['act'] ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <div class="row">
                                <div class="col-md-12 col-xs-12 form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control" required="required">
                                </div>
                                <div class="col-md-12 col-xs-12 form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="col-md-12 col-xs-12 form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama" value="<?php echo $row['nama']; ?>" class="form-control" required="required">
                                </div>
                                <div class="col-md-12 col-xs-12 form-group">
                                    <label>Nomor Telpon</label>
                                    <input type="text" name="no_telp" value="<?php echo $row['no_telp']; ?>" class="form-control">
                                </div>
                                <div class="col-md-12 col-xs-12 form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control">
                                </div>
                                <div class="col-md-12 col-xs-12 form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control"><?php echo $row['alamat']; ?></textarea>
                                </div>
                                <div class="col-md-12 col-xs-12 form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control" required="required">
                                        <option value="">- Pilih Level -</option>
                                        <option value="admin" <?php if($row['level'] == 'admin'){ echo 'selected="selected"'; } ?>>admin</option>
                                        <option value="kepala bagian" <?php if($row['level'] == 'kepala bagian'){ echo 'selected="selected"'; } ?>>kepala bagian</option>
                                    </select>
                                </div>
                                <div class="col-md-12 col-xs-12 form-group">
                                  <button type="button" class="btn btn-warning" title="Kembali" onclick="window.history.back();"><i class="mdi mdi-keyboard-backspace"></i></button>
                                  <button type="submit" class="btn btn-success" title="Simpan"><i class="mdi mdi-content-save"></i></button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>