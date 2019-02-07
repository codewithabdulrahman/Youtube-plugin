<?php

function yts_add_scripts(){
	// js file importing
	wp_enqueue_script( 'main-js-file', plugin_dir_path( __FILE__ ) .'js/main.js' );
	// css file importing
	wp_enqueue_style( 'css-style', plugin_dir_path( __FILE__ ) .'css/style.css' );
	// icon Script
	wp_register_script( 'google-script', 'https://apis.google.com/js/platform.js' );
	wp_enqueue_script( 'google-script');

}

add_action( 'wp_enqueue_scripts', 'yts_add_scripts' );