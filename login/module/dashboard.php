<?php
$total_penjualan    = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(total) as grand_total FROM transaksi"));
$total_transaksi    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM transaksi"));
$total_pasien       = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM customer"));
$total_obat         = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM barang"));
?>
<!--site header ends -->    
<section class="admin-content">
    <div class="bg-dark ">
        <div class="container-fluid m-b-30">
            <div class="row">
                <div class="text-white col-lg-6">
                    <div class="p-all-15">
                        <div class="d-md-flex m-t-20 align-items-center">
                            <h1 class="display-4">
                                Selamat Datang, <?php echo $_SESSION['nama']; ?>!
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 p-b-60">
                    <div id="chart-09" class="chart-canvas invert-colors"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row d-none  pull-up d-lg-flex">

            <div class="col m-b-30">
                <div class="card ">

                    <div class="card-body">
                        <div class="text-center p-t-30 p-b-20">
                            <div class="text-overline text-muted opacity-75">Total Pengobatan</div>
                            <h1 class="text-success"><?php echo $total_transaksi; ?></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col m-b-30">
                <div class="card ">

                    <div class="card-body">
                        <div class="text-center p-t-30 p-b-20">
                            <div class="text-overline text-muted opacity-75">Total Pasien</div>
                            <h1 class="text-danger"><?php echo $total_pasien; ?></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col m-b-30">
                <div class="card ">

                    <div class="card-body">
                        <div class="text-center p-t-30 p-b-20">
                            <div class="text-overline text-muted opacity-75">
                                Total Obat
                            </div>
                            <h1 class="text-success"><a href="media.php?module=obat"><?php echo $total_obat; ?></a></h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 m-b-30">
                <div class="row">
                    <div class="col-md-6 m-b-10">
                        <h3>Informasi Obat</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="card m-b-30">
                            <div class="">
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Obat</th>
                                                <th>Jenis Obat</th>
                                                <th>Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $query = mysqli_query($conn, "SELECT a.id, a.kode_barang, a.nama_barang, a.stok, b.nama_kategori FROM barang as a LEFT JOIN kategori as b ON b.id = a.kategori_id ORDER BY a.id DESC");
                                            foreach($query as $row){
                                                $no++;
                                                ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row['nama_barang']; ?></td>
                                                <td><?php echo $row['nama_kategori']; ?></td>
                                                <td><?php echo $row['stok']; ?></td>
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
        </div>
        
        <div class="row">
            <div class="col-lg-12 m-b-30">
                <div class="row card">
                    <div class="col-md-6 m-b-10 p-3">
                        <h3>Puskesmas Tridaya Sakti</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="m-b-30">
                            <h5>Jl. Flamboyan 3 No.B.6, RW.3, Tridaya Sakti, Tambun Selatan, Bekasi Regency, West Java 17510</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row" hidden>
            <div class="col-lg-12 m-b-30">
                <div class="row">
                    <div class="col-md-6 m-b-10">
                        <h3>Transaksi Terbaru</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="card m-b-30">
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-hover ">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Transaksi</th>
                                                <th>Pasien</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $query = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY id DESC LIMIT 10");
                                            foreach($query as $row){
                                                $customer=mysqli_fetch_array(mysqli_query($conn,"SELECT * from customer where id = '$row[customer]'"));
                                                $no++;
                                                $kode = date_format(date_create($row['tanggal']),'ymd')*10000;
                                                $kode = $row['id']+$kode;
                                                $kode = "TR".$kode;
                                                ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td>
                                                    <a class="text-primary" href="media.php?module=transaksi&act=detail&id=<?php echo $row['id']; ?>">
                                                        #<?php echo $kode; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span class=""><?php echo @$customer['nama_customer'] ?></span>
                                                    <br/>
                                                    <span class="text-muted"><?php echo @$customer['alamat'] ?></span>
                                                </td>
                                                <td><?php echo date('d F Y', strtotime($row['tanggal'])); ?></td>
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
        </div>
    </div>
</section>
<script src='../../d33wubrfki0l68.cloudfront.net/js/c36248babf70a3c7ad1dcd98d4250fa60842eea9/light/assets/vendor/apexchart/apexcharts.min.js'></script>

<script src='../../d33wubrfki0l68.cloudfront.net/js/0a5bddf151b3e53b46779e47e1fa1a524ff8b771/crisp/assets/js/dashboard-03.js'></script>
