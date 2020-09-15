<?php
/*
Plugin Name: Giphy Random Loader
Plugin URI: https://github.com/bryanrojasq/code-challenge-bluecode
Description: Show a GIF collection from Giphy API
Version: 0.0.1
Author: Bryan Rojas
Author URI: https://bryanrojasq.wordpress.com
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

require_once dirname( __FILE__ ) . '/constants.php';

require_once dirname( __FILE__ ) . '/inc/head-scripts.php';

// require_once dirname( __FILE__ ) . '/inc/songs-post-type.php';

require_once dirname( __FILE__ ) . '/inc/admin-page.php';

require_once dirname( __FILE__ ) . '/inc/shortcodes.php';

require_once dirname( __FILE__ ) . '/inc/actions.php';


// [show-giphy-list]

