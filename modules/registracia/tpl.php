<?php
$layout = Vendor::getLayout();
include "dnt-view/layouts/".$layout."/tpl_functions.php";
include "dnt-view/layouts/".$layout."/top.php"; 
?>
		
<!-- End Header -->
<?php get_slider($data, 303); ?>
<?php
$FORM_BASE_VALUE = array();
foreach(array_keys($data['meta_tree']['keys']) as $key){
	if(Dnt::in_string("form_base", $key)){
		if($data['meta_tree']['keys'][$key]['show'] == 1){
			$FORM_BASE_VALUE[$key] = $data['meta_tree']['keys'][$key];
		}
	}
}
?>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
      $(document).ready(function() {
		  
		$( ".checkbox-line" ).css( "border-bottom", "1px solid #eee" );
		$( ".checkbox-line" ).last().css( "border", "0px" );

      	$("#registration_form").validate({
      		rules: {
				<?php foreach($FORM_BASE_VALUE as $key => $form){
				if($key != "form_base_tel_c"){
				?>
      			<?php echo $key; ?>: {
      				required: true,
      				minlength: 1
      			},
      			<?php 
					} 
				} 
				?>
				
				<?php if($data['meta_tree']['keys']['form_user_image_1']['show'] == 1){ ?>
				form_user_image_1: {
				  required: true,
				   accept:"jpg,png,jpeg,gif"
				},
				<?php } ?>
				
				podmienky: {
      				required: true,
      				minlength: 1
      			},
				<?php if(
				$data['meta_tree']['keys']['form_extend_v1_doklad']['show'] == 1 || 
				$data['meta_tree']['keys']['form_extend_v2_otazka']['show'] == 1 || 
				$data['meta_tree']['keys']['form_extend_v3_otazka']['show'] == 1 
				){ ?>
				ans: {
      				required: true,
      				minlength: 1
      			},
				<?php 
				} 
				?>
      		},
      		messages: {
      			<?php foreach($FORM_BASE_VALUE as $key => $form){
if($key != "form_base_tel_c"){					?>
      <?php echo $key; ?>: "<?php echo Multylanguage::translate($data, "field_word_err", "translate");?> ^",
      			<?php } ?>
      			<?php } ?>
      podmienky: "<?php echo Multylanguage::translate($data, "field_word_err", "translate");?> ^",
	  <?php if(
		$data['meta_tree']['keys']['form_extend_v1_doklad']['show'] == 1 || 
		$data['meta_tree']['keys']['form_extend_v2_otazka']['show'] == 1 || 
		$data['meta_tree']['keys']['form_extend_v3_otazka']['show'] == 1 
		){?>
      
	  
	  ans: "<?php echo Multylanguage::translate($data, "field_word_err", "translate");?> ^",
	  <?php } ?>
	   <?php if($data['meta_tree']['keys']['form_user_image_1']['show'] == 1){ ?>
      form_user_image_1: "Prosím vyberte fotku na upload. Fotka musí byť vo formáte jpg, jpeg, png, alebo gif",
	  <?php } ?>
      		},
      
      		submitHandler: function(form) {
				 
				$.ajax({
					// Your server script to process the upload
					url: "<?php echo WWW_PATH; ?>rpc/json/competition-register/<?php echo $data['post_id']?>",
					type: 'POST',

					// Form data
					data: new FormData($('#registration_form')[0]),

					// Tell jQuery not to process data or worry about content-type
					// You *must* include these options!
					cache: false,
					contentType: false,
					processData: false,

					// Custom XMLHttpRequest
					xhr: function() {
						var myXhr = $.ajaxSettings.xhr();
						if (myXhr.upload) {
							// For handling the progress of the upload
							myXhr.upload.addEventListener('progress', function(e) {
								if (e.lengthComputable) {
									$('progress').attr({
										value: e.loaded,
										max: e.total,
									});
								}
							} , false);
						}
						return myXhr;
					},
					success: function(data) {
      					//var data = jQuery.parseJSON(data);
      					console.log(data);
      					if (data.success == 1) {
      						$("#registration_form").css("display", "none");
      						$("#form_ok").css("display", "block");
      					} else if (data.success == 2) {
      						alert("No valid captcha");
      					} else if (data.success == 8) {
      						alert("Please select image");
      					}else if (data.success == 0) {
      						alert("...no post request...");
      					} else {
      						writeError(data.message);
      					}
      				},
				});
      			return false;
      		}
      
      
      	});
      
      	//writeError("TEST");		
      	function writeError(message) {
      		$("#form-result").html("<div class=\"alert alert-error\">" + message + "</div>");
      	}
      });
   </script> 
   
   
