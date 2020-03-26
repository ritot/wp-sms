<?php

// Get posts using REST
function get_posts() {

	 // Initialize variable.
	 $allposts = '';

	 // Just get latest
	 $response = wp_remote_get( 'https://sites.williams.edu/rt7/wp-json/wp/v2/posts?per_page=1' );

	if ( is_wp_error( $response ) ) {
		return;
	}

	// Get the body.
	$posts = json_decode( wp_remote_retrieve_body( $response ) );

	// Exit if nothing is returned.
	if ( empty( $posts ) ) {
		return;
	}

	// If there are posts.
	if ( ! empty( $posts ) ) {
    	   // Use print_r($post); to get the details of the post and all available fields
    	   // Format the date.
    	   $fordate = date( 'n/j/Y', strtotime( $post->modified ) );

    	   // Show a linked title and post date.
    	   $allposts .= '<a href="' . esc_url( $post->link ) . '" target=\"_blank\">' . esc_html( $post->title->rendered ) . '</a>  ' . esc_html( $fordate ) . '<br />';
	   echo $allposts;
	}
}

?>