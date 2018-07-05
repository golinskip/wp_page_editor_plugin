<?php

/*
  Plugin Name: Whitesite Theme Toolkit
  Plugin URI:
  Description: Whitestite theme toolkit - activate this plugin if you are using Wtst theme
  Version: 1.0.0
  Author: Whitesite
  Author URI: http://whitesite.eu/
  License: GPLv2
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('WPINC')) {
    die;
}

include plugin_dir_path(__FILE__) . DS . 'page-builder' . DS . 'page-builder.php';

include plugin_dir_path(__FILE__) . DS . 'admin' . DS . 'wtst-submenu.php';
include plugin_dir_path(__FILE__) . DS . 'admin' . DS . 'wtst-submenu-frontpage.php';
include plugin_dir_path(__FILE__) . DS . 'admin' . DS . 'wtst-submenu-settings.php';
include plugin_dir_path(__FILE__) . DS . 'admin' . DS . 'wtst-edit-form.php';



add_action('plugins_loaded', 'whitesite_theme_toolkit');
add_action('plugins_loaded', 'wtst_load_textdomain');

register_activation_hook(__FILE__, 'wtst_pb_install');

/**
 * Starts the plugin.
 *
 * @since 1.0.0
 */
function whitesite_theme_toolkit() {
    add_action('admin_menu', 'Wtst_Submenu');
    wtst_pb_init();
}


function wtst_load_textdomain() {
	load_plugin_textdomain( 'wtst', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}