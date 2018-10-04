<?php

/**
 * Scripts Enqueue
 * Registers and Enqueue Scripts in footer or head
 *
 * @since   1.0
 * @version 1.2
 * @see     https://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
 * @see     https://developer.wordpress.org/reference/functions/wp_register_script/
 * @see     https://developer.wordpress.org/reference/functions/wp_deregister_script/
 * @see     https://developer.wordpress.org/reference/functions/get_theme_file_uri/
 * @see     https://developer.wordpress.org/reference/functions/get_parent_theme_file_uri/
 */
function dl_enqueue_scripts() {

	global $theme_options;
	$theme_data = wp_get_theme();

	/* Deregister Scripts */
	wp_deregister_script( 'jQuery' );
	wp_deregister_script( 'jQuery-Migrate' );


	/* Register Scripts */
	wp_register_script('jquery-3', 'https://code.jquery.com/jquery-3.3.1.min.js', null, '3.3.1', true);
	wp_register_script( 'flickity', get_theme_file_uri('/assets/js/lib/flickity.pkgd.js'), array('jquery-3'), '2.1.0', true );
	wp_register_script( 'main_js', get_theme_file_uri('/assets/js/functions.js'), array('jquery-3'), $theme_data->get( 'Version' ), true );
	wp_register_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array('jquery-3'), '1.14.3', true );
	wp_register_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery-3'), '4.1.3', true);
	wp_register_script( 'flexslider', get_theme_file_uri('/assets/js/lib/jquery.flexslider.js'), array('jquery-3'), null, true );

	wp_enqueue_script( 'jquery-3' );
	wp_enqueue_script( 'popper' );
	wp_enqueue_script( 'bootstrap' );
	wp_enqueue_script( 'main_js' );
	wp_enqueue_script( 'flexslider' );

}

add_action( 'wp_enqueue_scripts', 'dl_enqueue_scripts' );
