<?php

class AiraShortCodes
{
	function __construct()
	{
		$this->registerShortcodes();
	}

	function registerShortcodes()
	{
		add_shortcode('AiraProducts', array(&$this, 'getProduct'));
	}

	function login() {
		
		return OneBrandController::login();
	}
	
	function getProduct( $atts ) {
	
		return AiraController::getProductsAjax( $atts );
	}
	
// 	function excelImport() {
// 	
// 		return OnebrandController::excelImport();
// 	}
}

$AiraShortCodesProvider = new AiraShortCodes();