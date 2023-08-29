<?php
$layout = Vendor::getLayout();
include "dnt-view/layouts/".$layout."/tpl_functions.php";
include "dnt-view/layouts/".$layout."/top.php"; 
?>
		
<!-- End Header -->
<?php get_slider($data, 303); 

$RAW_DATA = $data['meta_tree']['keys'];
$HOTELY = array();
foreach($RAW_DATA as $key => $item){
	if(Dnt::in_string("hotel_name", $key)){
		$HOTELY[] = $item['show'];
	}
}
$COUNT_HOTEL = count($HOTELY);
?>
<style>


</style>
<section class="dnt-form section-padding clearfix yellow-bg">
   <div class="container text-center">
      <h1 class="main-title"><?php echo $data['article']['name']; ?></h1>
   </div>
</section>
<section class="hotely">
<?php for($i=1; $i<=$COUNT_HOTEL;$i++){?>
<!-- about-me section-->
	<?php if($data['meta_tree']['keys']['id_'.$i.'_hotel_name']['show'] == 1){?>
	<article class="intro about-me section-padding parallex-bg clearfix" 
	   data-background-img="http://zsk-pompocz.localhost/dnt3/dnt-view/data/uploads/white_background.jpg"data-bg-position="center">
	   <div class="container">
		  <div class="row">
			 <div class="col-md-6">
				<h2 class="mb-15"><?php echo $data['meta_tree']['keys']['id_'.$i.'_hotel_name']['value']?></h2>
				<ul class="experiance mb-15">
				   <li><?php echo $data['title']; ?></li>
				   <li><?php echo $data['article']['name']; ?></li>
				</ul>
				<?php echo $data['meta_tree']['keys']['id_'.$i.'_text']['value']?>
			 </div>
			 <div class="col-md-6">
				<?php 
				$GALLERY = explode(",", $data['meta_tree']['keys']['id_'.$i.'_image_1']['value']);
				$PHOTOS = array();
				foreach($GALLERY as $item){
					$img = Image::getFileImage($item);
					echo '<img class="modul-image" src="'.$img.'"><br/>';
				}
				?>
				<?php if($data['meta_tree']['keys']['id_'.$i.'_text_2']['show'] == 1){?>
				<div class="row dnt-progress">
				   <?php echo $data['meta_tree']['keys']['id_'.$i.'_text_2']['value']?> 
				</div>
				<?php } ?>
			 </div>
		  </div>
		  <div class="row service-boxes">
			 <div class="col-lg-2 col-md-6 text-center"></div>
			 
			 <?php if($data['meta_tree']['keys']['id_'.$i.'_hotel_name']['show'] == 1){?>
			 <div class="col-lg-2 col-md-6 text-center">
				<div class="service-box">
				   <i class="fa fa-2x fa-heart wow bounceIn" style="visibility: visible; animation-name: bounceIn;"></i>
				   <h3></h3>
				   <p class="text-muted"><?php echo $data['meta_tree']['keys']['id_'.$i.'_hotel_name']['value']; ?></p>
				</div>
			 </div>
			 <?php } ?>
			 
			 <?php if($data['meta_tree']['keys']['id_'.$i.'_adresa']['show'] == 1){?>
			 <div class="col-lg-2 col-md-6 text-center">
				<div class="service-box">
				   <i class="fa fa-2x fa-location-arrow wow bounceIn" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: bounceIn;"></i>
				   <h3></h3>
				   <p class="text-muted"><?php echo $data['meta_tree']['keys']['id_'.$i.'_adresa']['value']; ?></p>
				</div>
			 </div>
			  <?php } ?>
			 
			  <?php if($data['meta_tree']['keys']['id_'.$i.'_tel_c']['show'] == 1){?>
			 <div class="col-lg-2 col-md-6 text-center">
				<div class="service-box">
				   <i class="fa fa-2x fa-paper-plane-o wow bounceIn" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: bounceIn;"></i>
				   <h3></h3>
				   <p class="text-muted">
					<?php echo $data['meta_tree']['keys']['id_'.$i.'_tel_c']['value']; ?>
				   </p>
				</div>
			 </div>
			 <?php } ?>
			 
			 <?php if($data['meta_tree']['keys']['id_'.$i.'_web']['show'] == 1){?>
			 <div class="col-lg-2 col-md-6 text-center">
				<div class="service-box">
				   <i class="fa fa-2x fa-globe wow bounceIn" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: bounceIn;"></i>
				   <h3></h3>
				   <p class="text-muted"><a target="_blank" href="<?php echo $data['meta_tree']['keys']['id_'.$i.'_web']['value']; ?>"><?php echo $data['meta_tree']['keys']['id_'.$i.'_web']['value']; ?></a></p>
				</div>
			 </div>
			  <?php } ?>
			 <div class="col-lg-2 col-md-6 text-center"></div>
		  </div>
	   </div>
	</article>
	<?php } ?>
<?php } ?>
<!-- end of about-me section-->
</section>
<?php get_footer($data); ?>
<?php include "dnt-view/layouts/".$layout."/bottom.php"; ?>		
