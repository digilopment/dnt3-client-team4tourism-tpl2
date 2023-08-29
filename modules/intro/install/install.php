<?php
function defaultModulMetaDataInstalation($postId, $moduleName){
	
	$defaultContent	= "Content";
	//$moduleName		= "wp_hotely";
	
	return array(
		"sql" => "
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'intro_name', '".$defaultContent."', 'text', 	2, 'Názov', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'intro_perex', '".$defaultContent."', 'content', 	2, 'Perex', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'intro_content','".$defaultContent."', 'content', 2, 'Content', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'intro_progress_1','".$defaultContent."', 'text', 2, 'Progres 1', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'intro_progress_2','".$defaultContent."', 'text', 2, 'Progres 2', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'intro_progress_3','".$defaultContent."', 'text', 2, 'Progres 3', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'intro_progress_4','".$defaultContent."', 'text', 2, 'Progres 4', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'intro_image', '".$defaultContent."', 'image', 2, 'Fotka',1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'intro_bg_image', '".$defaultContent."', 'image', 2, 'Background Fotka',1);
		"
	);
	
}