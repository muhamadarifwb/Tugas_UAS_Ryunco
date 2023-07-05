<?php 
// Ambil Data menu dari konfigurasi
$nav_produk = $this->konfigurasi_model->nav_produk();
?>

<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.html"><img src="<?php echo base_url('assets/upload/image/'.$site->logo) ?>" width="50" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-sm-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								<form>
									<input name="search" placeholder="Search Products Here....." type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<!-- Profile -->
							<div class="sinlge-bar">
								<?php if($this->session->userdata('email')) { ?>
									<a href="<?php echo base_url('dashboard') ?>" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $this->session->userdata('nama_pelanggan') ?></a> 
									&nbsp; | &nbsp;
									<!-- Logout -->
									<a href="<?php echo base_url('masuk/logout') ?>" class="single-icon"><i class="fa fa-sign-out" aria-hidden="true"></i> <?php echo $this->session->userdata('masuk/logout') ?> Logout</a>
								<?php }else{ ?>
									<a href="<?php echo base_url('registrasi') ?>" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
								<?php } ?>
							</div>
							
							<?php 
							// check data belanja
							$keranjang = $this->cart->contents();
							// chech Jika data kosong

							?>
							<div class="sinlge-bar shopping">
								<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?php echo count($keranjang) ?></span></a>
								<!-- Shopping Item -->
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span><?php echo count($keranjang) ?> Items</span>
										<a href="<?php echo base_url('belanja') ?>">View Cart</a>
									</div>
									<ul class="shopping-list">
										<?php 
										// check data kosong
										if(empty($keranjang)) { 
										?>
										<li class="header-cart-item">
											<p class="alert alert-success">Keranjang Belanja kosong</p>
										</li>

										<?php 
										// jika ada data
										}else{
											// total Belanja
											$total_belanja = 'Rp. '.number_format($this->cart->total(),'0',',','.');
											// Tampilkan data belanja
											foreach($keranjang as $keranjang) {
												$id_produk = $keranjang['id'];
												// ambil data produk
												$produknya = $this->produk_model->detail($id_produk)
											 ?>
										<li>
											<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
											<a class="cart-img" href="#"><img src="<?php echo base_url('assets/upload/image/thumbs/'.$produknya->gambar) ?>" ></a>
											<h4><a href="<?php echo base_url('produk/detail/'.$produknya->slug_produk) ?>"><?php echo $keranjang['name'] ?></a></h4>
											<p class="quantity">1x - <span class="amount"><?php echo $keranjang['qty'] ?> x Rp. <?php echo number_format($keranjang['price'],'0',',','.') ?>: <?php echo number_format($keranjang['subtotal'],'0',',','.') ?></span></p>
										</li>
										<?php
										}
										} ?>
										
									</ul>
									<div class="bottom">
										<div class="total">
											<span>Total</span>
											<span class="total-amount"><?php if(!empty($keranjang)) { echo $total_belanja; } ?></span>
										</div>
										<a href="<?php echo base_url('belanja/checkout') ?>" class="btn animate">Checkout</a>
									</div>
								</div>
								<!--/ End Shopping Item -->
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-4">
							
						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
													<!-- Home -->
													<li class="active"><a href="<?php echo base_url() ?>">Home</a></li>
													<!-- Produk -->
													<li><a href="<?php echo base_url('produk') ?>">Product<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															<?php foreach($nav_produk as $nav_produk) { ?>
															<li><a href="<?php echo base_url('produk/kategori/'.$nav_produk->slug_kategori) ?>"><?php echo $nav_produk->nama_kategori ?></a></li>
															<?php } ?>
														</ul>
													</li>												
																					
													<li><a href="#">Blog<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
															<li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
														</ul>
													</li>
													<li><a href="<?php echo base_url('kontak') ?>">Contact Us</a></li>
												</ul>
										</div>
									</div>

								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->