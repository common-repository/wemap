<?php
/*
Plugin Name: wemap
Plugin URI: https://getwemap.com
Description: Plugin wemap
Version: 0.9.0
Author: Wemap
Author URI: https://getwemap.com
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


define( 'WEMAP_API_URL', 'https://api.getwemap.com' );
define( 'WEMAP_LIVEMAP_URL', 'https://livemap.getwemap.com/iframe.php?' );

function wemap_autoloader($name) {
    if (getenv('WEMAP_TEST_ENVIRONMENT') && $name == 'Connect_To_Serv') {
        require plugin_dir_path(__FILE__) . '../tests/mock/Connect_To_Serv.php';
        return;
    }

    $file = plugin_dir_path(__FILE__) . 'class/' . $name . '.php';
    if (is_file($file)){
        require $file;
    }
}


spl_autoload_register('wemap_autoloader');

$plugin_wemap = new Admin_Wemap('0.9.0', 'Wemap');


/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_wemap_init() {
    register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'create_block_wemap_init' );

?>
