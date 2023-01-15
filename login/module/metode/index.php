<?php 
$aksi="module/".$_GET['module']."/action.php";
$tampil_perhitungan = 1;//buat jadi nol kalau mau diumpetin
$where = "";
if (isset($_POST)) {
    $label = isset($_POST['barang_id']) ? mysqli_fetch_array(mysqli_query($conn,"SELECT * from barang where id = '".$_POST['barang_id']."'"))['nama_barang'] : '';
    foreach ($_POST as $key => $value) {
        $where = $key."= '".$value."' and ";
    }
}
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
                    <p class="opacity-75 ">
                        <?php //echo $where ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container  pull-up">
    	<div class="row">
    		<div class="col-12 mb-3">
    			<div class="card">
    				<div class="card-header">
                        <span class="float-right">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                              Filter
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-scrollable|modal-dialog-centered modal-sm|modal-lg|modal-xl" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <form method="post" action="media.php?module=metode">
                                      
                                      <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label>Item</label>
                                                <select class="form-control" name="barang_id">
                                                    <?php 
                                                    $kategori = mysqli_query($conn,"SELECT * from kategori order by nama_kategori");
                                                    foreach ($kategori as $k): ?>
                                                    <optgroup label="<?php echo $k['nama_kategori'] ?>">
                                                        <?php 
                                                        $barang = mysqli_query($conn,"SELECT * from barang where kategori_id = '".$k['id']."' order by nama_barang");
                                                        foreach ($barang as $b): 
                                                            $selected = $b['id'] == @$_POST['barang_id'] ? ' selected ':'';
                                                            ?>
                                                            <option value="<?php echo $b['id'] ?>"><?php echo $b['nama_barang'] ?></option>
                                                        <?php endforeach ?>
                                                    </optgroup>
                                                        
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Find</button>
                                      </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                        </span>
    					<span class="float-left">
    						<h2>Rekapitulasi</h2>
                            <p><?php echo isset($label) ? 'Filter Item: <b>'.$label.'</b>':'' ?></p>
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
    									<th>No</th>
    									<th>Bulan</th>
    									<th>Jumlah</th>
    									<th hidden>Total Harga</th>
    								</tr>
    							</thead>
    							<tbody> 
    								<?php
    								$min=mysqli_fetch_array(mysqli_query($conn,"SELECT min(tanggal) as tanggal from transaksi"));
    								$max=mysqli_fetch_array(mysqli_query($conn,"SELECT max(tanggal) as tanggal from transaksi"));
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
    									$bulanan=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(qty) as qty,sum(total) as harga from transaksi join detail_transaksi on transaksi.id=detail_transaksi.transaksi_id where $where tanggal like '".$tahun."-".$sbulan."%'"));
    									echo "<tr>";
    									echo "<td>".$n."</td>";
    									echo "<td>".bulan($bulan)." ".$tahun."</td>"; 
    									echo "<td>";
    									echo $bulanan['qty']!=null ? $bulanan['qty'] : "<i class='text-muted'>0</i>";
    									echo "</td>"; 
    									echo "<td hidden>";
    									echo $bulanan['harga']!=0 ? "Rp. ".number_format($bulanan['harga']) : "<i class='text-muted'>Rp. 0</i>";
    									echo "</td>"; 
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
    			</div>
    		</div>
    		<div class="col-12 mb-3" hidden>
    			<div class="card">
    				<div class="card-header">
    					<span class="float-left">
    						<h2>Moving Average</h2>
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
    								$min=mysqli_fetch_array(mysqli_query($conn,"SELECT min(tanggal) as tanggal from transaksi"));
    								$max=mysqli_fetch_array(mysqli_query($conn,"SELECT max(tanggal) as tanggal from transaksi"));
    								$bulan =  date_format(date_create($min['tanggal']),"m");
    								$tahun =  date_format(date_create($min['tanggal']),"Y");
    								$n=1;
    								do {
    									if ($bulan == 13) {
    										$bulan=1;
    										$tahun++;
    									}
    									$sbulan= $bulan < 10 ? "0".$bulan :  $bulan;
    									$bulanan=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(qty) as qty,sum(total) as harga from transaksi join detail_transaksi on transaksi.id=detail_transaksi.transaksi_id where $where  tanggal like '".$tahun."-".$sbulan."%'"));
    									echo "<tr>";
    									echo "<td>".$n."</td>";
    									echo "<td>".bulan($bulan)." ".$tahun."</td>"; 
    									echo "<td>";
    									echo $bulanan['qty']!=null ? $bulanan['qty'] : "<i class='text-muted'>0</i>";
    									echo "</td>"; 
    									echo "<td>";
    									echo $bulanan['harga']!=0 ? "Rp. ".number_format($bulanan['harga']) : "<i class='text-muted'>Rp. 0</i>";
    									echo "</td>"; 
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
    											$sql="SELECT sum(qty) as qty,sum(total) as harga from transaksi join detail_transaksi on transaksi.id=detail_transaksi.transaksi_id   where $where  tanggal like '".$tmptahun."-".$tmpbulan."%'";
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
    										?>
    										<td>
    											<button type="button" class="btn btn-link" data-toggle="tooltip" data-html="true" title="(<?php echo $MA[$n]['qty_rule']; ?>)/3">
    												<?php echo round(($MA[$n]['qty']/3),2) ?>
    											</button>
    										</td>
    										<td>
    											<button type="button" class="btn btn-link" data-toggle="tooltip" data-html="true" title="(<?php echo $MA[$n]['harga_rule']; ?>)/3">
    												<?php echo "Rp. ".number_format($MA[$n]['harga']/3) ?>
    											</button>
    										</td>
    										<?php
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
    											$sql="SELECT sum(qty) as qty,sum(total) as harga from transaksi join detail_transaksi on transaksi.id=detail_transaksi.transaksi_id  where $where  tanggal like '".$tmptahun."-".$tmpbulan."%'";
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
    										?>
    										<td>
    											<button type="button" class="btn btn-link" data-toggle="tooltip" data-html="true" title="(<?php echo $MA[$n]['qty_rule']; ?>)/5">
    												<?php echo round(($MA[$n]['qty']/5),2) ?>
    											</button>
    										</td>
    										<td>
    											<button type="button" class="btn btn-link" data-toggle="tooltip" data-html="true" title="(<?php echo $MA[$n]['harga_rule']; ?>)/5">
    												<?php echo "Rp. ".number_format($MA[$n]['harga']/5) ?>
    											</button>
    										</td>
    										<?php
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
    			</div>
    		</div>
    		<div class="col-12 mb-3 ">
    			<div class="card">
    				<div class="card-header">
    					<span class="float-left">
    						<h2>Exponential Smoothing</h2>
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
    							<thead class="bg-primary">
    								<tr>
    									<th rowspan="2">No</th>
    									<th rowspan="2">Bulan</th>
    									<th colspan="1">Nilai Pengamatan</th>
    									<th colspan="1">Nilai Perkiraan (n=3)</th>
    									<th colspan="2" hidden>Nilai Perkiraan (n=5)</th>
    								</tr>
    								<tr>
    									<th>QTY</th>
    									<th hidden>Total Harga</th>
    									<th>Perkiraan QTY</th>
    									<th hidden>Perkiraan Harga</th>
    									<th hidden>Perkiraan QTY</th>
    									<th hidden>Perkiraan Harga</th>
    								</tr>
    							</thead>
    							<tbody> 
    								<?php
    								$alpha=0.2;
    								$min=mysqli_fetch_array(mysqli_query($conn,"SELECT min(tanggal) as tanggal from transaksi"));
    								$max=mysqli_fetch_array(mysqli_query($conn,"SELECT max(tanggal) as tanggal from transaksi"));
    								$bulan =  date_format(date_create($min['tanggal']),"m");
    								$tahun =  date_format(date_create($min['tanggal']),"Y");
    								$n=1;
    								do {
    									unset($ST1);
    									if ($bulan == 13) {
    										$bulan=1;
    										$tahun++;
    									}
    									$sbulan= $bulan < 10 ? "0".$bulan :  $bulan;
    									$bulanan=mysqli_fetch_array(mysqli_query($conn,"SELECT sum(qty) as qty,sum(total) as harga from transaksi join detail_transaksi on transaksi.id=detail_transaksi.transaksi_id where $where  tanggal like '".$tahun."-".$sbulan."%'"));
    									echo "<tr>";
    									echo "<td>".$n."</td>";
    									echo "<td>".bulan($bulan)." ".$tahun."</td>"; 
    									echo "<td>";
    									echo $bulanan['qty']!=null ? $bulanan['qty'] : "<i class='text-muted'>0</i>";
    									echo "</td>"; 
    									echo "<td hidden>";
    									echo $bulanan['harga']!=0 ? "Rp. ".number_format($bulanan['harga']) : "<i class='text-muted'>Rp. 0</i>";
    									echo "</td>"; 
    									$data[$n]['harga']=$bulanan['qty'];
    									$data[$n]['harga']=$bulanan['harga'];
    									// metode  n =3
    									$request=3;
                                        $ST1['qty_rule']="";
                                        $ST1['harga_rule']="";
                                        $string['qty_rule']="<b>S’t = α Xt + (1- α) S’t-1</b> <br>";  	
                                        $string['harga_rule']="<b>S’t = α Xt + (1- α) S’t-1</b> <br>"; 
                                        if ($n<=$request) {
                                            $qty = "-";
                                            $harga="-";
                                            echo "<td>-</td><td hidden>-</td>";
                                        }else{
                                            $loop=0;


                                                //Sʾt = α Xt + (1- α) S’t-1 
                                            $tmpbulan=$bulan-$request;
                                            if ($tmpbulan < 0) {
                                                $tmpbulan = 12 + $tmpbulan;
                                                $tmptahun--;
                                            }else{
                                                $tmptahun=$tahun;
                                            }
                                            $ES[$n]['qty']=0;
                                            $ES[$n]['harga']=0;
                                            $ES[$n]['qty_rule']="";
                                            $ES[$n]['harga_rule']="";
                                            do {
                                                $num=$loop+1;
                                                if ($tmpbulan == 13) {
                                                    $tmpbulan=1;
                                                    $tmptahun++;
                                                }


                                                $tmpbulan= $tmpbulan < 10 ? "0".$tmpbulan :  $tmpbulan;
                                                $sql="SELECT sum(qty) as qty,sum(total) as harga from transaksi join detail_transaksi on transaksi.id=detail_transaksi.transaksi_id   where $where  tanggal like '".$tmptahun."-".$tmpbulan."%'";
                                                $tmp=mysqli_fetch_array(mysqli_query($conn,$sql));
                                                $temp_qty=$tmp['qty']>0 ? $tmp['qty'] : 0;
                                                $temp_harga=$tmp['harga']>0 ? $tmp['harga'] : 0;
                                                $recent['qty'] = isset($recent['qty']) ? $recent['qty'] : $tmp['qty'];
                                                $recent['harga'] = isset($recent['harga']) ? $recent['harga'] : $tmp['harga'];

                                                $ST1[$loop]['qty']=($alpha * $temp_qty) + ((1 - $alpha) * $recent['qty']);
                                                $ST1[$loop]['harga']=($alpha * $temp_harga) + ((1 - $alpha) * $recent['harga']);

                                                $ST1['qty_res']=$ST1[$loop]['qty'];
                                                $ST1['harga_res']=$ST1[$loop]['harga'];


                                                $string['qty_rule'] .= "<li>Sʾ".$num." = (".$alpha." x ".$temp_qty.") + (1 - ".$alpha.") x ".$recent['qty']." = ".$ST1['qty_res']."</li>";
                                                $string['harga_rule'] .= "<li>Sʾ".$num." = (".$alpha." x ".$temp_harga.") + (1 - ".$alpha.") x ".$recent['harga']." = ".$ST1['harga_res']."</li>";

                                                $recent['qty'] = $ST1['qty_res'];
                                                $recent['harga'] = $ST1['harga_res'];

                                                $tmpbulan++;
                                                $loop++;

                                            } while ($loop<$request); 

                                            $loop=0;
                                            $string['qty_rule'].="<b>S’t = α S’t + (1- α) Sˮt-1 </b>  <br>";   
                                            $string['harga_rule'].="<b>S’t = α S’t + (1- α) Sˮt-1 </b>  <br>"; 

                                            // Sˮt = α S’t + (1- α) Sˮt-1 
                                            $tmpbulan=$bulan-$request;
                                            if ($tmpbulan < 0) {
                                                $tmpbulan = 12 + $tmpbulan;
                                                $tmptahun--;
                                            }else{
                                                $tmptahun=$tahun;
                                            }
                                            do {
                                                $num=$loop+1;

                                                if ($tmpbulan == 13) {
                                                    $tmpbulan=1;
                                                    $tmptahun++;
                                                }


                                                $tmpbulan= $tmpbulan < 10 ? "0".$tmpbulan :  $tmpbulan;
                                                $sql="SELECT sum(qty) as qty,sum(total) as harga from transaksi join detail_transaksi on transaksi.id=detail_transaksi.transaksi_id   where $where  tanggal like '".$tmptahun."-".$tmpbulan."%'";
                                                $tmp=mysqli_fetch_array(mysqli_query($conn,$sql));

                                                $recent['qty'] = isset($recent['qty']) ? $recent['qty'] : $tmp['qty'];
                                                $recent['harga'] = isset($recent['harga']) ? $recent['harga'] : $tmp['harga'];

                                                $ST2[$loop]['qty']=($alpha * $ST1[$loop]['qty']) + ((1 - $alpha) * $recent['qty']);
                                                $ST2[$loop]['harga']=($alpha * $ST1[$loop]['harga']) + ((1 - $alpha) * $recent['harga']);

                                                $ST2['qty_res']=$ST2[$loop]['qty'];
                                                $ST2['harga_res']=$ST2[$loop]['harga'];


                                                $string['qty_rule'] .= "<li>Sʾʾ".$num." = (".$alpha." x ".$ST1[$loop]['qty'].") + (1 - ".$alpha.") x ".$recent['qty']." = ".$ST2['qty_res']."</li>";
                                                $string['harga_rule'] .= "<li>Sʾʾ".$num." = (".$alpha." x ".$ST1[$loop]['harga'].") + (1 - ".$alpha.") x ".$recent['harga']." = ".$ST2['harga_res']."</li>";

                                                $recent['qty'] = $ST2['qty_res'];
                                                $recent['harga'] = $ST2['harga_res'];

                                                $tmpbulan++;
                                                $loop++;

                                            } while ($loop<$request); 


                                            $loop=0;
                                            $string['qty_rule'].="<b>at = 2S’t– Sˮt</b><br>";   
                                            $string['harga_rule'].="<b>at = 2S’t– Sˮt</b><br>"; 

                                            // at = 2S’t– Sˮt
                                            $tmpbulan=$bulan-$request;
                                            if ($tmpbulan < 0) {
                                                $tmpbulan = 12 + $tmpbulan;
                                                $tmptahun--;
                                            }else{
                                                $tmptahun=$tahun;
                                            }
                                            do {
                                                $num=$loop+1;

                                                if ($tmpbulan == 13) {
                                                    $tmpbulan=1;
                                                    $tmptahun++;
                                                }


                                                $tmpbulan= $tmpbulan < 10 ? "0".$tmpbulan :  $tmpbulan;
                                                $sql="SELECT sum(qty) as qty,sum(total) as harga from transaksi join detail_transaksi on transaksi.id=detail_transaksi.transaksi_id   where $where  tanggal like '".$tmptahun."-".$tmpbulan."%'";
                                                $tmp=mysqli_fetch_array(mysqli_query($conn,$sql));
                                                $temp_qty=$tmp['qty']>0 ? $tmp['qty'] : 0;
                                                $temp_harga=$tmp['harga']>0 ? $tmp['harga'] : 0;

                                                $recent['qty'] = isset($recent['qty']) ? $recent['qty'] : $tmp['qty'];
                                                $recent['harga'] = isset($recent['harga']) ? $recent['harga'] : $tmp['harga'];

                                                $at[$loop]['qty']=2*($ST1[$loop]['qty']) - $ST2[$loop]['qty'];
                                                $at[$loop]['harga']=2*($ST1[$loop]['harga']) - $ST2[$loop]['harga'];

                                                $at['qty_res']=$at[$loop]['qty'];
                                                $at['harga_res']=$at[$loop]['harga'];


                                                $string['qty_rule'] .= "<li>a".$num." = 2(".$ST1[$loop]['qty'].") - ".$ST2[$loop]['qty']." = ".$at['qty_res']."</li>";
                                                $string['harga_rule'] .= "<li>a".$num." = 2(".$ST1[$loop]['harga'].") - ".$ST2[$loop]['harga']." = ".$at['harga_res']."</li>";

                                                $recent['qty'] = $at['qty_res'];
                                                $recent['harga'] = $at['harga_res'];

                                                $tmpbulan++;
                                                $loop++;

                                            } while ($loop<$request); 



                                            $loop=0;

                                            // bt=  <h:frac> n='α' d='1-α'</h:frac> (S’t-S’’t)
                                            $string['qty_rule'].="<b>bt = (α/1-α)(S’t-S’’t)</b><br>";   
                                            $string['harga_rule'].="<b>bt=  (α/1-α)(S’t-S’’t)</b><br>"; 

                                            $tmpbulan=$bulan-$request;
                                            if ($tmpbulan < 0) {
                                                $tmpbulan = 12 + $tmpbulan;
                                                $tmptahun--;
                                            }else{
                                                $tmptahun=$tahun;
                                            }
                                            do {
                                                $num=$loop+1;

                                                $bt[$loop]['qty']= ($alpha / (1-$alpha)) * ($ST1[$loop]['qty']-$ST2[$loop]['qty']);
                                                $bt[$loop]['harga']= ($alpha / (1-$alpha)) * ($ST1[$loop]['harga']-$ST2[$loop]['harga']);

                                                $bt['qty_res']=$bt[$loop]['qty'];
                                                $bt['harga_res']=$bt[$loop]['harga'];


                                                $string['qty_rule'] .= "<li>b".$num." = (".$alpha." / 1-".$alpha.") * (".$ST1[$loop]['qty']." - ".$ST2[$loop]['qty'].") = ".$bt['qty_res']." </li>";
                                                $string['harga_rule'] .= "<li>b".$num." = (".$alpha." / 1-".$alpha.") * (".$ST1[$loop]['harga']." - ".$ST2[$loop]['harga'].") = ".$bt['harga_res']." </li>";

                                                $recent['qty'] = $bt['qty_res'];
                                                $recent['harga'] = $bt['harga_res'];

                                                $tmpbulan++;
                                                $loop++;

                                            } while ($loop<$request); 




                                            // bt=  <h:frac> n='α' d='1-α'</h:frac> (S’t-S’’t)
                                            $string['qty_rule'].="<b>St+m = at + bt m</b><br>";   
                                            $string['harga_rule'].="<b>St+m = at + bt m</b><br>"; 

                                            $num=$loop+1;

                                            $STlast[$loop]['qty']= ($at['qty_res']+$bt['qty_res']);
                                            $STlast[$loop]['harga']=($at['harga_res']+$bt['harga_res']);

                                            $STlast['qty_res']=$STlast[$loop]['qty'];
                                            $STlast['harga_res']=$STlast[$loop]['harga'];

                                            $string['qty_rule'] .= "<li>S".$num." = (".$at['qty_res']." + ".$bt['qty_res'].") = ".$STlast['qty_res']." </li>";
                                            $string['harga_rule'] .= "<li>S".$num." = (".$at['harga_res']." + ".$bt['harga_res'].") = ".$STlast['harga_res']." </li>";

                                            $recent['qty'] = $STlast['qty_res'];
                                            $recent['harga'] = $STlast['harga_res'];


                                            // print_r($string['harga_rule']);
                                            ?>
                                            <td>
                                                <?php echo $tampil_perhitungan == 1 ? $string['qty_rule']:"" ?>
                                                <?php echo $STlast['qty_res'] ?>
                                            </td>
                                            <td hidden>
                                                <?php echo $tampil_perhitungan == 1 ? $string['harga_rule']:"" ?>

                                                <?php echo "Rp. ".number_format($STlast['harga_res']) ?>

                                            </td>
                                            <?php
                                        }
                // endmetode 

              // metode  n =5

                                        $request=5;
                                        $ST1['qty_rule']="";
                                        $ST1['harga_rule']="";
                                        $string['qty_rule']="<b>S’t = α Xt + (1- α) S’t-1</b> <br>";    
                                        $string['harga_rule']="<b>S’t = α Xt + (1- α) S’t-1</b> <br>"; 
                                        if ($n<=$request) {
                                            $qty = "-";
                                            $harga="-";
                                            // echo "<td>-</td><td>-</td>";
                                        }else{
                                            $loop=0;


                                                //Sʾt = α Xt + (1- α) S’t-1 
                                            $tmpbulan=$bulan-$request;
                                            if ($tmpbulan < 0) {
                                                $tmpbulan = 12 + $tmpbulan;
                                                $tmptahun--;
                                            }else{
                                                $tmptahun=$tahun;
                                            }
                                            $ES[$n]['qty']=0;
                                            $ES[$n]['harga']=0;
                                            $ES[$n]['qty_rule']="";
                                            $ES[$n]['harga_rule']="";
                                            do {
                                                $num=$loop+1;
                                                if ($tmpbulan == 13) {
                                                    $tmpbulan=1;
                                                    $tmptahun++;
                                                }


                                                $tmpbulan= $tmpbulan < 10 ? "0".$tmpbulan :  $tmpbulan;
                                                $sql="SELECT sum(qty) as qty,sum(total) as harga from transaksi join detail_transaksi on transaksi.id=detail_transaksi.transaksi_id   where $where  tanggal like '".$tmptahun."-".$tmpbulan."%'";
                                                $tmp=mysqli_fetch_array(mysqli_query($conn,$sql));
                                                $temp_qty=$tmp['qty']>0 ? $tmp['qty'] : 0;
                                                $temp_harga=$tmp['harga']>0 ? $tmp['harga'] : 0;
                                                $recent['qty'] = isset($recent['qty']) ? $recent['qty'] : $tmp['qty'];
                                                $recent['harga'] = isset($recent['harga']) ? $recent['harga'] : $tmp['harga'];

                                                $ST1[$loop]['qty']=($alpha * $temp_qty) + ((1 - $alpha) * $recent['qty']);
                                                $ST1[$loop]['harga']=($alpha * $temp_harga) + ((1 - $alpha) * $recent['harga']);

                                                $ST1['qty_res']=$ST1[$loop]['qty'];
                                                $ST1['harga_res']=$ST1[$loop]['harga'];


                                                $string['qty_rule'] .= "<li>Sʾ".$num." = (".$alpha." x ".$temp_qty.") + (1 - ".$alpha.") x ".$recent['qty']." = ".$ST1['qty_res']."</li>";
                                                $string['harga_rule'] .= "<li>Sʾ".$num." = (".$alpha." x ".$temp_harga.") + (1 - ".$alpha.") x ".$recent['harga']." = ".$ST1['harga_res']."</li>";

                                                $recent['qty'] = $ST1['qty_res'];
                                                $recent['harga'] = $ST1['harga_res'];

                                                $tmpbulan++;
                                                $loop++;

                                            } while ($loop<$request); 

                                            $loop=0;
                                            $string['qty_rule'].="<b>S’t = α S’t + (1- α) Sˮt-1 </b>  <br>";   
                                            $string['harga_rule'].="<b>S’t = α S’t + (1- α) Sˮt-1 </b>  <br>"; 

                                            // Sˮt = α S’t + (1- α) Sˮt-1 
                                            $tmpbulan=$bulan-$request;
                                            if ($tmpbulan < 0) {
                                                $tmpbulan = 12 + $tmpbulan;
                                                $tmptahun--;
                                            }else{
                                                $tmptahun=$tahun;
                                            }
                                            do {
                                                $num=$loop+1;

                                                if ($tmpbulan == 13) {
                                                    $tmpbulan=1;
                                                    $tmptahun++;
                                                }


                                                $tmpbulan= $tmpbulan < 10 ? "0".$tmpbulan :  $tmpbulan;
                                                $sql="SELECT sum(qty) as qty,sum(total) as harga from transaksi join detail_transaksi on transaksi.id=detail_transaksi.transaksi_id   where $where  tanggal like '".$tmptahun."-".$tmpbulan."%'";
                                                $tmp=mysqli_fetch_array(mysqli_query($conn,$sql));

                                                $recent['qty'] = isset($recent['qty']) ? $recent['qty'] : $tmp['qty'];
                                                $recent['harga'] = isset($recent['harga']) ? $recent['harga'] : $tmp['harga'];

                                                $ST2[$loop]['qty']=($alpha * $ST1[$loop]['qty']) + ((1 - $alpha) * $recent['qty']);
                                                $ST2[$loop]['harga']=($alpha * $ST1[$loop]['harga']) + ((1 - $alpha) * $recent['harga']);

                                                $ST2['qty_res']=$ST2[$loop]['qty'];
                                                $ST2['harga_res']=$ST2[$loop]['harga'];


                                                $string['qty_rule'] .= "<li>Sʾʾ".$num." = (".$alpha." x ".$ST1[$loop]['qty'].") + (1 - ".$alpha.") x ".$recent['qty']." = ".$ST2['qty_res']."</li>";
                                                $string['harga_rule'] .= "<li>Sʾʾ".$num." = (".$alpha." x ".$ST1[$loop]['harga'].") + (1 - ".$alpha.") x ".$recent['harga']." = ".$ST2['harga_res']."</li>";

                                                $recent['qty'] = $ST2['qty_res'];
                                                $recent['harga'] = $ST2['harga_res'];

                                                $tmpbulan++;
                                                $loop++;

                                            } while ($loop<$request); 


                                            $loop=0;
                                            $string['qty_rule'].="<b>at = 2S’t– Sˮt</b><br>";   
                                            $string['harga_rule'].="<b>at = 2S’t– Sˮt</b><br>"; 

                                            // at = 2S’t– Sˮt
                                            $tmpbulan=$bulan-$request;
                                            if ($tmpbulan < 0) {
                                                $tmpbulan = 12 + $tmpbulan;
                                                $tmptahun--;
                                            }else{
                                                $tmptahun=$tahun;
                                            }
                                            do {
                                                $num=$loop+1;

                                                if ($tmpbulan == 13) {
                                                    $tmpbulan=1;
                                                    $tmptahun++;
                                                }


                                                $tmpbulan= $tmpbulan < 10 ? "0".$tmpbulan :  $tmpbulan;
                                                $sql="SELECT sum(qty) as qty,sum(total) as harga from transaksi join detail_transaksi on transaksi.id=detail_transaksi.transaksi_id   where $where  tanggal like '".$tmptahun."-".$tmpbulan."%'";
                                                $tmp=mysqli_fetch_array(mysqli_query($conn,$sql));
                                                $temp_qty=$tmp['qty']>0 ? $tmp['qty'] : 0;
                                                $temp_harga=$tmp['harga']>0 ? $tmp['harga'] : 0;

                                                $recent['qty'] = isset($recent['qty']) ? $recent['qty'] : $tmp['qty'];
                                                $recent['harga'] = isset($recent['harga']) ? $recent['harga'] : $tmp['harga'];

                                                $at[$loop]['qty']=2*($ST1[$loop]['qty']) - $ST2[$loop]['qty'];
                                                $at[$loop]['harga']=2*($ST1[$loop]['harga']) - $ST2[$loop]['harga'];

                                                $at['qty_res']=$at[$loop]['qty'];
                                                $at['harga_res']=$at[$loop]['harga'];


                                                $string['qty_rule'] .= "<li>a".$num." = 2(".$ST1[$loop]['qty'].") - ".$ST2[$loop]['qty']." = ".$at['qty_res']."</li>";
                                                $string['harga_rule'] .= "<li>a".$num." = 2(".$ST1[$loop]['harga'].") - ".$ST2[$loop]['harga']." = ".$at['harga_res']."</li>";

                                                $recent['qty'] = $at['qty_res'];
                                                $recent['harga'] = $at['harga_res'];

                                                $tmpbulan++;
                                                $loop++;

                                            } while ($loop<$request); 



                                            $loop=0;

                                            // bt=  <h:frac> n='α' d='1-α'</h:frac> (S’t-S’’t)
                                            $string['qty_rule'].="<b>bt = (α/1-α)(S’t-S’’t)</b><br>";   
                                            $string['harga_rule'].="<b>bt=  (α/1-α)(S’t-S’’t)</b><br>"; 

                                            $tmpbulan=$bulan-$request;
                                            if ($tmpbulan < 0) {
                                                $tmpbulan = 12 + $tmpbulan;
                                                $tmptahun--;
                                            }else{
                                                $tmptahun=$tahun;
                                            }
                                            do {
                                                $num=$loop+1;

                                                $bt[$loop]['qty']= ($alpha / (1-$alpha)) * ($ST1[$loop]['qty']-$ST2[$loop]['qty']);
                                                $bt[$loop]['harga']= ($alpha / (1-$alpha)) * ($ST1[$loop]['harga']-$ST2[$loop]['harga']);

                                                $bt['qty_res']=$bt[$loop]['qty'];
                                                $bt['harga_res']=$bt[$loop]['harga'];


                                                $string['qty_rule'] .= "<li>b".$num." = (".$alpha." / 1-".$alpha.") * (".$ST1[$loop]['qty']." - ".$ST2[$loop]['qty'].") = ".$bt['qty_res']." </li>";
                                                $string['harga_rule'] .= "<li>b".$num." = (".$alpha." / 1-".$alpha.") * (".$ST1[$loop]['harga']." - ".$ST2[$loop]['harga'].") = ".$bt['harga_res']." </li>";

                                                $recent['qty'] = $bt['qty_res'];
                                                $recent['harga'] = $bt['harga_res'];

                                                $tmpbulan++;
                                                $loop++;

                                            } while ($loop<$request); 




                                            // bt=  <h:frac> n='α' d='1-α'</h:frac> (S’t-S’’t)
                                            $string['qty_rule'].="<b>St+m = at + bt m</b><br>";   
                                            $string['harga_rule'].="<b>St+m = at + bt m</b><br>"; 

                                            $num=$loop+1;

                                            $STlast[$loop]['qty']= ($at['qty_res']+$bt['qty_res']);
                                            $STlast[$loop]['harga']=($at['harga_res']+$bt['harga_res']);

                                            $STlast['qty_res']=$STlast[$loop]['qty'];
                                            $STlast['harga_res']=$STlast[$loop]['harga'];

                                            $string['qty_rule'] .= "<li>S".$num." = (".$at['qty_res']." + ".$bt['qty_res'].") = ".$STlast['qty_res']." </li>";
                                            $string['harga_rule'] .= "<li>S".$num." = (".$at['harga_res']." + ".$bt['harga_res'].") = ".$STlast['harga_res']." </li>";

                                            $recent['qty'] = $STlast['qty_res'];
                                            $recent['harga'] = $STlast['harga_res'];


                                            // print_r($string['harga_rule']);
                                            ?>
                                            <td hidden>
                                                <?php echo $tampil_perhitungan == 1 ? $string['qty_rule']:"" ?>
                                                <?php echo $STlast['qty_res'] ?>
                                            </td>
                                            <td hidden>
                                                <?php echo $tampil_perhitungan == 1 ? $string['harga_rule']:"" ?>

                                                <?php echo "Rp. ".number_format($STlast['harga_res']) ?>

                                            </td>
                                            <?php
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
                </div>
            </div>
        </div>
    </div>
</section>