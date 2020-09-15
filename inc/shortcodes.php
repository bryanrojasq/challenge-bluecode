<?php

function show_category($name, $post) {

    $terms = get_the_terms( $post->ID, $name );
    if ( $terms && ! is_wp_error( $terms ) ) :
        foreach ($terms as $term) {
            return $term->name;
        }
    endif;
}

function load_view_2020($path) {
	// set_query_var( 'my_var', $my_var = 'hi' );
	require_once ADD_PROJECTS_PLUGIN_PATH . "views/{$path}.php";
}

function render_list_songs() {
	load_view_2020('list-songs');
}

add_shortcode( 'show-giphy-list', function() {
	ob_start();
	?>
	<div id="tmpl-component-1"></div>
	<script type="text/html" id="tmpl-my-template">
	   <ul>{{{data.list}}}</ul> 
	</script>
	<?php
    return ob_get_clean();
});

