<?php
$data = Frontend::get();
get_top($data);
color_conf($data);
?>

<?php
if($data['meta_settings']['keys']['ga_key']['show'] == 1){
	$ga_key = $data['meta_settings']['keys']['ga_key']['value'];
	?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', '<?php echo $ga_key; ?>', 'auto');
	  ga('send', 'pageview');
	</script>
	<?php
}
if($data['meta_settings']['keys']['pixel_retargeting']['show'] == 1){
?>
<noscript>
<img height="1" width="1" border="0" alt="" style="display:none" src="<?php echo $data['meta_settings']['keys']['pixel_retargeting']['value']; ?>" />
</noscript>
<?php } ?>

<?php get_preloader($data); ?>

<!-- Page Wraper -->
<div id="page-wraper">
	<div class="wrapper">
		<!-- Header -->
		
		<?php get_nav_menu($data); ?>