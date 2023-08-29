<?php
function custom_modules(){
	$webhook = new Webhook;
	/*
	custom modul listeners
	*/
	$custom_modules = array(
		//PARTNERI
		"intro" => array_merge(
				array(), $webhook->getSitemapModules("intro")
		), 
		"region" => array_merge(
				array(), $webhook->getSitemapModules("region")
		), 		
		"hotely" => array_merge(
				array(), $webhook->getSitemapModules("hotely")
		),  
		"partneri" => array_merge(
				array(), $webhook->getSitemapModules("partneri")
		),
		"registracia" => array_merge(
				array(), $webhook->getSitemapModules("registracia")
		),
		"singl_page" => array_merge(
				array(), $webhook->getSitemapModules("singl_page")
		),
	);
	return $custom_modules;
}

function modulesConfig(){
	return array(
		"intro" => array(
			"service_name" => "Intro",
			"sql" => ""
		),
		"hotely" => array(
			"service_name" => "Hotely",
			"sql" => ""
		),
		"region" => array(
			"service_name" => "Región",
			"sql" => ""
		),
		"partneri" => array(
			"service_name" => "Partneri",
			"sql" => ""
		),
		"registracia" => array(
			"service_name" => "Registrácia",
			"sql" => ""
		),
		"singl_page" => array(
			"service_name" => "Singl Page",
			"sql" => ""
		),
	);
}