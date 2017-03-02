<?php

namespace kpiint;

/**
 * Controller for integrations.
 */
class IntegrationController extends Singleton {

	/**
	 * Constructor.
	 */
	protected function __construct() {
		add_action("init",array($this,"init"));

		if (is_admin())
			add_filter("rwmb_meta_boxes",array($this,'rwmbMetaBoxes'));
	}

	/**
	 * Handle the init action.
	 */
	public function init() {
		register_post_type("kpiintegration",array(
			"labels"=>array(
				"name"=>"Kpi Integrations",
				"singular_name"=>"Kpi Integration",
				"not_found"=>"No Kpi Integrations found.",
				"add_new_item"=>"Add new Kpi Integration",
				"edit_item"=>"Edit Kpi Integration",
			),
			"public"=>true,
			"supports"=>array("title"),
			"show_in_nav_menus"=>false,
		));
	}

	/**
	 * Register meta boxes.
	 */
	public function rwmbMetaBoxes($metaBoxes) {
		global $wpdb;

		$metaBoxes[]=array(
	        'title'      => 'Integration',
	        'post_types' => 'kpiintegration',
	        'fields'     => array(
	            array(
	            	'type'=>'select',
	            	'id'=>'type',
	            	'name'=>'Type of Integration',
	            	'desc'=>'Which web service do you want to integrate with?',
	            	'placeholder'=>"Please select a type of Integration",
	                "options"=>array(
	                	"googlehits"=>"Number of hits on Google for a given phrase",
	                	"facebooklikes"=>"Number of Facebook liks for a given URL",
	                	"facebookshares"=>"The Number of times a URL has been shared on Facebook",
	                )
	            ),
	        ),
		);

		return $metaBoxes;
	}
}
