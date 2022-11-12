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
class Ds_bm_grade_levels_taxonomy_Admin
{



     /**
      * Create two taxonomies, book Grade/Level and writers for the post type "book categorie".
      *
      * @see register_post_type() for registering custom post types.
      */
     function wpdocs_create_ds_bm_grade_levels_taxonomies()
     {
          $labels = array(
               'name'              => _x('Book Grade/Level', 'taxonomy general name', 'textdomain'),
               'singular_name'     => _x('Book grade/level', 'taxonomy singular name', 'textdomain'),
               'search_items'      => __('Search book Grade/Level', 'textdomain'),
               'all_items'         => __('All Book Grade/Level', 'textdomain'),
               'parent_item'       => __('Parent Book grade/level', 'textdomain'),
               'parent_item_colon' => __('Parent Book categorie:', 'textdomain'),
               'edit_item'         => __('Edit Book grade/level', 'textdomain'),
               'update_item'       => __('Update Book grade/level', 'textdomain'),
               'add_new_item'      => __('Add New Book grade/level', 'textdomain'),
               'new_item_name'     => __('New Book categorie Name', 'textdomain'),
               'menu_name'         => __('book grade/level', 'textdomain'),
          );

          $args = array(
               'hierarchical'      => true,
               'labels'            => $labels,
               'show_ui'           => true,
               'show_admin_column' => true,
               'query_var'         => true,
               'rewrite'           => array('slug' => 'ds_bm_grade_levels'),
               'show_in_rest'       => true
          );

          register_taxonomy('ds_bm_grade_levels', array('ds_bm_books'), $args);

          unset($args);
          unset($labels);
     }
}
