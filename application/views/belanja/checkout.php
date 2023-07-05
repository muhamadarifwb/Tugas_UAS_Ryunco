	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="<?php echo base_url('dashboard') ?>">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="<?php echo base_url('belanja') ?>">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>GAMBAR</th>
								<th>PRODUK</th>
								<th class="text-center">HARGA</th>
								<th class="text-center">JUMLAH</th>
								<th class="text-center">SUBTOTAL</th> 
								<th class="text-center"><a href="<?php echo base_url('belanja/hapus') ?>"><i class="ti-trash remove-icon" ></i></a></th>
							</tr>
						</thead>
						<tbody>

                            <!-- lOOPING DATA KERANJANG -->
                            <?php 
                            foreach($keranjang as $keranjang) {
                                $id_produk = $keranjang['id'];
                                $produk    = $this->produk_model->detail($id_produk);
								// Form Update
								echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
                                ?>

							<tr>
								<td class="image" data-title="No"><img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>"></td>
								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>"><?php echo $keranjang['name'] ?></a></p>
									<p class="product-des"></p>
								</td>
								<td class="price" data-title="Price"><span>>Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?> </span></td>
								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group">
										

										<input type="number" name="qty" class="input-number"  data-min="1" data-max="100" value="<?php echo $keranjang['qty'] ?>">
										
                                        
									</div>
									<!--/ End Input Order -->
								</td>
								<td class="total-amount" data-title="Total"><span>Rp. 
                                    <?php 
                                    $sub_total = $keranjang['price'] * $keranjang['qty'];
                                    echo number_format($sub_total,'0',',','.');
                                     ?> </span>
                                </td>
								<td > 
									<button type="submit" name="update">
										<i class="fa fa-edit"></i>
									</button>
									|
									<a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>" data-title="Remove">
										<i class="ti-trash remove-icon"></i>
									</a>
								</td>
							</tr>
                            <!-- End Loop -->
                            <?php 
							echo form_close();

							}
							 ?>
                            <tr class="table-row">
                                <td colspan="4">Total Belanja</td>
                                <td>Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></td>
                            </tr>
							
						</tbody>
					</table>
				</div>
			</div>
                    
				
			<br><br>
			<!-- Checkout -->
			<?php echo form_open(base_url('belanja/checkout')); 
					$kode_transaksi = date('dmY').strtoupper(random_string('alnum',8));
					
					?>
					<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>">
					<input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total(); ?>">
                    <input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d'); ?>">
					<table>
                            <thead>
							<tr>
                                    <th >Kode Transkasi</th>
                                    <th><input type="text" name="kode_transaksi" class="form-control" value="<?php echo $kode_transaksi ?>" readonly required></th>
                                </tr>
                                <tr>
                                    <th >Nama Penerima</th>
                                    <th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>" required></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Email Penerima</td>
                                    <td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email ?>" required></td>
                                </tr>
                                
                                <tr>
                                    <td>Telephone Penerima</td>
                                    <td><input type="telephon" name="telephon" class="form-control" placeholder="Telephone" value="<?php echo $pelanggan->telephon ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Alamat Penerima</td>
                                    <td><textarea name="alamat" class="form-control" placeholder="Alamat Lengkap" cols="30" rows="10"><?php echo $pelanggan->alamat ?></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button class="btn btn-success btn-lg" type="submit">
                                            <i class="fa fa-shopping-cart"></i> Checkout
                                        </button>
                                        <button class="btn btn-default btn-lg" type="reset">
                                            <i class="fa fa-times"></i> Reset
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    	<?php echo form_close(); ?>
		</div>
	</div>
	<!--/ End Shopping Cart -->

                    
				
						
		