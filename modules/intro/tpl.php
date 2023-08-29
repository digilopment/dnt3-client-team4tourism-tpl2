<?php
$layout = Vendor::getLayout();
include "dnt-view/layouts/".$layout."/tpl_functions.php";
include "dnt-view/layouts/".$layout."/top.php"; 
?>
		
<!-- End Header -->
<?php get_slider($data, 303); ?>

<!-- about-me section-->
<section id="about-me-section" class="intro about-me section-padding parallex-bg clearfix" 
<?php 
echo 'data-background-img="'.Image::getFileImage($data['meta_tree']['keys']['intro_bg_image']['value']).'"';
?>
data-bg-position="center">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2 class="mb-15"><?php echo $data['meta_tree']['keys']['intro_name']['value']; ?></h2>

				<ul class="experiance mb-15">
					<li><?php echo $data['meta_settings']['keys']['title']['value'];?></li>
					<li><?php echo $data['meta_tree']['keys']['intro_name']['value'];?></li>
				</ul>
				<p class="mb-20">
					<?php echo $data['meta_tree']['keys']['intro_content']['value'];?>
				</p>
				
			</div>
			<div class="col-md-6">
				<?php if($data['meta_tree']['keys']['intro_image']['show'] == 1){ ?>
					<img class="modul-image" src="<?php echo Image::getFileImage($data['meta_tree']['keys']['intro_image']['value']);?>">
				<?php } ?>
				
				<div class="row dnt-progress">
					<?php if($data['meta_tree']['keys']['intro_progress_1']['show'] == 1){?>
					<div class="col-md-6 col-sm-6 col-lg-3">
						<div class="work-skill design">
							<strong class="work-progress"></strong>
						</div>
						<h6 class="skill"><?php echo $data['meta_tree']['keys']['intro_progress_1']['value']; ?></h6>
					</div>
					<?php } ?>
					
					<?php if($data['meta_tree']['keys']['intro_progress_2']['show'] == 1){?>
					<div class="col-md-6 col-sm-6 col-lg-3">
						<div class="work-skill design">
							<strong class="work-progress"></strong>
						</div>
						<h6 class="skill"><?php echo $data['meta_tree']['keys']['intro_progress_2']['value']; ?></h6>
					</div>
					<?php } ?>
					
					<?php if($data['meta_tree']['keys']['intro_progress_3']['show'] == 1){?>
					<div class="col-md-6 col-sm-6 col-lg-3">
						<div class="work-skill design">
							<strong class="work-progress"></strong>
						</div>
						<h6 class="skill"><?php echo $data['meta_tree']['keys']['intro_progress_3']['value']; ?></h6>
					</div>
					<?php } ?>
					
					<?php if($data['meta_tree']['keys']['intro_progress_4']['show'] == 1){?>
					<div class="col-md-6 col-sm-6 col-lg-3">
						<div class="work-skill design">
							<strong class="work-progress"></strong>
						</div>
						<h6 class="skill"><?php echo $data['meta_tree']['keys']['intro_progress_4']['value']; ?></h6>
					</div>
					<?php } ?>
					<div class="row col-md-12 dnt-reg-link">
						<a class="btn btn-lg btn-color mlr-10" href="<?php echo Rest::getModulUrl("registracia"); ?>"><?php echo Multylanguage::translate($data, "registracia", "translate") ?></a>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>
</section>
<!-- end of about-me section-->

<?php get_footer($data); ?>
<?php include "dnt-view/layouts/".$layout."/bottom.php"; ?>		
