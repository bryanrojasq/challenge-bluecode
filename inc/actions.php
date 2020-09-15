<?php


add_action( 'wp_ajax_exposed_ajax_action_post', 'exposed_ajax_action_post' );

# executes for users that are not logged in.
add_action( 'wp_ajax_nopriv_exposed_ajax_action_post', 'exposed_ajax_action_post' );


function exposed_ajax_post_action() {

	wp_send_json_success( ["NONCE IS OKAY!", $_POST['img_url'] ] );

	wp_die();
}

add_action( 'wp_ajax_exposed_ajax_action_get', 'exposed_ajax_action_get' );

# executes for users that are not logged in.
add_action( 'wp_ajax_nopriv_exposed_ajax_action_get', 'exposed_ajax_action_get' ); 

function exposed_ajax_action_get() {
	
	wp_send_json_success( ["Success!!!", $_POST['img_url']] );

	// todo:
	// set_profile_picture > helper

	wp_die();
}
