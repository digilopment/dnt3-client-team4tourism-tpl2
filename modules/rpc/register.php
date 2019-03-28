<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$rest 				= new Rest;
$db					= new Db;
$dntMailer			= new Mailer;

$postId				= $rest->webhook(4);
$data 				= Frontend::get(false, $postId);
$siteKey 			= $data['meta_settings']['keys']['gc_site_key']['value']; 
$secretKey 			= $data['meta_settings']['keys']['gc_secret_key']['value'];
$gc 				= new GoogleCaptcha($siteKey, $secretKey);


$form_base_name 	= $rest->post("form_base_name");
$form_base_surname 	= $rest->post("form_base_surname");
$form_base_psc 		= $rest->post("form_base_psc");
$form_base_city 	= $rest->post("form_base_city");
$form_base_email 	= $rest->post("form_base_email");
$form_base_tel_c 	= $rest->post("form_base_tel_c");
$form_base_custom_1 = $rest->post("form_base_custom_1");
$ans 				= $rest->post("ans");

$podmienky 			= $rest->post("podmienky");

$newsletter_1 		= $rest->post("newsletter_1");
$newsletter_2 		= $rest->post("newsletter_2");

$newsletter_embed_1 = $rest->post("newsletter_embed_1");
$newsletter_embed_2 = $rest->post("newsletter_embed_2");
$newsletter_embed_3 = $rest->post("newsletter_embed_3");

if($rest->post("g-recaptcha-response")){
	$NO_CAPTCHA = 0;
	$gc->setCheckedOptions($_POST['g-recaptcha-response']);
}else{
	$NO_CAPTCHA = 1;
}

if($rest->post('sent')){
	if($gc->getResult() || $NO_CAPTCHA){
		
		$filePath = "dnt-view/data/external-uploads/";
		$dntUpload = new Upload($_FILES['form_user_image_1']); 
		if ($dntUpload->uploaded) {
		   // save uploaded image with no changes
		   $dntUpload->image_resize = true;
		   $dntUpload->image_convert = 'jpg';
		   $dntUpload->image_x = 800;
		   //$dntUpload->image_max_width = 800;   
		   $dntUpload->image_ratio_y = true;
		   $dntUpload->Process($filePath);
		   if ($dntUpload->processed) {
			 $CUSTOM = json_encode(var_export($_FILES['form_user_image_1'], true));
			 $attachment =  "".WWW_PATH."".$filePath."".$dntUpload->file_dst_name."";
		   } else {
			 $attachment = "";
		   }
		}
		
		$table								= "dnt_registred_users";
		
		$insertedData["`type`"] 			= "competitor-user";
		$insertedData["`vendor_id`"] 		= Vendor::getId();
		$insertedData["`datetime_creat`"] 	= Dnt::datetime();
		
		
		$insertedData["`name`"] 			= $form_base_name;
		$insertedData["`surname`"] 			= $form_base_surname;
		
		$insertedData["`session_id`"] 		= uniqid();
		
		$insertedData["`psc`"] 				= $form_base_surname;
		$insertedData["`mesto`"] 			= $form_base_city;
		$insertedData["`email`"] 			= $form_base_email;
		$insertedData["`tel_c`"] 			= $form_base_tel_c;
		$insertedData["`custom_1`"] 		= $form_base_custom_1;
		$insertedData["`podmienky`"] 		= 1;
		$insertedData["`status`"] 			= 1;
		
		
		if($newsletter_embed_1 || $newsletter_1){
			$insertedData["`news`"] 	= 1;
		}else{
			$insertedData["`news`"] 	= 0;
		}
		if($newsletter_embed_2 || $newsletter_2){
			$insertedData["`news_2`"] 	= 1;
		}else{
			$insertedData["`news_2`"] 	= 0;
		}
		
		$insertedData["`content`"] 		= $ans;
		$insertedData["`ip_adresa`"] 	= Dnt::get_ip();
		$insertedData["`img`"] 			= $attachment;
		
		$db->insert($table, $insertedData);
		
		
		/***
		 *KONFIGURACIA ODOSLANEHO EMAILU 
		 *
		 *
		*/
		$sender_email						= $form_base_email;
		$msg 								= Multylanguage::translate($data, "dakujeme_za_registraciu", "translate"); 
		
		if($data['meta_tree']['keys']['email_sender']['show'] == 1 && $data['meta_tree']['keys']['email_subject']['show'] == 1){
			$senderEmail 	= $data['meta_tree']['keys']['email_sender']['value'];
			$messageTitle 	= $data['meta_tree']['keys']['email_subject']['value'];
		}else{
			$lang = $data['meta_settings']['keys']['language']['value'];
			switch ($lang) {
				case "sk":
					$senderEmail 	= "noreply@fingers-crossed.eu";
					$messageTitle 	= "Registracia do suťaže";
					break;
				case "cs":
					$senderEmail 	= "noreply@fingers-crossed.eu";
					$messageTitle   = "Registrace do soutěže";
					break;
				case "en":
					$senderEmail 	= "noreply@fingers-crossed.eu";
					$messageTitle   = "Competition registration";
					break;
				case "de":
					$senderEmail 	= "noreply@fingers-crossed.eu";
					$messageTitle   = "Gewinnspiel registrierung";
					break;
				default:
					$senderEmail 	= "info@vyhrat.com";
					$messageTitle   = "Registrace do soutěže";
			}
		}
		
		$dntMailer->set_recipient(array($sender_email));
		$dntMailer->set_msg($msg);
		$dntMailer->set_subject($messageTitle);
		$dntMailer->set_sender_name($senderEmail);
		$dntMailer->sent_email();
	
	
		$RESPONSE 		= 1;
		//$CUSTOM 		= "done";
		$ATTACHMENT 	= $attachment;
		//$CUSTOM = "done";
	}else{
		$RESPONSE 	= 2;
		$CUSTOM 	= "no captcha";
		$ATTACHMENT = false;
	}
}else{
	$RESPONSE 	= 0;
	$CUSTOM 	= "no post";
	$ATTACHMENT = false;
}

