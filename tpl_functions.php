<?php function get_top($data){ ?>
<!DOCTYPE html>
<html lang="<?php echo $data['meta_settings']['keys']['default_lang']['value']; ?>">
<head>
    <meta charset="utf-8" />
    <title><?php echo $data['title'];?></title>
	<?php
	foreach($data['meta'] as $meta){
		echo $meta;
	}
	?>
    <meta name="author" content="designdnt">
    <meta name="viewport" content="width=device-width" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <?php 
	$favicon = Settings::getImage($data['meta_settings']['keys']['favicon']['value']);
	?>
	<!-- Favicone Icon -->
    <link rel="" type="img/x-icon" href="<?php echo $favicon; ?>" />
    <link rel="" type="img/png" href="<?php echo $favicon; ?>" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $favicon; ?>" />
    
	<!-- Css -->
    <link href="<?php echo $data['media_path']; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $data['media_path']; ?>css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $data['media_path']; ?>css/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $data['media_path']; ?>css/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $data['media_path']; ?>css/animate.min.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo $data['media_path']; ?>css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo $data['media_path']; ?>css/custom.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo $data['media_path']; ?>js/jquery-3.3.1.min.js"></script>
</head>
<body>
<?php } ?>
<?php function get_bottom($data){
	?>
    <!-- Js -->
    
    <script src="<?php echo $data['media_path']; ?>js/jquery.easing.1.3.js"></script>
    <script src="<?php echo $data['media_path']; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $data['media_path']; ?>js/owl.carousel.min.js"></script>
    <script src="<?php echo $data['media_path']; ?>js/isotope.pkgd.min.js"></script>
    <script src="<?php echo $data['media_path']; ?>js/jquery.appear.js"></script>
    <script src="<?php echo $data['media_path']; ?>js/jquery.countTo.js"></script>    
    <script src="<?php echo $data['media_path']; ?>js/circle-progress.js"></script>
    <script src="<?php echo $data['media_path']; ?>js/jquery.singlePageNav.min.js"></script>
    <script src="<?php echo $data['media_path']; ?>js/jquery.validate.min.js"></script>
	<script src="<?php echo $data['media_path']; ?>js/additional-methods.min.js"></script>
    <script src="<?php echo $data['media_path']; ?>js/contact-form.js"></script>
    <script src="<?php echo $data['media_path']; ?>js/wow.js"></script> 
    <script src="<?php echo $data['media_path']; ?>js/theme.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	</body>
</html>
<?php } ?>
<?php function color_conf($data){ 
//$color = $data['']
//var_dump($data['meta_settings']['keys']['color']['value']);
//$colorInverse = Dnt::colorInverse($color);

$color = $data['meta_settings']['keys']['color']['value'];
$colorRGBA = Dnt::hex2rgba($color, 0.85);
$colorDarken4 = Dnt::darkenColor($color, 4);
$colorDarken2 = Dnt::darkenColor($color, 2);
$reverseTextColor = "#ffffff";
echo '<style>
	.btn-color {
		background-color: '.$color.';
		color: #fff;
	}
	.yellow-bg {
		background-color: '.$color.';
	}
	.portfolio-filter li a.active {
		border: 2px solid '.$color.';
	}
	h1.main-title:after {
		background: '.$color.';
	}
	.overlay-yellow:before {
		background-color: '.$color.';
	}
	.icon-left {
		background: '.$color.';
	}
	p.copyright a {
		color: '.$color.';
	}
	.scroll-top {
		background: '.$color.';
	}
	.icon-text {
		color: '.$color.';
	}
	.overlay-dark:before {
		background-color: '.$colorRGBA.';
	}
	.social i:focus,
	.social i:hover {
		color: '.$color.';
	}

	/** static custom colors **/
	.contact-form input, .contact-form textarea {
		background: rgba(255, 255, 255, 0.9);
		color: #111;
	}
	.header.header-sticky-top {
		background-color: #fff;
		color: '.$color.';
		border-bottom: 2px solid '.$color.';
	}
	.nav-menu ul.nav-menu-inner li a,
	.header-fixed .nav-menu ul.nav-menu-inner li a {
		color: '.$color.';
	}
	.site-spinner {
		border-top: 3px solid '.$color.';
	}
	 .footer .social li:hover a {
		 color: '.$color.';
	}
		input[type="text"]:hover, input[type="email"]:hover, input[type="tel"]:hover, input[type="number"]:hover, input[type="radio"]:hover, input[type="checkbox"]:hover, input[type="password"]:hover, textarea:hover, select:hover {
		 border: 1px solid '.$color.';
	}
	.contact-form input, .contact-form textarea {
		color: '.$color.';
	}
	
	.dnt-form a {
		color: '.$color.';
	}
	.dnt-form a:hover {
		color: '.$colorDarken2.';
		text-decoration:underline;
	}
	
	/** DARKEN SECTION **/
	html body a:focus, 
	html body a:hover {
		color: '.$colorDarken2.';
	}
	 .btn.focus, .btn:focus {
		 color: '.$colorDarken2.';
	}

	 input[type="text"]:focus, input[type="email"]:focus, input[type="tel"]:focus, input[type="number"]:focus, input[type="radio"]:focus, input[type="checkbox"]:focus, input[type="password"]:focus, textarea:focus {
		 border: 1px solid '.$colorDarken2.';
		 color: '.$colorDarken2.';
	}
	 .widget-search input[type="submit"]:hover {
		 color: '.$colorDarken2.';
	}
	 .widget-search input[type="submit"]:focus {
		 color: '.$colorDarken2.';
	}
	
	.hotely i{
		color: '.$color.';
	}

	.hotely .about-me .service-box a{
		color: '.$color.';
	}
	.hotely .mb-15 {
		color: '.$colorDarken2.';
	}
	
	.region i{
		color: '.$color.';
	}
	.nav-menu-icon.active a, 
	.nav-menu-icon a.active, 
	.nav-menu-icon:hover a, 
	.nav-menu-icon a:hover, 
	.nav-menu ul.nav-menu-inner li.active a, 
	.nav-menu ul.nav-menu-inner li a.active, 
	.nav-menu ul.nav-menu-inner li:hover a, 
	.nav-menu ul.nav-menu-inner li a:hover, 
	.header-fixed .nav-menu ul.nav-menu-inner li a.current, 
	.header-fixed .nav-menu ul.nav-menu-inner li.current a {
    color: '.$colorDarken2.';
		text-decoration: none;
	}
	
	.contact-form input, .contact-form textarea {
		border: 1px solid '.$colorDarken2.';
	}
	.dark-bg {
		background-color: '.$colorDarken4.';
	}
	.scroll-top>i {
		color: '.$colorDarken4.';
	}
	.yellow-bg {
		border-top: 1px solid '.$color.';
	}
	.btn-color:hover {
		background-color: '.$colorDarken4.';
	}
	.btn-color {
		border: 1px solid '.$colorDarken2.';
	}


	/** TEXT COLOR **/
	.btn-color {
		color: '.$reverseTextColor.';
	}
	
	.testimonials-bg {
		background: linear-gradient(135deg,'.$color.', '.$colorDarken2.')!important;
	}
</style>';
}
?>
<?php function get_preloader($data){ ?>
<!-- Site preloader -->
<section id="preloader">
	<div class="site-spinner"></div>
	<h6>Spinner</h6>
</section>
<!-- End Site preloader -->
<?php } ?>
<?php function get_nav_menu($data){ 
   $rest 			= new Rest;
   $logo_firmy 		= Settings::getImage($data['meta_settings']['keys']['logo_firmy']['value']);
   $logo_firmy_2 	= Settings::getImage($data['meta_settings']['keys']['logo_firmy_2']['value']);
   $logo_firmy_3 	= Settings::getImage($data['meta_settings']['keys']['logo_firmy_3']['value']);
   
   $logo_url		= $data['meta_settings']['keys']['logo_url']['value'];
   $logo_url_2		= $data['meta_settings']['keys']['logo_url_2']['value'];
   $logo_url_3		= $data['meta_settings']['keys']['logo_url_3']['value'];
   ?>	
	<div id="header" class="header">
		<div class="header-inner">
			<!-- Logo -->
			<?php if($logo_firmy){ ?>
			<div class="logo">
				<a target="_blank" href="<?php echo $logo_url; ?>">
					<img src="<?php echo $logo_firmy; ?>" alt="logo" />
				</a>
			</div>
			<?php } ?>
			
			<?php if($logo_firmy_2){ ?>
			<div class="logo">
				<a target="_blank" href="<?php echo $logo_url_2; ?>">
					<img src="<?php echo $logo_firmy_2; ?>" alt="logo" />
				</a>
			</div>
			<?php } ?>
			
			<?php if($logo_firmy_3){ ?>
			<div class="logo">
				<a target="_blank" href="<?php echo $logo_url_3; ?>">
					<img src="<?php echo $logo_firmy_3; ?>" alt="logo" />
				</a>
			</div>
			<?php } ?>
			<!--End Navigation Icon-->
			<!--Navigation Icon-->
			<div class="nav-menu-icon">
				<a><i class="fa fa-bars"></i></a>
			</div>

			<!-- Navigation Menu -->
			<div class="nav-menu singlepage-nav">
				<ul class="nav-menu-inner">
				
				<?php 
					foreach($data['menu_items'] as $item){
					$name_url_1 = $item['name_url'];
					$name_1 = $item['name']; ?>
					<li class="<?php if($name_url_1 == $rest->webhook(1)){echo "active";}?> ">
						<a  href="<?php echo $name_url_1;?>"><?php echo $name_1 ;?></a>
					</li>
				<?php } ?>
				</ul>
			</div>
			<!-- End Navigation Menu -->
		</div>
	</div>
<?php } ?>
<?php function get_footer($data){ ?>
<!--Footer Section-->
<footer id="footer" class="footer dark-bg">
	<div class="container">
		<div class="footer-top ptb-50">
			<div class="row">
				<div class="col-md-6 col-xs-12 mini-menu">
					<ul>
						<?php 
						foreach($data['menu_items'] as $item){ 
							$name_url_1 = $item['name_url'];
							$name_1 	= $item['name'];
						?>
						<li>
							<a href="<?php echo $name_url_1; ?>" ><?php echo $name_1; ?></a>
						</li>
						<?php } ?>
					</ul>
				</div>
				<div class="col-md-6 col-xs-12">
					<!-- Social -->
					<ul class="social">
						<?php if($data['meta_settings']['keys']['facebook_page']['show'] == 1){?>
						<li>
							<a href="<?php echo $data['meta_settings']['keys']['facebook_page']['value'] ?>" target="_blank"><i class="fa fa-facebook"></i></a>
						</li>
						<?php } ?>
						
						<?php if($data['meta_settings']['keys']['twitter']['show'] == 1){?>
						<li>
							<a href="<?php echo $data['meta_settings']['keys']['twitter']['value'] ?>" target="_blank"><i class="fa fa-twitter"></i></a>
						</li>
						<?php } ?>
						
						<?php if($data['meta_settings']['keys']['linked_in']['show'] == 1){?>
						<li>
							<a href="<?php echo $data['meta_settings']['keys']['linked_in']['value'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
						</li>
						<?php } ?>
						
						<?php if($data['meta_settings']['keys']['google_plus']['show'] == 1){?>
						<li>
							<a href="<?php echo $data['meta_settings']['keys']['google_plus']['value'] ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
						</li>
						<?php } ?>
						
						<?php if($data['meta_settings']['keys']['youtube_channel']['show'] == 1){?>
						<li>
							<a href="<?php echo $data['meta_settings']['keys']['youtube_channel']['value'] ?>" target="_blank"><i class="fa fa-youtube"></i></a>
						</li>
						<?php } ?>
					</ul>
					<!-- End Social -->
				</div>
			</div>
		</div>
	</div>
	<!-- footer-top-->
	<div class="footer-bottom ptb-30">
		<div class="container">
			<div class="row">
				<div class="col-md-8  about">
					<ul>
						<li>
							<a href="<?php echo WWW_PATH ?>">
								<?php echo Multylanguage::translate($data, "footer_signature", "translate");?> <?php echo date("Y"); ?>
							</a>
						</li>
					</ul>
				</div>
				<div class="col-md-4 extends">
					<ul>
						
						<?php if($data['meta_settings']['keys']['impressum']['show'] == 1){?>
						<li>
							<a href="<?php echo $data['meta_settings']['keys']['impressum']['value'] ?>" target="_blank">
								<?php echo Multylanguage::translate($data, "impressum", "translate");?>
							</a>
						</li>
						<?php } ?>
						
						<?php if($data['meta_settings']['keys']['data_protection']['show'] == 1){?>
						<li>
							<a href="<?php echo $data['meta_settings']['keys']['data_protection']['value'] ?>" target="_blank">
								<?php echo Multylanguage::translate($data, "data_protection", "translate");?>
							</a>
						</li>
						<?php } ?>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--footer bottom-->
</footer>
<!-- === End Footer v8 === -->
<?php } ?>
<?php function get_slider_carousel($data, $sectionId){ 
$db = new Db;
$loop = ArticleList::data($postId = false, $sectionId);
$PHOTOS = array();
foreach($loop as $row){
	$PHOTOS[] = Image::getPostImage($row['id'],"dnt_posts");
}
?>
 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
	  <?php foreach($PHOTOS as $index => $photo){?>
         <li data-target="#carouselExampleIndicators" data-slide-to=" <?php echo $index ?>" class="<?php if($index == 0){echo "active";}?>"></li>
		 <?php } ?>
      </ol>
      <div class="carousel-inner">
		<?php foreach($PHOTOS as $index => $photo){?>
         <div class="carousel-item <?php if($index == 0){echo "active";}?>">
            <img class="d-block w-100" src="<?php echo $photo ?>" alt="Photo <?php echo $index ?>">
         </div>
		<?php } ?>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only"><?php echo Multylanguage::translate($data, "previous", "translate");?></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only"><?php echo Multylanguage::translate($data, "next", "translate");?></span>
      </a>
   </div>
<?php } ?>
<?php function get_slider($data, $sectionId){ ?>
<?php
$db = new Db;
$loop = ArticleList::data($postId = false, $sectionId);
?>
<!-- Intro Section -->
<section id="main-slider-section" class="intro">
   <!-- Owl Main Slider -->
   <div id="intro-section" class="intro-section owl-slider owl-carousel owl-theme">
	  <!--Slide Item-->
	  <?php foreach($loop as $row){
		  $img 		= Image::getPostImage($row['id'],"dnt_posts");
		  $perex 	= Dnt::not_html($row['perex']);
		  $content 	= Dnt::not_html($row['content']);
		  $more 	= false;
		  ?>
	  <div class="main-slider bg-image clearfix ptb-60 overlay-dark80 slider-dnt-settings" data-background-img="<?php echo $img; ?>" data-bg-position="center center">
		 <div class="container">
		  <div class="mainslider-content ptb-70">
		   <div class="mainslider-content-inner">
		   <?php if($perex){?>
			<h2 class="mainslider-title mb-15 pt-85"><?php echo $perex; ?></h2>
			<?php } ?>
			<?php if($content){?>
			<h1 class="mainslider-subtitle mb-10"><?php echo $content; ?></h1>
			<?php } ?>
			<?php if($more){?>
			<p class="mainslider-text"><?php echo $more; ?></p>
			<?php } ?>
			<div class="slider-btn mt-35">
				<a class="btn btn-lg btn-color mlr-10" href="<?php echo Rest::getModulUrl("registracia"); ?>">
					<?php echo Multylanguage::translate($data, "registracia", "translate");?>
				</a>
			 </div>
		   </div>
		</div>
		 </div>
	  </div>
	  <?php } ?>
	</div>
   <!-- Owl Main Slider -->
</section>
<!-- End Intro Section --> 
<?php } ?>