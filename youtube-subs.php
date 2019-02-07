<?php
/*
Plugin Name: Youtube Subscibers
Plugin URI: https://wordpress.org/plugins/youtube-subs/
Description: Checks Your Youtube Subs
Version: 0.1.0
Author: Devlob
Author URI: pph.me/devlob
Text Domain: youtube Subs
Domain Path: /languages
*/

if (!defined('ABSPATH')) {
	exit;
}

// Load Necessary Scripts
require_once(plugin_dir_path( __FILE__ ).'/includes/youtubesubs-scripts.php');
require_once(plugin_dir_path( __FILE__ ).'/includes/youtubesubs-class.php');

// Regesitering widget
function register_yts_widget(){
	register_widget( 'yts_Widget' );
}

// Hook in function
add_action( 'widgets_init', 'register_yts_widget' );