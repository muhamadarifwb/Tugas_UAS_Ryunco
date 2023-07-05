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
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<!-- Checkout -->
			<div class="row">
				<div class="col-12">
						<div class="pull-right">
								<a href="<?php echo base_url('belanja/checkout') ?>" class="btn animate"><i class="fa fa-shopping-cart"></i> Checkout</a>
								
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->