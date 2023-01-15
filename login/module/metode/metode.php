<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Metode</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item">Dashboard</li>
						<li class="breadcrumb-item active">Monthly Recap</li>
					</ol>
				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="card mb-3">
			<div class="card-header">
				<h3 class="card-title">Pendapatan Perbulan</h3>
				<div class="card-tools">
				</div>
			</div>
			<div class="card-body">
				<table id="tables" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Bulan</th>
							<th>Jumlah</th>
							<th>Total Harga</th>
						</tr>
					</thead>
					<tbody> 
						<?php
						$min=mysqli_fetch_array(mysqli_query($conn,"SELECT min(tanggal) as tanggal from history"));
						$max=mysqli_fetch_array(mysqli_query($conn,"SELECT max(tanggal) as tanggal from history"));
						$bulan =  date_format(date_create($min['tanggal']),"m");
						$tahun =  date_format(date_create($min['tanggal']),"Y");
						$m=0;
						$n=1;
						do {
							if ($bulan == 13) {
								$bulan=1;
								$tahun++;
							}
							$sbulan= $bulan < 10 ? "0".$bulan :  $bulan;
							$bulanan=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(jumlah) as qty,sum(total_harga) as harga from history where tanggal like '".$tahun."-".$sbulan."%'"));
							echo "<tr>";
							echo "<td>".$n."</td>";
							echo "<td>".bulan($bulan)." ".$tahun."</td>"; 
							echo "<td>";
							echo $bulanan['qty']!=null ? $bulanan['qty'] : "<i class='text-muted'>null</i>";
							echo "</td>"; 
							echo "<td>Rp. ".number_format($bulanan['harga'])."</td>"; 
							echo "</tr>"  ;
							$m++;
							$n++;
							$bulan++;
						} while ($m<12);
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="card mb-3">
			<div class="card-header">
				<h3 class="card-title">Moving Average</h3>
				<div class="card-tools">
				</div>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-striped">
					<thead class="bg-primary">
						<tr>
							<th rowspan="2">No</th>
							<th rowspan="2">Bulan</th>
							<th colspan="2">Nilai Pengamatan</th>
							<th colspan="2">Nilai Perkiraan (n=3)</th>
							<th colspan="2">Nilai Perkiraan (n=5)</th>
						</tr>
						<tr>
							<th>QTY</th>
							<th>Total Harga</th>
							<th>Perkiraan QTY</th>
							<th>Perkiraan Harga</th>
							<th>Perkiraan QTY</th>
							<th>Perkiraan Harga</th>
						</tr>
					</thead>
					<tbody> 
						<?php
						$min=mysqli_fetch_array(mysqli_query($conn,"SELECT min(tanggal) as tanggal from history"));
						$bulan =  date_format(date_create($min['tanggal']),"m");
						$tahun =  date_format(date_create($min['tanggal']),"Y");
						$n=1;
						do {
							if ($bulan == 13) {
								$bulan=1;
								$tahun++;
							}
							$sbulan= $bulan < 10 ? "0".$bulan :  $bulan;
							$bulanan=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(jumlah) as qty,sum(total_harga) as harga from history where tanggal like '".$tahun."-".$sbulan."%'"));
							echo "<tr>";
							echo "<td>".$n."</td>";
							echo "<td>".bulan($bulan)." ".$tahun."</td>";
							echo "<td>";
							echo $bulanan['qty']!=null ? $bulanan['qty'] : "<i class='text-muted'>null</i>";
							echo "</td>"; 
							echo "<td>Rp. ".number_format($bulanan['harga'])."</td>";
							$data[$n]['harga']=$bulanan['qty'];
							$data[$n]['harga']=$bulanan['harga'];
              // metode  n =3
							if ($n<=3) {
								$qty = "-";
								$harga="-";
								echo "<td>-</td><td>-</td>";
							}else{
								$loop=0;
								$tmpbulan=$bulan;
								$tmptahun=$tahun;
								$tmpbulan--;
								$MA[$n]['qty']=0;
								$MA[$n]['harga']=0;
								$MA[$n]['qty_rule']="";
								$MA[$n]['harga_rule']="";
								do {
									if ($tmpbulan == 0) {
										$tmpbulan=12;
										$tmptahun--;
									}
									$tmpbulan= $tmpbulan < 10 ? "0".$tmpbulan :  $tmpbulan;
									$sql="SELECT sum(jumlah) as qty,sum(total_harga) as harga from history where tanggal like '".$tmptahun."-".$tmpbulan."%'";
									$tmp=mysqli_fetch_array(mysqli_query($conn,$sql));
									$MA[$n]['qty']+=$tmp['qty'];
									$MA[$n]['harga']+=$tmp['harga'];
									$temp_qty=$tmp['qty']>0 ? $tmp['qty'] : 0;
									$temp_harga=$tmp['harga']>0 ? $tmp['harga'] : 0;
									if ($loop==0) {
										$MA[$n]['qty_rule']=$MA[$n]['qty_rule'].$temp_qty;
										$MA[$n]['harga_rule']=$MA[$n]['harga_rule'].$temp_harga;
									}else{
										$MA[$n]['qty_rule']=$MA[$n]['qty_rule']."+".$temp_qty;
										$MA[$n]['harga_rule']=$MA[$n]['harga_rule']."+".$temp_harga;
									}
									$tmpbulan--;
									$loop++;
								} while ($loop<3); 
								echo "<td title='(".$MA[$n]['qty_rule'].")/3'>".round(($MA[$n]['qty']/3),2)."</td>"; 
								echo "<td title='(".$MA[$n]['harga_rule'].")/3'>Rp. ".round(($MA[$n]['harga']/3),2)."</td>";
							}
                // endmetode 
              // metode  n =5
							if ($n<=5) {
								$qty = "-";
								$harga="-";
								echo "<td>-</td><td>-</td>";
							}else{
								$loop=0;
								$tmpbulan=$bulan;
								$tmptahun=$tahun;
								$tmpbulan--;
								$MA[$n]['qty']=0;
								$MA[$n]['harga']=0;
								$MA[$n]['qty_rule']="";
								$MA[$n]['harga_rule']="";
								do {
									if ($tmpbulan == 0) {
										$tmpbulan=12;
										$tmptahun--;
									}
									$tmpbulan= $tmpbulan < 10 ? "0".$tmpbulan :  $tmpbulan;
									$sql="SELECT sum(jumlah) as qty,sum(total_harga) as harga from history where tanggal like '".$tmptahun."-".$tmpbulan."%'";
									$tmp=mysqli_fetch_array(mysqli_query($conn,$sql));
									$MA[$n]['qty']+=$tmp['qty'];
									$MA[$n]['harga']+=$tmp['harga'];
									$temp_qty=$tmp['qty']>0 ? $tmp['qty'] : 0;
									$temp_harga=$tmp['harga']>0 ? $tmp['harga'] : 0;
									if ($loop==0) {
										$MA[$n]['qty_rule']=$MA[$n]['qty_rule'].$temp_qty;
										$MA[$n]['harga_rule']=$MA[$n]['harga_rule'].$temp_harga;
									}else{
										$MA[$n]['qty_rule']=$MA[$n]['qty_rule']."+".$temp_qty;
										$MA[$n]['harga_rule']=$MA[$n]['harga_rule']."+".$temp_harga;
									}
									$tmpbulan--;
									$loop++;
								} while ($loop<5); 
								echo "<td title='(".$MA[$n]['qty_rule'].")/5'>".round(($MA[$n]['qty']/5),2)."</td>"; 
								echo "<td title='(".$MA[$n]['harga_rule'].")/5'>Rp. ".round(($MA[$n]['harga']/5),2)."</td>";
							}
              // endmetode 
							echo "</tr>"  ;
							$n++;
							$bulan++;
						} while ($n<=12);
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="card mb-3">
			<div class="card-header">
				<h3 class="card-title">KNN</h3>
				<div class="card-tools">
				</div>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-striped">
					<thead class="bg-info">
						<tr>
							<th rowspan="2">No</th>
							<th rowspan="2">Bulan</th>
							<th colspan="2">Nilai Aktual</th>
							<th colspan="2">Target Bulan ke 3 (<i>k</i> = 2)</th>
							<th colspan="2">Target Bulan ke 5 (<i>k</i> = 4)</th>
						</tr>
						<tr>
							<th>QTY</th>
							<th>Total Harga</th>
							<th>Target QTY</th>
							<th>Target Harga</th>
							<th>Target QTY</th>
							<th>Target Harga</th>
						</tr>
					</thead>
					<tbody> 
						<?php
						$min=mysqli_fetch_array(mysqli_query($conn,"SELECT min(tanggal) as tanggal from history"));
						$bulan =  date_format(date_create($min['tanggal']),"m");
						$tahun =  date_format(date_create($min['tanggal']),"Y");
						$n=1;
						do {
							if ($bulan == 13) {
								$bulan=1;
								$tahun++;
							}
							$sbulan= $bulan < 10 ? "0".$bulan :  $bulan;
							$bulanan=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(jumlah) as qty,sum(total_harga) as harga from history where tanggal like '".$tahun."-".$sbulan."%'"));
							echo "<tr>";
							echo "<td>".$n."</td>";
							echo "<td>".bulan($bulan)." ".$tahun."</td>";
							echo "<td>";
							echo $bulanan['qty']!=null ? $bulanan['qty'] : "<i class='text-muted'>null</i>";
							echo "</td>"; 
							echo "<td>Rp. ".number_format($bulanan['harga'])."</td>";
							$data[$n]['harga']=$bulanan['qty'];
							$data[$n]['harga']=$bulanan['harga'];
              // metode  n =3
							if ($n<=2) {
								$qty = "-";
								$harga="-";
								echo "<td>-</td><td>-</td>";
							}else{
								$loop=0;
								$tmpbulan=$bulan;
								$tmptahun=$tahun;
								$tmpbulan--;
								$KNN[$n]['qty']=0;
								$KNN[$n]['harga']=0;
								do {
									if ($tmpbulan == 0) {
										$tmpbulan=12;
										$tmptahun--;
									}
									$tmpbulan= $tmpbulan < 10 ? "0".$tmpbulan :  $tmpbulan;
									$sql="SELECT sum(jumlah) as qty,sum(total_harga) as harga from history where tanggal like '".$tmptahun."-".$tmpbulan."%'";
									$tmp=mysqli_fetch_array(mysqli_query($conn,$sql));
									$KNN[$n]['qty']+=$tmp['qty'];
									$KNN[$n]['harga']+=$tmp['harga'];
									$temp_qty=$tmp['qty']>0 ? $tmp['qty'] : 0;
									$temp_harga=$tmp['harga']>0 ? $tmp['harga'] : 0;
									if ($loop==0) {
										$KNN[$n]['qty_rule']=$KNN[$n]['qty_rule'].$temp_qty;
										$KNN[$n]['harga_rule']=$KNN[$n]['harga_rule'].$temp_harga;
									}else{
										$KNN[$n]['qty_rule']=$KNN[$n]['qty_rule']."+".$temp_qty;
										$KNN[$n]['harga_rule']=$KNN[$n]['harga_rule']."+".$temp_harga;
									}
									$tmpbulan--;
									$loop++;
								} while ($loop<2); 
								echo "<td title='(".$KNN[$n]['qty_rule'].")/2'>".round(($KNN[$n]['qty']/2),2)."</td>"; 
								echo "<td title='(".$KNN[$n]['harga_rule'].")/2'>Rp. ".round(($KNN[$n]['harga']/2),2)."</td>";
							}
                // endmetode 
              // metode  n =5
							if ($n<=4) {
								$qty = "-";
								$harga="-";
								echo "<td>-</td><td>-</td>";
							}else{
								$loop=0;
								$tmpbulan=$bulan;
								$tmptahun=$tahun;
								$tmpbulan--;
								$KNN[$n]['qty']=0;
								$KNN[$n]['harga']=0;
								do {
									if ($tmpbulan == 0) {
										$tmpbulan=12;
										$tmptahun--;
									}
									$tmpbulan= $tmpbulan < 10 ? "0".$tmpbulan :  $tmpbulan;
									$sql="SELECT sum(jumlah) as qty,sum(total_harga) as harga from history where tanggal like '".$tmptahun."-".$tmpbulan."%'";
									$tmp=mysqli_fetch_array(mysqli_query($conn,$sql));
									$KNN[$n]['qty']+=$tmp['qty'];
									$KNN[$n]['harga']+=$tmp['harga'];
									$temp_qty=$tmp['qty']>0 ? $tmp['qty'] : 0;
									$temp_harga=$tmp['harga']>0 ? $tmp['harga'] : 0;
									if ($loop==0) {
										$KNN[$n]['qty_rule']=$KNN[$n]['qty_rule'].$temp_qty;
										$KNN[$n]['harga_rule']=$KNN[$n]['harga_rule'].$temp_harga;
									}else{
										$KNN[$n]['qty_rule']=$KNN[$n]['qty_rule']."+".$temp_qty;
										$KNN[$n]['harga_rule']=$KNN[$n]['harga_rule']."+".$temp_harga;
									}
									$tmpbulan--;
									$loop++;
								} while ($loop<4); 
								echo "<td title='(".$KNN[$n]['qty_rule'].")/4'>".round(($KNN[$n]['qty']/4),2)."</td>"; 
								echo "<td title='(".$KNN[$n]['harga_rule'].")/4'>Rp. ".round(($KNN[$n]['harga']/4),2)."</td>";
							}
              // endmetode 
							echo "</tr>"  ;
							$n++;
							$bulan++;
						} while ($n<=12);
						?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>