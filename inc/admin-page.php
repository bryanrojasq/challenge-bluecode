<?php

if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly

add_action('admin_menu', function () {

    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    add_menu_page(
        'General',
        'Giphy Random Loader',
        'manage_options',
        'custom_main_settings',
        # The function to be called to output the content for this page
        function () {

            if (isset($_GET['settings-updated'])) {
                add_settings_error('status_msg', 'status_msg', 'Show this message.', 'updated');
            }

            load_view('submenu-option', ['a', 'b', 'c']);
        },
        'dashicons-images-alt'
    );

    function load_view($view, $data) {
        // set_query_var( 'my_var', $my_var = 'hi' );
        require_once ADD_PROJECTS_PLUGIN_PATH . "views/admin/{$view}.php";
    }

});

# https://codex.wordpress.org/Settings_API

add_action('admin_init', function () {

    register_setting('custom_main_settings', 'main_ctrl_options');

    add_settings_section(
        'setting_section_one',
        'Giphy Random Loader',
        function () {
            print "Add your keywords to see animated GIFS...";
        },
        'custom_main_settings'
    );

    $options = get_option('main_ctrl_options'); # dev tip 1

    add_settings_field(
        'ctrl_options_1',
        "Words",
        function ($args) {

            printf("<input type='text' value='%s' name='%s'>", isset($args['options'][$args['name']]) ? $args['options'][$args['name']] : '', "main_ctrl_options[{$args['name']}]");
            // var_dump($options); # debug
            // var_dump($args); # debug
        },
        'custom_main_settings',
        'setting_section_one',
        [
            'name' => 'ctrl_options_1',
            'options' => $options, # dev tip 1: here we're passing $options as $args so we use same variable names
        ]
    );

});
