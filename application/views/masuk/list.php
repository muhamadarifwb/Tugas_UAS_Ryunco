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
					<p class="alert alert-success"> Belum Memiliki Akun? Silahkan <a href="<?php echo base_url('registrasi') ?>" class="btn btn-success btn-sm"><i class="fa fa-user text-white"> Registrasi Disini</i></a></p>
					
                    <div class="col-md-12">
                        
                        <?php 
                        // Display Error
                        echo validation_errors('<div class="alert alert-warning">','</div>');

                        // notify error login
                        if($this->session->flashdata('warning')) {
                            echo '<div class="alert alert-warning">';
                            echo $this->session->flashdata('warning');
                            echo '</div>';
                        }

                        // notify error logout
                        if($this->session->flashdata('success')) {
                            echo '<div class="alert alert-success">';
                            echo $this->session->flashdata('success');
                            echo '</div>';
                        }

                        
                        // Form Open
                        echo form_open(base_url('masuk'), 'class="form"'); 
                        
                        ?>

                        <table>
                            
                            <tbody>
                                <tr>
                                    <td>Email (Username)</td>
                                    <td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required></td>
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td>
                                        <button class="btn btn-success btn-lg" type="submit">
                                            <i class="fa fa-save"></i> Login
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