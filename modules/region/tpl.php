<?php
$layout = Vendor::getLayout();
include "dnt-view/layouts/".$layout."/tpl_functions.php";
include "dnt-view/layouts/".$layout."/top.php"; 
?>
		
<!-- End Header -->
<?php /*get_slider($data, 303);*/ ?>
<script  type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyAjpUqmtS9blsxsEUUgFN8HXjBSf2esdLI"></script>
<script>
	function initialize()
	{
	  var mapProp= {
		center:new google.maps.LatLng(47.3221006,12.7943083),
		zoom:17,
		mapTypeId:google.maps.MapTypeId.ROADMAP
	  };
	  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php 
$GALLERY = explode(",", $data['meta_tree']['keys']['galeria_1']['value']);
$PHOTOS = array();
foreach($GALLERY as $item){
	$PHOTOS[] = Image::getFileImage($item);
}

//var_dump($PHOTOS);


?>
<section class="region">
   <?php get_slider_carousel($data, 303); ?>
   <div class="container padding">
      <?php if(	$data['meta_tree']['keys']['youtube_embed']['show'] == 1 || 
         $data['meta_tree']['keys']['galeria_1']['show'] == 1){ ?> 
      <h3 class="text-left">Photo & Video</h3>
      <div class="row video-and-gallery">
         <?php if($data['meta_tree']['keys']['youtube_embed']['show'] == 1){ 
            if($data['meta_tree']['keys']['galeria_1']['show'] != 1){
            	$mainWrap = "offset-md-1 col-md-10 offset-md-1";
            }else{
            	$mainWrap = "col-md-7";
            }
            ?>
         <div class="<?php echo $mainWrap; ?>">
            <div class="video_cont">
               <div class="video_div">
                  <div class="responsive-container">
                     <iframe src="<?php echo $data['meta_tree']['keys']['youtube_embed']['value']; ?>"  allowfullscreen></iframe>
                  </div>
               </div>
            </div>
         </div>
         <?php } ?>
         <?php if($data['meta_tree']['keys']['galeria_1']['show'] == 1){ 
            if($data['meta_tree']['keys']['youtube_embed']['show'] != 1){
            	$mainWrap = "col-md-12";
            	$galItem = "col-md-4";
            }else{
            	$mainWrap = "col-md-5";
            	$galItem = "col-md-6";
            }
            ?>
         <div class="<?php echo $mainWrap; ?>">
            <div class="row">
               <?php foreach($PHOTOS as $index => $photo){?>
               <div class="portfolio-item <?php echo $galItem; ?> branding photography coffee">
                  <div class="portfolio-box">
                     <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                        data-image="<?php echo $photo;?>"
                        data-target="#image-gallery">
                        <img class="img-thumbnail"
                           src="<?php echo $photo;?>"
                           alt="">
                        <div class="portfolio-caption">
                           <div class="portfolio-caption-tb">
                              <div class="portfolio-caption-tb-cell">
                                 <h5>
                                    <i class="fa fa-arrows-alt"  style="font-size: 30px;"></i>
                                 </h5>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
               <?php } ?>
            </div>
         </div>
         <?php } ?>
      </div>
	  <div class="row col-md-12 dnt-reg-link" style="margin-top: 60px;">
		<a class="btn btn-lg btn-color mlr-10" href="<?php echo Rest::getModulUrl("registracia"); ?>"><?php echo Multylanguage::translate($data, "registracia", "translate") ?></a>
	  </div>
      <?php } ?>
      <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title" id="image-gallery-title"></h4>
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                  </button>
               </div>
               <div class="modal-body">
                  <img id="image-gallery-image" class="img-responsive col-md-12" src="">
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                  </button>
                  <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                  </button>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- TEXT -->
   <div class="testimonials testimonials-bg slanted-reverse">
      <div class="container">
         <h3 class="text-left"><?php echo $data['article']['name'];?></h3>
         <div class="row">
            <?php if($data['meta_tree']['keys']['text_1']['show'] == 1 && $data['meta_tree']['keys']['text_2']['show'] == 1){ ?>
            <div class="col-xs-12 col-md-6 item">
               <h4>
                  <?php echo $data['meta_tree']['keys']['text_1']['value'] ?>
               </h4>
            </div>
            <div class="col-xs-12 col-md-6 item">
               <h4><?php echo $data['meta_tree']['keys']['text_2']['value'] ?></h4>
            </div>
            <?php }elseif($data['meta_tree']['keys']['text_1']['show'] == 1 && $data['meta_tree']['keys']['text_2']['show'] == 0){?>
            <div class="col-xs-12 col-md-12 item">
               <h4>
                  <?php echo $data['meta_tree']['keys']['text_1']['value'] ?>
               </h4>
            </div>
            <?php }elseif($data['meta_tree']['keys']['text_1']['show'] == 0 && $data['meta_tree']['keys']['text_2']['show'] == 1){?>
            <div class="col-xs-12 col-md-12 item">
               <h4>
                  <?php echo $data['meta_tree']['keys']['text_2']['value'] ?>
               </h4>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
   <?php if($data['meta_tree']['keys']['mapa']['show'] == 1){ ?>
   <!-- MAP SECTION -->
   <div class="container padding">
      <h3 class="text-left"><?php echo $data['meta_tree']['keys']['mapa']['value'];?></h3>
      <div class="row mapa">
         <div class="col-md-12">
            <div id="googleMap" style="width:100%;height:400px;"></div>
         </div>
      </div>
   </div>
   <?php } ?>
</section>
   
<script>
$(document).ready(function () {
var modalId = $('#image-gallery');
    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });
</script>



<?php get_footer($data); ?>
<?php include "dnt-view/layouts/".$layout."/bottom.php"; ?>		
