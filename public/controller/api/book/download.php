<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/EsubalewAmenu
 * @since      1.0.0
 *
 * @package    Mp_CF
 * @subpackage Mp_CF/admin
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Mp_CF
 * @subpackage Mp_CF/admin
 * @author     Esubalew Amenu <esubalew.a2009@gmail.com>
 */
class DS_bm_book_download_api
{

    public function __construct()
    {
    }
    function rest_get_et_book()
    {
        add_action('rest_api_init', function () {
            register_rest_route(ds_bm . '/v1', '/get_et_book/(?P<book_name>[a-zA-Z0-9-]+)', array(
                'methods' => 'GET',
                'callback' => function (WP_REST_Request $request) {
                    //
                    $book_name = $request->get_param('book_name');

                    global $table_prefix, $wpdb;
                    $wp_mp_table = $table_prefix . "ds_bm_chapters";
                    $book = $wpdb->get_row("SELECT id, en FROM $wp_mp_table WHERE `filename`='" . $book_name . "'", OBJECT);

                    if ($book) {
                        // print_r($book);

                        $common_pre = "https://drive.google.com/u/0/uc?id=";
                        $common_suf = "&export=download";
                        wp_redirect($common_pre . $book->en . $common_suf);
                        exit;
                    } else
                        return array(
                            "success" => false,
                            "error" => true,
                            "message" => "book not found"
                        );
                },
                'permission_callback' => function () {
                    return true; //current_user_can('edit_others_books');
                }
            ));
        });
    }
}
