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
            register_rest_route(ds_bm . '/v1', '/get_et_book/(?P<book_name>[a-zA-Z0-9-_]+)', array(
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
                    return true;//self::is_user_verified();
                }
            ));
        });
    }
    function rest_get_book()
    {
        add_action('rest_api_init', function () {
            register_rest_route(ds_bm . '/v1', '/book/download/(?P<book_level>[a-zA-Z0-9-]+)/(?P<book_name>[a-zA-Z0-9-_]+)', array(
                'methods' => 'GET',
                'callback' => function (WP_REST_Request $request) {
                    //
                    $book_name = $request->get_param('book_name');
                    $book_level = $request->get_param('book_level');
                    if (!isset($book_name) || !isset($book_level) || empty($book_name) || empty($book_level)) {
                        $error = new WP_Error();
                        $error->add(406, __("'book_name' & 'book_level' are required fields", 'wp-rest-courses'), array('status' => 400));
                        return $error;
                    }

                    $options = array(
                        'posts_per_page' => 1,
                        'suppress_filters' => false, // important!
                        'post_type'  => 'ds_bm_books',
                        'post_status' => 'publish',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'ds_bm_grade_levels',
                                'field'    => 'slug',
                                'terms'    => $book_level
                            )
                        )
                    );
                    $this->keyword = $book_name;

                    add_filter('posts_where', array($this, 'my_filter_post_where'));
                    $book = get_posts($options);
                    remove_filter('posts_where', array($this, 'my_filter_post_where'));

                    if ($book) {
                        $book = $book[0]->post_content;

                        $DOM = new DOMDocument();
                        $DOM->loadHTML($book);

                        $Header = $DOM->getElementsByTagName('p');
                        $units = [];

                        //#Get header name of the table
                        foreach ($Header as $NodeHeader) {
                            $singleUnit = trim($NodeHeader->textContent);
                            $unitDetail = explode(",", $singleUnit);
                            if (count($unitDetail) == 3) {
                                if ($unitDetail[1] == $book_name) {
                                    $common_pre = "https://drive.google.com/u/0/uc?id=";
                                    $common_suf = "&export=download";
                                    wp_redirect($common_pre . $unitDetail[2] . $common_suf);
                                    exit;
                                }
                            }
                        }
                        // return ($units);
                    }
                    return array(
                        "success" => false,
                        "error" => true,
                        "message" => "book not found"
                    );
                },
                'permission_callback' => function () {
                    return self::is_user_verified();
                }
            ));
        });
    }


    function my_filter_post_where($where)
    {
        global $wpdb;

        $where .= ' AND ' . $wpdb->posts . '.post_content LIKE \'%' . esc_sql($this->keyword) . '%\'';

        return $where;
    }


    public function is_user_verified()
    {
        $auth = apache_request_headers();
        if (isset($auth['username']) && isset($auth['password'])) {

            $username = $auth['username'];
            $password = $auth['password'];

            $check = wp_authenticate_username_password(NULL, $username, $password);

            return !is_wp_error($check);
        } else return false;
    }
}
