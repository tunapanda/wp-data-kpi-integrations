<?php
/*
Plugin Name: Data KPI Integrations
Plugin URI: http://github.com/tunapanda/wp-data-kpi-integrations
GitHub Plugin URI: http://github.com/tunapanda/wp-data-kpi-integrations
Description: Integrate with various services and such to get data to visualize.
Version: 0.0.1
*/

require_once __DIR__."/src/utils/AutoLoader.php";

define('KPIINT_PATH',plugin_dir_path(__FILE__));
define('KPIINT_URL',plugins_url('',__FILE__));

if (!defined("RWMB_URL")) {
	define("RWMB_URL",KPIINT_URL."/ext/meta-box/");
	require_once __DIR__."/ext/meta-box/meta-box.php";
}

$autoLoader=new kpiint\AutoLoader("kpiint");
$autoLoader->addSourceTree(KPIINT_PATH."/src");
$autoLoader->register();

kpiint\KpiIntegrationsPlugin::instance();
