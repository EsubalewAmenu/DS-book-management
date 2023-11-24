<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/EsubalewAmenu
 * @since      1.0.0
 *
 * @package    Ds_bm
 * @subpackage Ds_bm/admin
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ds_bm
 * @subpackage Ds_bm/admin
 * @author     Esubalew Amenu <esubalew.a2009@gmail.com>
 */
class DS_bm_book_api_hooks
{

    public function __construct()
    {
    }

    function ds_updates_before_dispatch($response, $request)
    {

        $last_updated = $request->get_param('last_updated');
        $app = $request->get_param('app');

        if (empty($last_updated) || empty($app)) {
            return $response;
            // $error = new WP_Error();
            // $error->add("wrong_input", __("'last_updated' and 'app' are required fileds!", 'wp-rest-courses'), array('status' => 400));
            // return $error;
        }

        $options = array(
            'numberposts' => -1,
            'post_type'  => 'ds_bm_books',
            'post_status' => 'publish',
            'order' => 'ASC',
            'date_query' => array(
                array(
                    'column' => 'post_modified',
                    'after'  => $last_updated
                ),
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'ds_bm_grade_levels',
                    'field'    => 'slug',
                    'terms'    => $app
                )
            )
        );
        $books = get_posts($options);

        require_once plugin_dir_path(dirname(__FILE__)) . '../common.php';
        $DS_bm_book_common = new DS_bm_book_common();

        $response['books'] = $DS_bm_book_common->parse_books($books);

        return $response;
    }
}
