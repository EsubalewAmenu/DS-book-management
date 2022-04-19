<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/EsubalewAmenu/
 * @since      1.0.0
 *
 * @package    Ds_Book_Manager
 * @subpackage Ds_Book_Manager/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ds_Book_Manager
 * @subpackage Ds_Book_Manager/includes
 * @author     Esubalew Amenu <esubalew.a2009@gmail.com>
 */
class Ds_Book_Manager_Activator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate()
	{
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		self::ds_bm_chapters_table();
	}

	public static function ds_bm_chapters_table()
	{
		global $table_prefix, $wpdb;

		$wp_ds_bm_table = $table_prefix . "ds_bm_chapters";

		if ($wpdb->get_var("show tables like '$wp_ds_bm_table'") != $wp_ds_bm_table) {
			$sql = "CREATE TABLE `" . $wp_ds_bm_table . "` ( ";
			$sql .= "  `id` int(10) unsigned NOT NULL AUTO_INCREMENT, ";

			$sql .= "  `book_id` varchar(50) NOT NULL, ";
			$sql .= "  `chaptername` varchar(50) NOT NULL, ";
			$sql .= "  `filename` varchar(50) NOT NULL, ";
			$sql .= "  `en` varchar(50) NOT NULL, ";
			$sql .= "  `notes` varchar(50) NULL, ";
			$sql .= "  `enabled` varchar(50) NOT NULL DEFAULT 1, ";

			$sql .= "  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP, ";
			$sql .= "  `updated_at` TIMESTAMP NULL DEFAULT NULL, ";
			$sql .= "  `deleted_at` TIMESTAMP NULL DEFAULT NULL, ";

			$sql .= "  `user_id` int(11) NOT NULL DEFAULT 0, ";

			$sql .= "  PRIMARY KEY (`id`) ";
			$sql .= ") ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; ";

			dbDelta($sql);
		}
	}
}