<section class="dnt-form section-padding clearfix yellow-bg">
   <div class="container text-center">
      <h1 class="main-title"><?php echo $data['article']['name']; ?></h1>
   </div>
</section>
<section id="about-me-section" class="intro about-me section-padding parallex-bg clearfix" data-bg-position="center">
<?php if($data['meta_tree']['keys']['enable_registration']['show'] == 1){?>
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="container">
               <form class="dnt-form" id="registration_form" action="#" method="POST">
				  
			  <!-- base form -->
			  <?php foreach($FORM_BASE_VALUE as $key => $form){ ?>
				<div class="row">
					<div class="col-xs-12 col-md-4">
						<label for="<?php echo $key; ?>"><?php echo $form['value']; ?></label>
					</div>
					<div class="col-xs-12 col-md-8">
						<input type="text" id="<?php echo $key; ?>" name="<?php echo $key; ?>" placeholder="<?php echo $form['value']; ?>">
					</div>
				</div>
				<?php } ?>
				
				<!-- IMG -->
				<?php if($data['meta_tree']['keys']['form_user_image_1']['show'] == 1){ ?>
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<label><?php echo $data['meta_tree']['keys']['form_user_image_1']['value']; ?></label>
						</div>
						<div class="col-xs-12 col-md-8">
							 <input type="file" accept="image/jpg,image/png,image/jpeg,image/gif" class="form-control" id="form_user_image_1" name="form_user_image_1" >
						</div>
					</div>
				<?php } ?>   
				
				<!-- extends 1 form doklad -->	
				<?php if($data['meta_tree']['keys']['form_extend_v1_doklad']['show'] == 1){ ?>
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<label><?php echo $data['meta_tree']['keys']['form_extend_v1_doklad']['value']; ?></label>
						</div>
						<div class="col-xs-12 col-md-8">
							<input type="text" name="ans" placeholder="<?php echo $data['meta_tree']['keys']['form_extend_v1_doklad']['value']; ?>">
						</div>
					</div>
				<?php } ?>    
				
				<!-- extends 2 form condisions -->	
				<?php if($data['meta_tree']['keys']['form_extend_v2_otazka']['show'] == 1){ ?>
				
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<label><?php echo $data['meta_tree']['keys']['form_extend_v2_otazka']['value']; ?></label>
						</div>
						<div class="col-xs-12 col-md-8">
							<input type="text" name="ans" placeholder="<?php echo $data['meta_tree']['keys']['form_extend_v2_otazka']['value']; ?>">
						</div>
					</div>
				<?php } ?>    
					
				<!-- extends 3 form condisions -->
				<?php if($data['meta_tree']['keys']['form_extend_v3_otazka']['show'] == 1){ ?>
                  <div class="row">
                     <div class="col-xs-12 col-md-4">
                        <label for="lname"><?php echo $data['meta_tree']['keys']['form_extend_v3_otazka']['value']; ?></label>
                     </div>
                     <div class="col-xs-12 col-md-8">
					 
					 <?php  if($data['meta_tree']['keys']['form_extend_v3_odpoved_a']['show'] == 1){ ?>
                        <label class="row" for="ans_a">
                           <div class="col-xs-2 dnt-form-item">a)</div>
                           <div class="col-xs-2 dnt-form-item"><input type="radio" name="ans" value="a" class="dnt-radio" id="ans_a"></div>
                           <div class="col-xs-8 dnt-form-item"><?php echo $data['meta_tree']['keys']['form_extend_v3_odpoved_a']['value']; ?></div>
                        </label>
					 <?php } ?>
						
					<?php  if($data['meta_tree']['keys']['form_extend_v3_odpoved_b']['show'] == 1){ ?>
                        <label class="row" for="ans_b">
                           <div class="col-xs-2 dnt-form-item">b)</div>
                           <div class="col-xs-2 dnt-form-item"><input type="radio" name="ans" value="b" class="dnt-radio" id="ans_b"></div>
                           <div class="col-xs-8 dnt-form-item"><?php echo $data['meta_tree']['keys']['form_extend_v3_odpoved_b']['value']; ?></div>
                        </label>
					 <?php } ?>
						
					<?php  if($data['meta_tree']['keys']['form_extend_v3_odpoved_c']['show'] == 1){ ?>
                        <label class="row" for="ans_c">
                           <div class="col-xs-2 dnt-form-item">c)</div>
                           <div class="col-xs-2 dnt-form-item"><input type="radio" name="ans" value="c" class="dnt-radio" id="ans_c"></div>
                           <div class="col-xs-8 dnt-form-item"><?php echo $data['meta_tree']['keys']['form_extend_v3_odpoved_c']['value']; ?></div>
                        </label>
					 <?php } ?>
					 
                     </div>
                  </div>
				<?php } ?>
				
				<!-- podmienky sutaze -->
				<?php if($data['meta_tree']['keys']['form_file_podmienky_1']['show'] == 1){ ?>
					<div class="row checkbox-line">
						<div class="col-xs-12 col-md-4">
							<a target="_blank" href="<?php echo Image::getFileImage($data['meta_tree']['keys']['form_file_podmienky_1']['value']); ?>">
								<i class="fa fa-external-link"></i> <?php echo Multylanguage::translate($data, "suhlas_s_podmienkami_1", "translate");?>
							</a>
						</div>
						<div class="col-xs-12 col-md-8">
							<input type="checkbox" name="podmienky">
						</div>
					</div>
				<?php } ?>
				
				<!-- pdf newsletter 1  -->
				<?php if($data['meta_tree']['keys']['form_file_newsletter_1']['show'] == 1){ ?>
					<div class="row checkbox-line">
						<div class="col-xs-12 col-md-4">
							<a target="_blank" href="<?php echo Image::getFileImage($data['meta_tree']['keys']['form_file_newsletter_1']['value']); ?>">
								<i class="fa fa-external-link"></i> <?php echo Multylanguage::translate($data, "suhlas_s_newslettrom_1", "translate");?>
							</a>
						</div>
						<div class="col-xs-12 col-md-8">
							<input type="checkbox" name="newsletter_1" >
						</div>
					</div>
				<?php } ?>
				
				
				<!-- pdf newsletter 2  -->
				<?php if($data['meta_tree']['keys']['form_file_newsletter_2']['show'] == 1){ ?>
					<div class="row checkbox-line">
						<div class="col-xs-12 col-md-4">
							<a target="_blank" href="<?php echo Image::getFileImage($data['meta_tree']['keys']['form_file_newsletter_2']['value']); ?>">
								<i class="fa fa-external-link"></i> <?php echo Multylanguage::translate($data, "suhlas_s_newslettrom_2", "translate");?>
							</a>
						</div>
						<div class="col-xs-12 col-md-8">
							<input type="checkbox" name="newsletter_2" >
						</div>
					</div>
				<?php } ?>
				
				
				<!-- embed newsletter 1  -->
				<?php if($data['meta_tree']['keys']['form_embed_newsletter_1']['show'] == 1){ ?>
					<div class="row checkbox-line">
						<div class="col-xs-12 col-md-4">
							<a target="_blank" href="<?php echo $data['meta_tree']['keys']['form_embed_newsletter_1']['value']; ?>">
								<i class="fa fa-external-link"></i> <?php echo Multylanguage::translate($data, "text_newsletter_embed_1", "translate");?>
							</a>
						</div>
						<div class="col-xs-12 col-md-8">
							<input type="checkbox" name="newsletter_embed_1" >
						</div>
					</div>
				<?php } ?>
				
				<!-- embed newsletter 2  -->
				<?php if($data['meta_tree']['keys']['form_embed_newsletter_2']['show'] == 1){ ?>
					<div class="row checkbox-line">
						<div class="col-xs-12 col-md-4">
							<a target="_blank" href="<?php echo $data['meta_tree']['keys']['form_embed_newsletter_2']['value']; ?>">
								<i class="fa fa-external-link"></i> <?php echo Multylanguage::translate($data, "text_newsletter_embed_2", "translate");?>
							</a>
						</div>
						<div class="col-xs-12 col-md-8">
							<input type="checkbox" name="newsletter_embed_2" >
						</div>
					</div>
				<?php } ?>
				
				<!-- embed newsletter 3  -->
				<?php if($data['meta_tree']['keys']['form_embed_newsletter_3']['show'] == 1){ ?>
					<div class="row checkbox-line">
						<div class="col-xs-12 col-md-4">
							<a target="_blank" href="<?php echo $data['meta_tree']['keys']['form_embed_newsletter_3']['value']; ?>">
								<i class="fa fa-external-link"></i> <?php echo Multylanguage::translate($data, "text_newsletter_embed_3", "translate");?>
							</a>
						</div>
						<div class="col-xs-12 col-md-8">
							<input type="checkbox" name="newsletter_embed_3" >
						</div>
					</div>
				<?php } ?>
				
				<?php 
				if($data['meta_settings']['keys']['gc_site_key']['show'] == 1 && $data['meta_settings']['keys']['gc_secret_key']['show'] == 1){ 
							$siteKey 	= $data['meta_settings']['keys']['gc_site_key']['value']; 
							$secretKey 	= $data['meta_settings']['keys']['gc_secret_key']['value'];
							$gc = new GoogleCaptcha($siteKey, $secretKey);
							$captcha = '<div class="g-recaptcha" data-sitekey="'.$gc->publicToken.'"></div>';
				?>
					<div class="row captcha">
						<div class="col-xs-12 col-md-4">
							<label><?php echo Multylanguage::translate($data, "captcha", "translate");?></label>
						</div>
						<div class="col-xs-12 col-md-8">
							<?php echo $captcha; ?>
						</div>
					</div>
				<?php } ?>
				
                  <div class="row">
                     <div class="col-xs-12 col-md-4">
						</div>
						<div class="col-xs-12 col-md-8">
							<input class="btn btn-lg btn-color mlr-1" type="submit" name="sent" value="<?php echo Multylanguage::translate($data, "odoslat_btn", "translate");?>">
						</div>
						
                  </div>
               </form>
			   
			   <div id="form_ok" style="display: none">
			   <div class="row">
					<div class="col-md-12">
						<h2 class="text-center"><?php echo Multylanguage::translate($data, "thankyou_for_registration", "translate");?>
						<br/>
						<br/>
						<p><?php echo Multylanguage::translate($data, "nova_registracia", "translate");?></p>
						<a class="btn btn-lg btn-color mlr-10" href="<?php echo Rest::getModulUrl("registracia"); ?>" style="margin-top: 80px;">
							<?php echo Multylanguage::translate($data, "registracia", "translate");?>
						</a>
					</div>
			   </div>
			 </div>
			 
            </div>
         </div>
      </div>
   </div>
	<?php }else{ ?>
		<?php if($data['meta_tree']['keys']['koniec_registracie']['show'] == 1){ ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="container">
						<?php echo $data['meta_tree']['keys']['koniec_registracie']['value']; ?>
					</div>
				</div>
			</div>
		</div>
		<?php }	?>
	<?php }	?>
</section>
<!--Contact Info Section-->

<?php get_footer($data); ?>
<?php include "dnt-view/layouts/".$layout."/bottom.php"; ?>		
