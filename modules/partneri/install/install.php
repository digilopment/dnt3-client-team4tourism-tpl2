<?php
function defaultModulMetaDataInstalation($postId, $moduleName){
	
	$defaultContent	= "Content";
	
	return array(
		"sql" => "
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_1_hotel_name', '".$defaultContent."', 'text', 	3, 'Názov partnera', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_1_text','".$defaultContent."', 'content', 3, 'Hlavný text k partnerovi', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_1_text_2','".$defaultContent."', 'content', 3, 'Text k partnerovi 2', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_1_adresa', '".$defaultContent."', 'text', 	3, 'Adresa', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_1_tel_c','".$defaultContent."', 'text', 3, 'Telefónne číslo', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_1_email','".$defaultContent."', 'text', 3, 'Email 1', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_1_web','".$defaultContent."', 'text', 3, 'Webová adresa 1', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_1_image_1','".$defaultContent."', 'image', 3, 'Fotka, alebo fotky - max 2', 1);
			
		"
	);
	
}