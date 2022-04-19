<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/EsubalewAmenu/
 * @since             1.0.0
 * @package           Ds_Book_Manager
 *
 * @wordpress-plugin
 * Plugin Name:       DS Book Manager
 * Plugin URI:        https://datascienceplc.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Esubalew Amenu
 * Author URI:        https://github.com/EsubalewAmenu/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ds-book-manager
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if (!defined("ds_bm"))
    define("ds_bm", "ds_bm");
if (!defined("ds_bm_PLAGIN_DIR"))
    define("ds_bm_PLAGIN_DIR", plugin_dir_path(__FILE__));
if (!defined("ds_bm_PLAGIN_URL"))
    define("ds_bm_PLAGIN_URL", plugin_dir_url(__FILE__));


/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'DS_BOOK_MANAGER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ds-book-manager-activator.php
 */
function activate_ds_book_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ds-book-manager-activator.php';
	Ds_Book_Manager_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ds-book-manager-deactivator.php
 */
function deactivate_ds_book_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ds-book-manager-deactivator.php';
	Ds_Book_Manager_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ds_book_manager' );
register_deactivation_hook( __FILE__, 'deactivate_ds_book_manager' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ds-book-manager.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ds_book_manager() {

	$plugin = new Ds_Book_Manager();
	$plugin->run();

}
run_ds_book_manager();
