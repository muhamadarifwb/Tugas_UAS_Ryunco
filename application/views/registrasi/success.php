	<!-- Container Section -->
	<div class="section">
		<div class="container">
			<div class="pos-relative">
				<div class="col-12">
                    <h1><?php echo $title ?></h1>
                    <div class="clearfix"></div>
					<!-- Notify -->
                    <?php if($this->session->flashdata('success')) {
                        echo '<div class="alert alert-warning">';
                        echo $this->session->flashdata('success');
                        echo '</div>';
                    } ?>
                    <!--/ Notify -->
                    <br>
					<p class="alert alert-success"> Registrasi Telah Berhasil.
                Silahkan Checkout <a href="<?php echo base_url('belanja/checkout') ?>" class="btn btn-warning btn-sm"><i class="fa fa-shopping-cart"></i>Checkout</a></p>
					
                    
				</div>
			</div>
            <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-1-35 p-r-60 p-lr-15-sm">
                <div class="flex-w flex-m w-full-sm">

                </div>
                <div class="size10 trans-0-4 m-t-10 m-b-10">

                </div>
            </div>
			<!-- Checkout -->
		</div>
	</div>
	<!--/ End Container Section -->