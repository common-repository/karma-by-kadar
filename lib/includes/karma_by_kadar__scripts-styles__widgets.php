<?php
/*
Version: 1.0.0
Author: Kadar Claudiu
*/

function karma_by_kadar__simple_player__widget__admin() {

	// JS files.
	wp_enqueue_script( 'karma-by-kadar__widgets__functions-js', KARMA_BY_KADAR__PLUGIN_URL . 'js/karma_by_kadar__widgets__functions.js' , array('jquery'), true, true );
	wp_enqueue_script( 'karma-by-kadar__widgets__functions__calls-js', KARMA_BY_KADAR__PLUGIN_URL . 'js/karma_by_kadar__widgets__functions__calls.js' , array('jquery'), true, true );

}

add_action( 'admin_enqueue_scripts', 'karma_by_kadar__simple_player__widget__admin' );


function karma_by_kadar__simple_player__widget__customizer() {

	// JS files.
	wp_enqueue_script( 'karma-by-kadar__widgets__functions-js', KARMA_BY_KADAR__PLUGIN_URL . 'js/karma_by_kadar__widgets__functions.js', array( 'customize-preview' ), '20181227', true );
	wp_enqueue_script( 'karma-by-kadar__widgets__functions__calls-js', KARMA_BY_KADAR__PLUGIN_URL . 'js/karma_by_kadar__widgets__functions__calls.js', array( 'karma-by-kadar__simple-player__widget-functions-js' ), '20181228', true );

	// CSS files.
	wp_enqueue_style( 'karma-by-kadar__widgets-css', KARMA_BY_KADAR__PLUGIN_URL . 'css/karma_by_kadar__widgets__css.css' );

}

add_action( 'customize_controls_enqueue_scripts', 'karma_by_kadar__simple_player__widget__customizer' );