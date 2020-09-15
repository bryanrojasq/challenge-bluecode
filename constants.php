<?php

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function define_constant( $name, $value = true ) {
    if( !defined($name) ) {
        define( $name, $value );
    }
}

define_constant( 'ADD_PROJECTS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

define_constant( 'ADD_PROJECTS_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

define_constant( 'ADD_PROJECTS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
