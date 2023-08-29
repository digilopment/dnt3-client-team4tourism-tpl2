<?php
$layout = Vendor::getLayout();
include "dnt-view/layouts/".$layout."/tpl_functions.php";
include "dnt-view/layouts/".$layout."/top.php"; 
?>
		
<!-- End Header -->
<?php get_slider($data, 303); ?>
<?php 
	include "dnt-view/layouts/".$layout."/sections/about-me-section.php";
	include "dnt-view/layouts/".$layout."/sections/service-section.php";
	include "dnt-view/layouts/".$layout."/sections/achivements-section.php";
	include "dnt-view/layouts/".$layout."/sections/portfolio-section.php";
	include "dnt-view/layouts/".$layout."/sections/testimonials-section.php";
	include "dnt-view/layouts/".$layout."/sections/blog-section.php";
	include "dnt-view/layouts/".$layout."/sections/contact-info-section.php"; 
?>

<?php get_footer($data); ?>
<?php include "dnt-view/layouts/".$layout."/bottom.php"; ?>	