<?php
function defaultModulMetaDataInstalation($postId, $moduleName){
	
	$defaultContent	= "Content";
	//$moduleName		= "wp_hotely";
	
	return array(
		"sql" => "
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'name', '".$defaultContent."', 'text', 	2, 'Názov v rámci stránky', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'text_1', '".$defaultContent."', 'content', 	2, 'Text 1', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'text_2','".$defaultContent."', 'content', 2, 'Text 2', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'galeria_1','".$defaultContent."', 'image', 2, 'Galéria fotografii', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'mapa','Mapa', 'text', 2, 'Sekcia Mapa - názov sekcie', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'youtube_embed','text', 'youtube_embed', 2, 'Youtube video', 1);
		"
	);
	
}