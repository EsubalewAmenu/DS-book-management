<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/EsubalewAmenu
 * @since      1.0.0
 *
 * @package    Ds_bm_metas
 * @subpackage Ds_bm_metas/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ds_bm_metas
 * @subpackage Ds_bm_metas/admin
 * @author     Esubalew A. <esubalew.amenu@singularitynet.io>
 */
class Ds_bm_book_categories_taxonomy_Admin
{



     /**
      * Create two taxonomies, book categories and writers for the post type "book categorie".
      *
      * @see register_post_type() for registering custom post types.
      */
     function wpdocs_create_ds_bm_book_categories_taxonomies()
     {
          $labels = array(
               'name'              => _x('Book categories', 'taxonomy general name', 'textdomain'),
               'singular_name'     => _x('Book category', 'taxonomy singular name', 'textdomain'),
               'search_items'      => __('Search book categories', 'textdomain'),
               'all_items'         => __('All Book categories', 'textdomain'),
               'parent_item'       => __('Parent Book category', 'textdomain'),
               'parent_item_colon' => __('Parent Book categorie:', 'textdomain'),
               'edit_item'         => __('Edit Book category', 'textdomain'),
               'update_item'       => __('Update Book category', 'textdomain'),
               'add_new_item'      => __('Add New Book category', 'textdomain'),
               'new_item_name'     => __('New Book categorie Name', 'textdomain'),
               'menu_name'         => __('book category', 'textdomain'),
          );

          $args = array(
               'hierarchical'      => true,
               'labels'            => $labels,
               'show_ui'           => true,
               'show_admin_column' => true,
               'query_var'         => true,
               'rewrite'           => array('slug' => 'ds_bm_book_categories'),
               'show_in_rest'       => true
          );

          register_taxonomy('ds_bm_book_categories', array('ds_bm_books'), $args);

          unset($args);
          unset($labels);
     }
}
