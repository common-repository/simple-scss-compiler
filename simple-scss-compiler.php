<?php
/*
 * Plugin name: Simple SCSS compiler
 * Description: Adds a simple way to compile your scss files to css automatically.
 * Author: David Varga
 * Author URI: https://kidaweb.com/
 * Version: 1.0
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: simple-scss-compiler
 * Requires at least: 5.0
 * Tested up to: 5.9
 * Stable tag: 1.0
 * Requires PHP: 5.6
*/

if (!defined('ABSPATH')) {
	exit;
}



// Define plugin url
define('sSCSScURL', plugin_dir_url(__FILE__));

// Define plugin path
define('sSCSScPath', plugin_dir_path(__FILE__));

// Define main file name
define('sSCSScMainFileName', basename(__FILE__));



// Register classes
require_once plugin_dir_path(__FILE__)."classes/admin.php";
require_once plugin_dir_path(__FILE__)."classes/compiler.php";



/** 
 * Simple SCSS compiler main class
 */
class sSCSSc {
    
    function __construct() {
		
		// Load admin menu and settings
        new sSCSScAdmin();

        // Load compiler functions
        new sSCSScCompiler();

    }
    
}
new sSCSSc();

?>
