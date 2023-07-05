

<!-- Product Style -->
<section class="product-area shop-sidebar shop section">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-12">
				<div class="shop-sidebar">
					<!-- include Menu.PHP -->
						<?php include('menu.php') ?>
				</div>
			</div>
			<div class="col-lg-9 col-md-8 col-12">
				<div class="col-sm-6 colmd-8 col-lg-9 p-b-50">
				<h1><?php echo $title ?></h1>
							<p>Riwayat Belanja Anda :</p>
							<?php if($header_transaksi) { 
							?>

							<table class="table table-bordered">
								<thead>
									<th width="">KODE TRANSAKSI</th>
									<th>: <?php echo $header_transaksi->kode_transaksi ?></th>
								</thead>
								<tbody>
									<tr>
										<td>tanggal</td>
										<td>: <?php echo date('d-m-y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
									</tr>
									<tr>
										<td>Jumlah Total</td>
										<td>: <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
									</tr>
									<tr>
										<td>Status Bayar</td>
										<td>: <?php echo $header_transaksi->status_bayar ?></td>
									</tr>
								</tbody>
							</table>

							<table class="table table-bordered" width="100%">
								<thead>
									<tr class="bg-success">
										<th>NO</th>
										<th>KODE</th>
										<th>NAMA PRODUK</th>
										<th>JUMLAH</th>
										<th>HARGA</th>
										<th>SUB TOTAL</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach($transaksi as $transaksi) { ?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $transaksi->kode_transaksi ?></td>
										<td><?php echo $transaksi->nama_produk ?></td>
										<td><?php echo number_format($transaksi->jumlah) ?></td>
										<td><?php echo number_format($transaksi->harga) ?></td>
										<td><?php echo number_format($transaksi->total_harga) ?></td>
									</tr>
									<?php $i++; } ?>
								</tbody>
							</table>

							<?php }else{ ?>
								<p class="alert alert-success">
									<i class="fa fa-warning"></i> Data Belanja Kosong
								</p>
							<?php } ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Product Style 1  -->	
