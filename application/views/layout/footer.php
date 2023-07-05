<?php 
// load data konfigurasi Web
$site = $this->konfigurasi_model->listing();
$nav_produk_footer = $this->konfigurasi_model->nav_produk();

?>

<!-- Start Footer Area -->
<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="index.html"><img src="<?php echo base_url('assets/upload/image/'.$site->logo) ?>" width="50" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>"><p class="text-white">Ryunco</p></a>
							</div>
							<p class="text"><?php echo $site->tagline ?></p>
							<p class="call">Punya Pertanyaan? Telphone Kami 24/7<span><a href="tel:123456789"><?php echo $site->telephone ?></a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Kategori Produk</h4>
						   	<ul>
								<?php foreach($nav_produk_footer as $nav_produk_footer) { ?>
									<li><a href="<?php echo base_url('produk/katekori/'.$nav_produk_footer->slug_kategori) ?>"><?php echo $nav_produk_footer->nama_kategori ?>

										</a>
									</li>
								<?php } ?>
								
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer links">
							<h4>Information</h4>
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Faq</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="#">Contact Us</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
					
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Get In Tuch</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
								<li><i class="ti-location-pin"></i></i><?php echo $site->alamat ?></li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<ul>
								<li><a href="<?php echo $site->facebook ?>"><i class="ti-facebook"></i></a></li>
								<li><a href="<?php echo $site->instagram ?>"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © 2023 <a href="http://www.wpthemesgrid.com" target="_blank"><?php echo $this->session->userdata('nama') ?></a>  -  All Rights Reserved.</p>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="right">
								<img src="<?php echo base_url() ?>assets/template/images/payments.png" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->
 
	<!-- Jquery -->
    <script src="<?php echo base_url() ?>assets/template/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/template/js/jquery-migrate-3.0.0.js"></script>
	<script src="<?php echo base_url() ?>assets/template/js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="<?php echo base_url() ?>assets/template/js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="<?php echo base_url() ?>assets/template/js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="<?php echo base_url() ?>assets/template/js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="<?php echo base_url() ?>assets/template/js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="<?php echo base_url() ?>assets/template/js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="<?php echo base_url() ?>assets/template/js/magnific-popup.js"></script>
	<!-- Waypoints JS -->
	<script src="<?php echo base_url() ?>assets/template/js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="<?php echo base_url() ?>assets/template/js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="<?php echo base_url() ?>assets/template/js/nicesellect.js"></script>
	<!-- Flex Slider JS -->
	<script src="<?php echo base_url() ?>assets/template/js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="<?php echo base_url() ?>assets/template/js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="<?php echo base_url() ?>assets/template/js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="<?php echo base_url() ?>assets/template/js/easing.js"></script>
	<!-- Active JS -->
	<script src="<?php echo base_url() ?>assets/template/js/active.js"></script>

	<!-- Bootstap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>