

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
                                    <tr>
										<td>Bukti Bayar</td>
										<td>: <?php if($header_transaksi->bukti_bayar != "") {  ?>
                                        <img src="<?php echo base_url('assets/upload/image/'.$header_transaksi->bukti_bayar) ?>" class="img img-thumnail" width="200">
                                    <?php }else{ echo 'Belum ada bukti bayar'; } ?></td>
									</tr>
								</tbody>
							</table>

                            <?php 
                            // Error Upload
                            if(isset($error)) {
                                echo '<p class="alert alert-warning">'.$error.'<?p>';
                            }
                            // notif erroe
                            echo validation_errors('<p class="alert alert-warning">','<?p>');

                            // form open
                            echo form_open_multipart(base_url('dashboard/konfirmasi/'.$header_transaksi->kode_transaksi));
                            
                            ?>

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td width="30%">Pembayaran ke Rekening</td>
                                        <td>
                                            <select name="id_rekening" class="form-control">
                                                <?php foreach($rekening as $rekening) { ?>
                                                    <option value="<?php echo $rekening->id_rekening ?>" <?php if($header_transaksi->id_rekening==$rekening->id_rekening) { echo "selected"; } ?>>
                                                        <?php echo $rekening->nama_bank ?> (NO. Rekening:
                                                        <?php echo $rekening->nomor_rekening ?> a.n
                                                        <?php echo $rekening->nama_pemilik ?>)
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                
                                    <tr>
                                        <td>Tanggal Bayar</td>
                                        <td>
                                            <input type="text" name="tanggal_bayar" class="form-control-lg" placeholder="dd-mm-yyyy" value="<?php if(isset($_POST['tanggal_bayar'])) { echo set_value('tanggal_bayar'); }elseif($header_transaksi->tanggal_bayar != "") { echo $header_transaksi->tanggal_bayar; }else{ echo date('d-m-y'); } ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Pembayaran</td>
                                        <td>
                                            <input type="number" name="jumlah_bayar" class="form-control-lg" placeholder="Jumlah Pembayaran" value="<?php if(isset($_POST['jumlah_bayar'])) { echo set_value('jumlah_bayar'); }elseif($header_transaksi->jumlah_bayar != "") {echo $header_transaksi->jumlah_bayar; } else{ echo $header_transaksi->jumlah_transaksi; } ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Dari Bank</td>
                                        <td>
                                            <input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank" value="<?php echo $header_transaksi->nama_bank ?>">
                                            <small>cnth: Bank BCA</small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Dari Nomor Rekening</td>
                                        <td>
                                            <input type="text" name="rekening_pembayaran" class="form-control" placeholder="No. Rek" value="<?php echo $header_transaksi->rekening_pembayaran ?>">
                                            <small>cnth: 1111222233334444</small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pemilik Rekening</td>
                                        <td>
                                            <input type="text" name="rekening_pelanggan" class="form-control" placeholder="Atas Nama" value="<?php echo $header_transaksi->rekening_pelanggan ?>">
                                            <small>cnth: Diki</small>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td>Upload Bukti Bayar</td>
                                        <td>
                                            <input type="file" name="bukti_bayar" class="form-control" placeholder="Upload Bukti Pembayaran">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-success btn-lg" type="submit" name="submit">
                                                    <i class="fa fa-upload"></i> Submit
                                                </button>
                                                <button class="btn btn-info btn-lg" type="reset" name="reset">
                                                    <i class="fa fa-upload"></i> Reset
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


							<?php }else{ ?>
								<p class="alert alert-success">
									<i class="fa fa-warning"></i> Data Belanja Kosong
								</p>
							<?php } ?>	
                            <!--/ End Product Style 1  -->	
                </div>
            </div>
        </div>
    </div>
</section>
