<?php 
// Konfigurasi WebSite
$site = $this->konfigurasi_model->listing();

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title><?php echo $title ?></title>
	<!-- Icon -->
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/image/'.$site->icon) ?>">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	<!-- SEO Google Keywords -->
	<meta name="keywords" content="<?php echo $site->keywords ?>">
	<meta name="deskripsi" content="<?php echo $title ?>, <?php echo $site->deskripsi ?>">
	
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/reset.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/template/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/css/responsive.css">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- StyleSheet -->
	<style type="text/css" media="screen">
		ul.pagination {
			padding: 0 10px;
			background-color: orange;
			border-radius: 10px;
			text-align: center;
		}
		.pagination a, .pagination b {
			padding: 10px 20px;
			color: white;
			text-decoration: none;
			float: center;
		}
		.pagination a {
			background-color: orange;
			color: white;
		}
		.pagination b {
			background-color: black;
			color: white;
		}
		.pagination a:hover{
			background-color: black;
		}

	</style>
	
</head>
<body class="js">

<!-- Preloader -->
<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	