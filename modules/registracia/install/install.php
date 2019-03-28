<?php
function defaultModulMetaDataInstalation($postId, $moduleName){
	
	$defaultContent	= "Content";
	//$moduleName		= "wp_hotely";
	
	return array(
		"sql" => "
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_base_name', 			'".$defaultContent."', 		'text', '3',	'Input Meno', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_base_surname', 		'".$defaultContent."', 		'text', '3',	'Input Priezvisko',  1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_base_psc', 			'".$defaultContent."', 		'text', '3',	'Input PSČ', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_base_city', 			'".$defaultContent."', 		'text', '3',	'Input Mesto', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_base_email', 			'".$defaultContent."', 		'text', '3',	'Input Email', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_base_tel_c', 			'".$defaultContent."', 		'text', '3',	'Input Tel. číslo', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_extend_v1_doklad', 	'".$defaultContent."', 		'text', '3',	'Input Doklad', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_extend_v2_otazka', 	'Napíšte farbu vášho PC', 	'text', '3',	'Input otázka', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_extend_v3_otazka', 	'Je toto modré?', 			'text', '3',	'Input Otázka + odpovede', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_extend_v3_odpoved_a', 	'áno',						'text', '3',	'Odpoveď A', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_extend_v3_odpoved_b', 	'nie',						'text', '3', 	'Odpoveď B', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_extend_v3_odpoved_c', 	'možno',					'text', '3', 	'Odpoveď C', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_base_custom_1', 		'Místo nákupu - zadejte', 	'text', '3', 	'Voliteľný parameter', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_user_image_1',  		'JAK PRÁZDNINY? - foto', 	'text', '3', 	'Upload obrázku', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'sent_confirm_mail', 		'1', 						'bool', '3', 	'Odoslať potvrdzovací email',  1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'email_conf_sent_text', 		'odoslané', 				'text', '3', 	'Hláška, súťažiacemu ktorá mu príde na email po registracii.',  1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'field_word_povinne_polia', 	'Povinné polia',			'text', '3', 	'Hláška za hviezdičkou o povinných poliach', 1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'email_conf_char', 			'8',						'text', '3', 	'Počet znakov vygenerovaného hashu',1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_file_podmienky_1',   	'', 						'file', '3', 	'Podmienky súťaže - PDF', 		1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_file_newsletter_1',  	'', 						'file', '3', 	'Newsletter 1 - PDF',			1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_file_newsletter_2',  	'', 						'file', '3', 	'Newsletter 2 - PDF',			1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_embed_newsletter_1', 	'', 						'text', '3', 	'Newsletter 1 - Embed',1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_embed_newsletter_2', 	'', 						'text', '3', 	'Newsletter 2 - Embed',1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'form_embed_newsletter_3', 	'', 						'text', '3', 	'Newsletter 3 - Embed',1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'email_sender', 				'', 						'text', '3', 	'Email odosielateľa pod ktorým príde thankyou mail',1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'email_subject', 			'', 						'text', '3', 	'Predmet emailu pod ktorým príde thankyou mail',1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'enable_registration', 		'', 						'no_input', '3','Povoliť alebo zakázať registráciu',1),
			(null, 0, $postId, '$moduleName', ".Vendor::getId().", 'koniec_registracie', 		'', 						'content', '3', 'Text po ukončení registrácie',1);
		"
	);
	
}