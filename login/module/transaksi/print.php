<?php
include('../../config/connection.php');
$query  = mysqli_query($conn, "SELECT * FROM transaksi WHERE id = '".$_GET['id']."'");
$row    = mysqli_fetch_array($query);
$customer=mysqli_fetch_array(mysqli_query($conn,"SELECT * from customer where id = '$row[customer]'"));
$jml=mysqli_query($conn,"SELECT * from detail_transaksi join barang on detail_transaksi.barang_id=barang.id where detail_transaksi.transaksi_id='$row[id]'");
$sum=0;
foreach ($jml as $j) {
    $item=$j['qty']*$j['harga'];
    $sum += $item;
}
$kode=date_format(date_create($row['tanggal']),'ymd')*10000;
$kode=$row['id']+$kode;
$kode="TR".$kode;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="author"/>
    <meta content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons" name="description"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title"
    content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons"/>
    <meta property="og:description"
    content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons"/>
    <meta property="og:image"
    content="../../cdn.dribbble.com/users/180706/screenshots/5424805/the_sceens_-_mobile_perspective_mockup_3_-_by_tranmautritam.jpg"/>
    <meta property="og:site_name" content="atlas "/>
    <title>Invoice #<?php echo $kode; ?></title>
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png"/>
    <link rel="icon" href="../../assets/img/logo.png" type="image/png" sizes="16x16">
    <link rel='stylesheet' href='../../assets/css/478ccdc1892151837f9e7163badb055b8a1833a5/light/assets/vendor/pace/pace.css'/>
    <script src='../../assets/js/3d1965f9e8e63c62b671967aafcad6603deec90c/light/assets/vendor/pace/pace.min.js'></script>
    <!--vendors-->
    <link rel='stylesheet' type='text/css' href='../../assets/bundles/291bbeead57f19651f311362abe809b67adc3fb5.css'/>
    <link rel='stylesheet' href='../../assets/bundles/fc681442cee6ccf717f33ccc57ebf17a4e0792e1.css'/>
    <link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600" rel="stylesheet">
    <link rel='stylesheet' href='../../assets/css/04cc97dcdd1c8f6e5b9420845f0fac26b54dab84/default/assets/fonts/jost/jost.css'/>
    <!--Material Icons-->
    <link rel='stylesheet' type='text/css' href='../../assets/css/548117a22d5d22545a0ab2dddf8940a2e32c04ed/default/assets/fonts/materialdesignicons/materialdesignicons.min.css'/>
    <!--Bootstrap + atmos Admin CSS-->
    <link rel='stylesheet' type='text/css' href='../../assets/css/ed18bd005cf8b05f329fad0688d122e0515499ff/default/assets/css/atmos.min.css'/>
    <!-- Additional library for page -->
</head>
<body class="sidebar-pinned ">
    <section class="admin-content ">
        <div class="bg-dark m-b-30">
            <div class="container">
                <div class="row p-b-60 p-t-60">
                    <div class="col-md-6 text-white p-b-30">
                        <div class="media">
                            <div class="avatar avatar mr-3">
                                <div class="avatar-title bg-success rounded-circle mdi mdi-receipt  ">
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="opacity-75">To,</div>
                                <h4 class="m-b-0"><?php echo @$customer['nama_customer'] ?> </h4>
                                <p class="opacity-75">
                                   Invoice ID #<?php echo $kode ?> <br>
                                   Invoice Date : <?php echo $row['tanggal'] ?>
                               </p>
                               <button class="btn btn-white-translucent" id="printDiv" > <i class="mdi
                                mdi-printer"></i>
                            Print</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center m-b-30 ml-auto">
                    <div class="rounded text-white bg-white-translucent">
                        <div class="p-all-15">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-overline    opacity-75">Jumlah Pembayaran</div>
                                    <h3 class="m-0 text-success">Rp. <?php echo number_format($sum) ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pull-up">
        <div class="container" id="printableArea">
            <div class="row"  >
                <div class="col-md-12 m-b-40">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="assets/img/logos/nytimes.jpg" width="60" class="rounded-circle"
                                    alt="">
                                    <address class="m-t-10">
                                        To,<br>
                                        <span class="h4 font-primary"> <?php echo ucwords(@$customer['nama_customer']) ?>,</span> <br>
                                        <?php echo @$customer['tel'] ?>
                                        <br> 
                                        <?php echo @$customer['alamat'] ?> 
                                    </address>
                                </div>
                                <div class="col-md-6 text-right my-auto">
                                    <h1 class="font-primary">INVOICE</h1>
                                    <div class="">Invoice Number: #<?php echo $kode ?></div>
                                    <div class="">Date: <?php echo $row['tanggal'] ?></div>
                                </div>
                            </div>
                            <div class="table-responsive ">
                                <table class="table m-t-50">
                                    <thead>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>QTY</th>
                                            <th hidden>Subtotal</th>
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
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot hidden>
                                  <tr>
                                    <td colspan="3" align="right">Total : </td>
                                    <td><b>Rp <?php echo number_format($total,0,',','.'); ?></b></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="p-t-10 p-b-20">
                        <p class="text-muted ">
                            <!-- text -->
                        </p>
                        <hr>
                        <div class="text-center opacity-75">
                            <!-- &copy; atmos 2019 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
<script src='../../assets/bundles/85bd871e04eb889b6141c1aba0fedfa1a2215991.js'></script>
<!--page specific scripts for demo-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-66116118-3"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-66116118-3'); </script>
<script src='../../assets/js/2ab709efadaaad94049994f3bddebbd09bc58330/light/assets/js/invoice-print.js'></script>
<!-- <script type="text/javascript">window.print()</script> -->
</body>
</html>