<?php

class AiraActions {

    
	public function __construct() {
// 		$this->locData = OnebrandController::Localization();

		$this->RegisterScripts();
        $this->RegisterAjaxActions();
        
    }
    
    
	function RegisterScripts() {

		if (is_admin()) {
			add_action('admin_enqueue_scripts', array(&$this, 'AdminScripts'));
		}
		else {
			add_action('wp_enqueue_scripts', array(&$this, 'FrontendScripts'));
		}
    }

    public function FrontendScripts() {
		wp_enqueue_script('aira_frontend', plugins_url(basename(dirname(__FILE__))).'/assets/js/aira_frontend.js');
		$this->LocalizeScript('aira_frontend');
		wp_enqueue_style('aira_frontend',plugins_url(basename(dirname(__FILE__))).'/assets/css/aira_frontend.css');
	}

	public function AdminScripts() {
		// wp_enqueue_script('aira_backend', plugins_url(basename(dirname(__FILE__))).'/assets/js/aira_backend.js', array('jquery'));
		// $this->LocalizeScript('aira_backend');		

		// wp_enqueue_style('aira_backend',plugins_url(basename(dirname(__FILE__))).'/assets/css/aira_backend.css');
	}
    
    public function LocalizeScript($ascript) {
        
        $protocol = is_ssl()?'https':'http';
		$ajax_url = admin_url('admin-ajax.php');
		$ajax_url = is_ssl()?str_replace("http://", "https://", $ajax_url):str_replace("https://", "http://", $ajax_url);

		$config_array = array(
			'ajax_url' => $ajax_url,
			'site_url' => site_url('', $protocol),
			'ajax_nonce' => wp_create_nonce($ascript . '_nonce'),
		);

		wp_localize_script($ascript, "aira_config", $config_array);
    }
    
    public function RegisterAjaxActions() {

		add_action("wp_ajax_nopriv_get_products", array('AiraController', 'getProductsAjax'));
		add_action("wp_ajax_get_products", array('AiraController', 'getProductsAjax'));

    }

}

$airaActionsProvider = new AiraActions();