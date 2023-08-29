<?php
function defaultModulMetaDataInstalation($postId, $moduleName){
	
	$defaultContent	= "Content";
	//$moduleName		= "wp_hotely";

	
	return array(
		"sql" => "
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_1_hotel_name', '".$defaultContent."', 'text', 	3, 'Názov hotelu', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_1_text','".$defaultContent."', 'content', 3, 'Text k hotelu', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_1_text_2','".$defaultContent."', 'content', 3, 'Text k hotelu 2', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_1_adresa', '".$defaultContent."', 'text', 	3, 'Adresa', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_1_tel_c','".$defaultContent."', 'text', 3, 'Telefónne číslo', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_1_email','".$defaultContent."', 'text', 3, 'Email 1', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_1_web','".$defaultContent."', 'text', 3, 'Webová adresa 1', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_1_image_1','".$defaultContent."', 'image', 3, 'Fotka, alebo fotky - max 2', 1),
			
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_2_hotel_name', '".$defaultContent."', 'text', 	3, 'Názov hotelu', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_2_text','".$defaultContent."', 'content', 3, 'Text k hotelu', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_2_text_2','".$defaultContent."', 'content', 3, 'Text k hotelu 2', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_2_adresa', '".$defaultContent."', 'text', 	3, 'Adresa', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_2_tel_c','".$defaultContent."', 'text', 3, 'Telefónne číslo', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_2_email','".$defaultContent."', 'text', 3, 'Email 1', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_2_web','".$defaultContent."', 'text', 3, 'Webová adresa 1', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_2_image_1','".$defaultContent."', 'image', 3, 'Fotka, alebo fotky - max 2', 1),
			
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_3_hotel_name', '".$defaultContent."', 'text', 	3, 'Názov hotelu', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_3_text','".$defaultContent."', 'content', 3, 'Text k hotelu', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_3_text_2','".$defaultContent."', 'content', 3, 'Text k hotelu 2', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_3_adresa', '".$defaultContent."', 'text', 	3, 'Adresa', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_3_tel_c','".$defaultContent."', 'text', 3, 'Telefónne číslo', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_3_email','".$defaultContent."', 'text', 3, 'Email 1', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_3_web','".$defaultContent."', 'text', 3, 'Webová adresa 1', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_3_image_1','".$defaultContent."', 'image', 3, 'Fotka, alebo fotky - max 2', 1),
			
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_4_hotel_name', '".$defaultContent."', 'text', 	3, 'Názov hotelu', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_4_text','".$defaultContent."', 'content', 3, 'Text k hotelu', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_4_text_2','".$defaultContent."', 'content', 3, 'Text k hotelu 2', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_4_adresa', '".$defaultContent."', 'text', 	3, 'Adresa', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_4_tel_c','".$defaultContent."', 'text', 3, 'Telefónne číslo', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_4_email','".$defaultContent."', 'text', 3, 'Email 1', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_4_web','".$defaultContent."', 'text', 3, 'Webová adresa 1', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'id_4_image_1','".$defaultContent."', 'image', 3, 'Fotka, alebo fotky - max 2', 1);
			
		"
	);
	
}