echo '
    {
      "success": "'.$RESPONSE.'",
      "request": "POST",
      "response": "'.$RESPONSE.'",
      "custom": "'.$ATTACHMENT.'",
      "imagex": "",
      "protokol": "REST",
      "lang": "",
      "generator": "Designdnt 3",
      "service": "c_dnt-ajax-universal",
      "message": "Silence is golden, speech is gift :)"
    }';


//IMG = form_user_image_1



exit;
$key 		= GET('type');
$f_no_robot = GET('no_robot');
$b_no_robot = $_SESSION['no_robot'];
$hash 		= __POST('form_id', true);
$id 		= competitionIdByHash($hash);
$F_captcha   = __POST('captcha', true);
$B_captcha   = $_SESSION['captcha'];
$lang   	= false;


$CUSTOM		= false;
$attachment		= false;
$gc = new GoogleCaptcha(getCompetitionMetaByInput('gc_site_key', $id), getCompetitionMetaByInput('gc_secret_key', $id));
$gc->setCheckedOptions($_POST['g-recaptcha-response']);
//$CUSTOM = $_POST['g-recaptcha-response'];
if (is_form_valid($hash, $key)){
	//if($f_no_robot == $b_no_robot || $f_no_robot != $b_no_robot){
		if( $F_captcha  == $B_captcha || $gc->getResult()){ //ak je dnt captcha, alebo google captcha potvrdena
	
				$uniq_id = false;
				$msg = false;
				$nazov = false;
				if(getCompetitionMetaByInput('_email_conf_char', $id)){
					$uniq_id 	= uniqid();	
					$msg 		= getCompetitionMetaByInput('_email_conf_sent_text', $id)."<br/><br/> code: <b>".$uniq_id."</b>";
				}
				else{
					$uniq_id 	= false;	
					$msg 		= getCompetitionMetaByInput('_email_conf_sent_text', $id)."";
				}

				$nazov 		= getCompetitionColumnByInput("nazov", $id);

				$name 		= __POST('form_base_name', true);
				$surname 	= __POST('form_base_surname', true);
				$psc 		= __POST('form_base_psc', true);
				$city 		= __POST('form_base_city', true);
				$email 		= __POST('form_base_email', true);
				$tel_c 		= __POST('form_base_tel_c', true);
				$custom_1 	= __POST('form_base_custom_1', true);
				$podmienky 	= 1;
				$news 		= __POST('newsletter', true);
				$news_2 		= __POST('newsletter_2', true);
				$ans 		= __POST('ans', true);
				$ip_adresa 	= get_ip();
				
				
				
				$dntUpload = new Upload($_FILES['form_user_image_1']); 
				if ($dntUpload->uploaded) {
				   // save uploaded image with no changes
				   $dntUpload->image_resize = true;
				   $dntUpload->image_convert = jpg;
				   $dntUpload->image_x = 800;
				   //$dntUpload->image_max_width = 800;   
				   $dntUpload->image_ratio_y = true;
				   $dntUpload->Process($filePath);
				   if ($dntUpload->processed) {

					 $CUSTOM = json_encode(var_export($_FILES['form_user_image_1'], true));
					 //$attachment =  "<a href='".getMyServer($dntDb)."dnt-system/data/30/usersuploads/".$dntUpload->file_dst_name."' >".$dntUpload->file_dst_name."</a>";
					 $attachment =  "".getMyServer($dntDb)."dnt-system/data/30/usersuploads/".$dntUpload->file_dst_name."";
				   } else {
					 $attachment = "";
				   }
				}
				
				$CUSTOM  = $attachment;
				
				if(isset($_POST['newsletter'])){
					$news = 1;
				}
				else{
					$news = 0;
				}
				
				if(isset($_POST['newsletter_2'])){
					$news_2 = 1;
				}
				else{
					$news_2 = 0;
				}

			
			$stringEmail = explode("@",$email);
			if(!hasInteger($stringEmail[0], 5)){
				mysql_query("INSERT INTO `obchod_zakaznici`	
					( `vendor`, competition_id, typ, `uniq_id`, `meno`, `priezvisko`, `psc`, `tel_c`, `custom_1`, `mesto`, `email`, podmienky, news, news_2, odpoved, url_fotka, datum_den, datum_mesiac, datum_rok, cas, ip_adresa) 
						VALUES 
					('".VENDOR_ID."', '$id', '$id', '$uniq_id', '$name', '$surname', '$psc', '$tel_c', '$custom_1', '$city', '$email', '$podmienky', '$news', '$news_2', '$ans', '".$attachment."', '".get_den()."','".get_mesiac()."','".get_rok()."','".get_cas()."', '".$ip_adresa."')");
						
				$lang = getCompetitionMetaByInput("_language", $id);
				switch ($lang) {
					case "sk_SK":
						$senderEmail 	= "noreply@fingers-crossed.eu";
						$messageTitle 	= "Registracia do suťaže";
						break;
					case "cs_CZ":
						$senderEmail 	= "noreply@fingers-crossed.eu";
						$messageTitle   = "Registrace do soutěže";
						break;
					case "en_EN":
						$senderEmail 	= "noreply@fingers-crossed.eu";
						$messageTitle   = "Competition registration";
						break;
					case "de_DE":
						$senderEmail 	= "noreply@fingers-crossed.eu";
						$messageTitle   = "Gewinnspiel registrierung";
						break;
					default:
						$senderEmail 	= "info@vyhrat.com";
						$messageTitle   = "Registrace do soutěže";
				}

				if(getCompetitionMetaByInputExists('sent_confirm_mail', $id)){		
					$mailer = new Mailer;
					$mailer->set_recipient(
								array(
									$email,
									)
								);
					$mailer->set_msg($msg);
					$mailer->set_subject($messageTitle);
					$mailer->set_sender_name($senderEmail);
					$mailer->set_sender_email($senderEmail);
					$mailer->sent_email();
				}
			}
				/*
					$predmet = "Test";
					$komu = "Tomas Doubek";
					$od_meno = "vyhrat";
					$od_email  = "info@vyhrat.com";
					$email_sprava = "Ahoj";
					my_email($predmet, $komu, $od_meno, $od_email, $email_sprava);
				*/
	
				$RESPONSE = 1; //response ok
				add_logg(
				array(
					"http_response" 	=> 200,
					"system_status" 	=> "ajax log - done",
					"msg"				=> "Default Log", 
					)
				);
					session_destroy(); //zrusi session pre opakovane odoslanie formulara
			}else{
				$RESPONSE = 2; //no captcha
				add_logg(
				array(
					"http_response" 	=> 200,
					"system_status" 	=> "ajax log - no_captcha",			
					"msg"				=> "No captcha", 
					)
				);
			} 
			
			
		/*}else{
			$RESPONSE = 5; //is robot
			add_logg(
				array(
					"http_response" 	=> 200,
					"system_status" 	=> "ajax log - is_robot",				
					"msg"				=> "Is robot", 
					)
				);
		}*/
	}else {	
	$RESPONSE = 0; //no post, no valid form
		add_logg(
		array(
			"http_response" 	=> 200,
			"system_status" 	=> "ajax log - no_post",		
			"msg"				=> "No Post", 
			)
		);
}


echo '
    {
      "success": "'.$RESPONSE.'",
      "request": "POST",
      "response": "'.$RESPONSE.'",
      "custom": "'.$CUSTOM.'",
      "imagex": "'.$imagex.'",
      "protokol": "REST",
      "lang": "'.$lang.'",
      "generator": "Designdnt 3",
      "service": "c_dnt-ajax-universal",
      "message": "Silence is golden, speech is gift :)"
    }';
	

