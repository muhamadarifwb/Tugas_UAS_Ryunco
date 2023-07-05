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
					<p class="alert alert-success"> Sudah Memiliki Akun? Silahkan <a href="<?php echo base_url('masuk') ?>" class="btn btn-info btn-sm">Login Disini</a></p>
					
                    <div class="col-md-12">
                        
                        <?php 
                        // Display Error
                        echo validation_errors('<div class="alert alert-warning">','</div>');
                        // Form Open
                        echo form_open(base_url('registrasi'), 'class="form"'); 
                        
                        ?>

                        <table>
                            <thead>
                                <tr>
                                    <th width="25%">Nama</th>
                                    <th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap" value="<?php echo set_value('nama_pelanggan') ?>" required></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Telephone</td>
                                    <td><input type="telephon" name="telephon" class="form-control" placeholder="Telephone" value="<?php echo set_value('telephon') ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><textarea name="alamat" class="form-control" placeholder="Alamat Lengkap" cols="30" rows="10"><?php echo set_value('alamat') ?></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button class="btn btn-success btn-lg" type="submit">
                                            <i class="fa fa-save"></i> Submit
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