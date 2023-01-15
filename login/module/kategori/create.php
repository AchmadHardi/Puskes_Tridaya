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
                            <h4><?php echo ucwords($_GET['act']) ?></h4>
                        </span>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo $aksi ?>?module=<?php echo $_GET['module'] ?>&act=<?php echo $_GET['act'] ?>" method="post">
                            <div class="row">

                                <div class="col-md-12 col-xs-12 form-group">
                                    <label>Nama Kategori</label>
                                    <input type="text" name="nama_kategori" class="form-control" >
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