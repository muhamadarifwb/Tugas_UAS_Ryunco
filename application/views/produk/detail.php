<!-- Breadcrumbs -->
<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="<?php echo base_url() ?>">Home<i class="ti-arrow-right"></i></a></li>
                                <li><a href="<?php echo base_url('produk') ?>">Produk<i class="ti-arrow-right"></i></a></li>
								<span><?php echo $title ?></span>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

        <!-- Produk Detail -->
        <div>
        <div class="no-gutters">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <!-- Product Slider -->
                    <div class="product-gallery left w-10">
                        <div class="quickview-slider-active" width="20%">
                            <div class="single-slider" >
                                <img src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>"  alt="<?php echo $produk->nama_produk ?>">
                            </div>
                            <?php if($gambar) {
                                foreach($gambar as $gambar) { ?>
                            <div class="single-slider">
                                <img src="<?php  echo base_url('assets/upload/image/'.$gambar->gambar) ?>  ?>" alt="<?php echo $gambar->gambar ?>">
                            </div>
                            
                            <?php }} ?>
                        </div>
                    </div>
                    
                    <!-- End Product slider -->
                </div>
                                
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="quickview-content">
                        <h2><?php echo $title ?></h2>
                        <?php echo form_open(base_url('belanja/add')); 
							echo form_hidden('id',$produk->id_produk);
							// echo form_hidden('qty',1);
							echo form_hidden('price',$produk->harga);
							echo form_hidden('name',$produk->nama_produk);
							echo form_hidden('option',$produk->ukuran);
							// Elemen Redirect (Kembali halaman yg sebelumnya)
							echo form_hidden('redirect_page',str_replace('index.php/','',current_url()));
							?>
                        <div class="quickview-ratting-review">
                            <div class="quickview-ratting-wrap">
                                <div class="quickview-ratting">
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="yellow fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <a href="#"> (1 customer review)</a>
                            </div>
                            <div class="quickview-stock">
                                <span><i class="fa fa-check-circle-o"></i> in stock</span>
                            </div>
                        </div>
                        <h3>IDR <?php echo number_format($produk->harga,'0',',','.') ?></h3>
                        <div class="quickview-peragraph">
                            <p><?php echo $produk->keterangan ?></p>
                        </div>
                        <div class="size">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <h5 class="title"><?php echo $produk->ukuran ?></h5>
                                    <select>
                                        <option selected="selected">s</option>
                                        <option>m</option>
                                        <option>l</option>
                                        <option>xl</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                        <div class="quantity">
                            <!-- Input Order -->
                            <div class="input-group">
                                <div class="button minus">
                                    <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="qty">
                                        <i class="ti-minus"></i>
                                    </button>
                                </div>

                                <input type="number" name="qty" class="input-number"  data-min="1" data-max="1000" value="1">
                                
                                <div class="button plus">
                                    <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="qty">
                                        <i class="ti-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <!--/ End Input Order -->
                        </div>
                        <div class="add-to-cart">
                            <button type="submit" value="submit" class="btn">Add to cart</button>
                            <a href="#" class="btn min"><i class="ti-heart"></i></a>
                        </div>
                        <?php echo form_close(); ?>
                        <div class="default-social">
                            <h4 class="share-now">Share:</h4>
                            <ul>
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>