<?php
/**
 * Plugin Name: Klarity publication block
 * Plugin URI: https://github.com/Klarityorg/wp-plugin-publication-block
 * Description: Klarity publication block
 * Author: Klarity
 * Author URI: https://github.com/Klarityorg
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package Klarity
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
