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
class DS_bm_all_book_or_search_api
{
    protected $keyword;

    public function __construct()
    {
    }
    function rest_get_books()
    {
        add_action('rest_api_init', function () {
            register_rest_route(ds_bm . '/v1', '/books/(?P<book_level>[a-zA-Z0-9-]+)/(?P<page_number>\d+)', array(
                'methods' => 'GET',
                'callback' => function (WP_REST_Request $request) {

                    $book_level = $request->get_param('book_level');
                    $page_number = $request->get_param('page_number');

                    if (!isset($book_level) || empty($book_level) || !isset($page_number) || empty($page_number)) {
                        $error = new WP_Error();
                        $error->add(406, __("'page_number' & 'book_level' are required fields", 'wp-rest-courses'), array('status' => 400));
                        return $error;
                    }

                    $posts_per_page = 10;
                    $offset = ($page_number - 1) * $posts_per_page;

                    $options = array(
                        'posts_per_page' => $posts_per_page,
                        'offset' => $offset,
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

                    $books = get_posts($options);

                    if ($books) {
                        $allBooks = [];
                        foreach ($books as $singleBook) {

                            $DOM = new DOMDocument();
                            $DOM->loadHTML($singleBook->post_content);

                            $BooksElement = $DOM->getElementsByTagName('p');
                            $units = [];

                            //#Get BooksElement name of the table
                            foreach ($BooksElement as $NodeBooksElement) {
                                $singleUnit = trim($NodeBooksElement->textContent);
                                $unitDetail = explode(",", $singleUnit);
                                if (count($unitDetail) == 3) {
                                    $unitDetail = array("name" => $unitDetail[0], "file_name" => $unitDetail[1]);
                                    // "url" => $unitDetail[2]
                                    $units[] = $unitDetail;
                                }
                            }

                            $category = get_the_terms($singleBook->ID, 'ds_bm_book_categories');
                            if ($category) $category = $category[0]->name;

                            $en = get_the_terms($singleBook->ID, "post_tag");
                            if ($en) $en = $en[0]->name;

                            $allBooks[] = array("name" => $singleBook->post_title, "category" => $category, "en" => $en, "chapters" => $units);
                        }
                        return $allBooks;
                    }
                    return array(
                        "success" => false,
                        "error" => true,
                        "message" => "end"
                    );
                },
                'permission_callback' => function () {
                    return self::is_user_verified();
                }
            ));
        });
    }
    function rest_search_books()
    {
        add_action('rest_api_init', function () {
            register_rest_route(ds_bm . '/v1', '/search/books/(?P<book_level>[a-zA-Z0-9-]+)/(?P<page_number>\d+)', array(
                'methods' => 'GET',
                'callback' => function (WP_REST_Request $request) {

                    $book_level = $request->get_param('book_level');
                    $page_number = $request->get_param('page_number');
                    $search_query = $request->get_param('search_query');

                    if (!isset($book_level) || empty($book_level) || !isset($page_number) || empty($page_number) || !isset($search_query) || empty($search_query)) {
                        $error = new WP_Error();
                        $error->add(406, __("'page_number', 'book_level' & 'search_query' are required fields", 'wp-rest-courses'), array('status' => 400));
                        return $error;
                    }

                    $posts_per_page = 10;
                    $offset = ($page_number - 1) * $posts_per_page;

                    $options = array(
                        'posts_per_page' => $posts_per_page,
                        'offset' => $offset,
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

                    $this->keyword = $search_query;

                    add_filter('posts_where', array($this, 'filter_post_where_title'));
                    $books = get_posts($options);
                    remove_filter('posts_where', array($this, 'filter_post_where_title'));


                    $options = array(
                        'posts_per_page' => $posts_per_page,
                        'offset' => $offset,
                        'suppress_filters' => false, // important!
                        'post_type'  => 'ds_bm_books',
                        'post_status' => 'publish',
                        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'ds_bm_grade_levels',
                                'field'    => 'slug',
                                'terms'    => $book_level
                            ),
                            array(
                                'taxonomy' => 'ds_bm_book_categories',
                                'field'    => 'name',
                                'terms'    => $search_query
                            )
                        )
                    );
                    $books2 = get_posts($options);

                    $books = array_merge($books, $books2);

                    if ($books) {
                        $allBooks = [];
                        foreach ($books as $singleBook) {

                            $DOM = new DOMDocument();
                            $DOM->loadHTML($singleBook->post_content);

                            $BooksElement = $DOM->getElementsByTagName('p');
                            $units = [];

                            //#Get BooksElement name of the table
                            foreach ($BooksElement as $NodeBooksElement) {
                                $singleUnit = trim($NodeBooksElement->textContent);
                                $unitDetail = explode(",", $singleUnit);
                                if (count($unitDetail) == 3) {
                                    $unitDetail = array("name" => $unitDetail[0], "file_name" => $unitDetail[1]);
                                    // "url" => $unitDetail[2]
                                    $units[] = $unitDetail;
                                }
                            }

                            $category = get_the_terms($singleBook->ID, 'ds_bm_book_categories');
                            if ($category) $category = $category[0]->name;
                        
                            $en = get_tags(array('type' => 'ds_bm_books'));
                            if ($en) $en = $en[0]->name;

                            $allBooks[] = array("name" => $singleBook->post_title, "category" => $category, "en" => $en, "chapters" => $units);
                        }
                        return $allBooks;
                    }
                    return array(
                        "success" => false,
                        "error" => true,
                        "message" => "end"
                    );
                },
                'permission_callback' => function () {
                    return self::is_user_verified();
                }
            ));
        });
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


    function filter_post_where_title($where)
    {
        global $wpdb;

        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql($this->keyword) . '%\'';

        return $where;
    }
}
