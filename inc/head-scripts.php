<?php

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action('wp_enqueue_scripts', function() {

    wp_enqueue_style('add-projects-css', esc_url(trailingslashit(ADD_PROJECTS_PLUGIN_URL) . 'assets/dist/css/styles.min.css'), ['']);

    wp_enqueue_script('add-projects-js', esc_url(trailingslashit(ADD_PROJECTS_PLUGIN_URL) . 'assets/dist/js/app.min.js'), ['wp-util'], '1.0', true);

    wp_localize_script('add-projects-js', 'wp_headless_cms',
        [
            'admin_ajax' => admin_url('admin-ajax.php'),
            'wp_nonce_add_projects' => wp_create_nonce("wp_nonce_add_projects"),
            'rest_api' => site_url('wp-json/wp/v2/'),
            'theme_url' => get_template_directory_uri(),
        ]
    );

    wp_enqueue_script( 'wp-util' );

}, 1);

// remove wp version number from scripts and styles
function remove_css_js_version( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}


function security_removers() {
    add_filter( 'style_loader_src', 'remove_css_js_version', 9999 );
    add_filter( 'script_loader_src', 'remove_css_js_version', 9999 );
    add_filter('the_generator', function(){
        return '';
    });
}

security_removers();


add_action('wp_enqueue_scripts', function() {
    
    $options = get_option('main_ctrl_options');

    if( isset($options['ctrl_options_1']) ) {

        printf("<script>var giphyPluginSetting = %s</script>", json_encode(['giphyQuery' => $options['ctrl_options_1']]));
    }

}, 1);

