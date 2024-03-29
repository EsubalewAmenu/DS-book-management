<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/EsubalewAmenu/
 * @since      1.0.0
 *
 * @package    Ds_Book_Manager
 * @subpackage Ds_Book_Manager/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Ds_Book_Manager
 * @subpackage Ds_Book_Manager/includes
 * @author     Esubalew Amenu <esubalew.a2009@gmail.com>
 */
class Ds_Book_Manager
{

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Ds_Book_Manager_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct()
	{
		if (defined('DS_BOOK_MANAGER_VERSION')) {
			$this->version = DS_BOOK_MANAGER_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'ds-book-manager';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Ds_Book_Manager_Loader. Orchestrates the hooks of the plugin.
	 * - Ds_Book_Manager_i18n. Defines internationalization functionality.
	 * - Ds_Book_Manager_Admin. Defines all hooks for the admin area.
	 * - Ds_Book_Manager_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies()
	{

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-ds-book-manager-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-ds-book-manager-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-ds-book-manager-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-ds-book-manager-public.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/controller/api/book/download.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/controller/api/book/all_books_or_search.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/controller/api/book/hooks.php';

		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/controller/bm_post_type_books.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/controller/bm_books_taxonomy.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/controller/bm_grade_levels_taxonomy.php';

		$this->loader = new Ds_Book_Manager_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Ds_Book_Manager_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale()
	{

		$plugin_i18n = new Ds_Book_Manager_i18n();

		$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks()
	{

		$plugin_admin = new Ds_Book_Manager_Admin($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
	
		$Ds_bm_book_types_Admin = new Ds_bm_book_types_Admin();
		$this->loader->add_action('init', $Ds_bm_book_types_Admin, 'Ds_bm_book_types_registration_init', 1, 1);
		
		$Ds_bm_book_categories_taxonomy_Admin = new Ds_bm_book_categories_taxonomy_Admin();
		$this->loader->add_action('init', $Ds_bm_book_categories_taxonomy_Admin, 'wpdocs_create_ds_bm_book_categories_taxonomies', 1, 1);

		$Ds_bm_grade_levels_taxonomy_Admin = new Ds_bm_grade_levels_taxonomy_Admin();
		$this->loader->add_action('init', $Ds_bm_grade_levels_taxonomy_Admin, 'wpdocs_create_ds_bm_grade_levels_taxonomies', 1, 1);
		
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks()
	{

		$plugin_public = new Ds_Book_Manager_Public($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');

		$DS_bm_book_download_api = new DS_bm_book_download_api();
		$this->loader->add_action('rest_api_init', $DS_bm_book_download_api, 'rest_get_et_book', 1, 1);
		$this->loader->add_action('rest_api_init', $DS_bm_book_download_api, 'rest_get_book', 1, 1);
		
		$DS_bm_all_book_or_search_api = new DS_bm_all_book_or_search_api();
		$this->loader->add_action('rest_api_init', $DS_bm_all_book_or_search_api, 'rest_get_books', 1, 1);
		$this->loader->add_action('rest_api_init', $DS_bm_all_book_or_search_api, 'rest_search_books', 1, 1);
	
		$DS_bm_book_api_hooks = new DS_bm_book_api_hooks();
		$this->loader->add_filter('ds_updates_before_dispatch', $DS_bm_book_api_hooks, 'ds_updates_before_dispatch', 2, 10);

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run()
	{
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Ds_Book_Manager_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader()
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}
}
