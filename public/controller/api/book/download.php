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


    // public function ds_bm_book_download_code()
    // {

    //     if (!empty($_GET['name']))
    //         echo "print hi " . $_GET['user'];
    // }

    function rest_get_book()
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
    function rest_get_greads_for_question()
    {
        add_action('rest_api_init', function () {
            register_rest_route(ds_bm . '/v1', '/get_et_greads_for_question/(?P<greads_for_question>[a-zA-Z0-9-]+)', array(
                'methods' => 'GET',
                'callback' => function (WP_REST_Request $request) {

                    $que_services = DB::table('grade_questions')->select('id', 'grade', 'subject', 'chapter_name', 'id as chap')->where('enabled', 1)->get();

                    foreach ($que_services as $que_service) {
                        $que_service->chap = DB::table('questions')->select('id', 'chapter')->where('grade_question_id', $que_service->id)->where('enabled', 1)->get()->unique('chapter');
                    }

                    return array(
                        'success' => true,
                        'error' => false,
                        'que_service' => $que_services,
                    );
                },
                'permission_callback' => function () {
                    return true; //current_user_can('edit_others_books');
                }
            ));
        });
    }
    function rest_get_questions()
    {
        add_action('rest_api_init', function () {
            register_rest_route(ds_bm . '/v1', '/get_et_questions/(?P<chapter>[a-zA-Z0-9-]+)/(?P<no_of_q>[a-zA-Z0-9-]+)/(?P<grade>[a-zA-Z0-9-]+)', array(
                'methods' => 'GET',
                'callback' => function (WP_REST_Request $request) {
                    //
                    $chapter = $request->get_param('chapter');
                    $no_of_q = $request->get_param('no_of_q');
                    $grade = $request->get_param('grade');

                    //             $ques = DB::table('questions')->select('id', 'question', 'a', 'b', 'c', 'd', 'e', 'f', 'ans', 'descr as desc')->where('grade_question_id', $request['grade'])->where('chapter', $request['chapter'])->where('enabled', 1)->limit($request['no_of_q'])->get();

                    //             return response()->json([
                    //                 'success' => true,
                    //                 'error' => false,
                    //                 'ques' => $ques,
                    //             ]);
                    //         }
                    //     global $table_prefix, $wpdb;
                    //     $wp_mp_table = $table_prefix . "ds_bm_chapters";
                    //     $questions = $wpdb->get_row("SELECT id, en FROM $wp_mp_table WHERE `filename`='" . $questions_name . "'", OBJECT);

                    //     if ($questions) {
                    //         // print_r($questions);

                    //         $common_pre = "https://drive.google.com/u/0/uc?id=";
                    //         $common_suf = "&export=download";
                    //         wp_redirect($common_pre . $book->en . $common_suf);
                    //         exit;
                    //     } else
                    //         return array(
                    //             "success" => false,
                    //             "error" => true,
                    //             "message" => "book not found"
                    //         );
                },
                'permission_callback' => function () {
                    return true; //current_user_can('edit_others_books');
                }
            ));
        });
    }

    // public function get_for_books(FRequest $request)
    // {

    //     if (isset($request['what'])) {
    //         if ($request['what'] == 'short') {

    //             $common_pre = "https://drive.google.com/u/0/uc?id=";
    //             $common_suf = "&export=download";

    //             if (isset($request['cnt'])) { // if country setted

    //                 if (($request['cnt'] == "ind" || $request['cnt'] == "pak" || $request['cnt'] == "eth") && isset($request['name'])) {

    //                     $data = DB::table('chapters')
    //                         ->select('id', 'file_url')
    //                         ->where('id', $request['name'])
    //                         ->get()[0];

    //                     return redirect($common_pre . $data->file_url . $common_suf);
    //                 }
    //             } else { // if country not setted
    //                 if (isset($request['name']))
    //                     return response()->download(storage_path("app/uploads/1/chapters/" . $request['name']));
    //             }
    //         } else if ($request['what'] == 'txt') {

    //             $common_pre = "https://drive.google.com/u/0/uc?id=";
    //             $common_suf = "&export=download";

    //             if (isset($request['cnt'])) { // if country setted

    //                 if (($request['cnt'] == "ind" || $request['cnt'] == "pak" || $request['cnt'] == "eth") && isset($request['name'])) {

    //                     $data = DB::table('chapters')
    //                         ->select('id', 'en')
    //                         ->where('filename', $request['name'])
    //                         ->get()[0];

    //                     return redirect($common_pre . $data->en . $common_suf);
    //                 }
    //             } else { // if country not setted
    //                 if (isset($request['name']))
    //                     return response()->download(storage_path("app/uploads/1/chapters/" . $request['name']));
    //             }
    //         } else if ($request['what'] == 'init') {

    //             // $que_services = DB::table('grade_questions')->select('id', 'grade', 'subject', 'chapter_name')->where('enabled',1)->get();

    //             $que_services = DB::table('grade_questions')->select('id', 'grade', 'subject', 'chapter_name', 'id as chap')->where('enabled', 1)->get();



    //             foreach ($que_services as $que_service) {
    //                 $que_service->chap = DB::table('questions')->select('id', 'chapter')->where('grade_question_id', $que_service->id)->where('enabled', 1)->get()->unique('chapter');
    //             }



    //             //         $short_services = DB::table('short_subjects')->select('id', 'grade', 'subject', 'en')->where('enabled',1)->get();

    //             // foreach ($short_services as $short_service) {
    //             //         $short_service->chap = DB::table('short_chapters')->select('id', 'chaptername', 'file_url')->where('short_subjects_id',$short_service->id )->where('enabled',1)->get();
    //             // }


    //             return response()->json([
    //                 'success' => true,
    //                 'error' => false,
    //                 'que_service' => $que_services,
    //                 // 'short_services' => $short_services,
    //             ]);
    //         } else if ($request['what'] == 'q' && isset($request['chapter']) && isset($request['no_of_q']) && isset($request['grade'])) {

    //             $ques = DB::table('questions')->select('id', 'question', 'a', 'b', 'c', 'd', 'e', 'f', 'ans', 'descr as desc')->where('grade_question_id', $request['grade'])->where('chapter', $request['chapter'])->where('enabled', 1)->limit($request['no_of_q'])->get();

    //             return response()->json([
    //                 'success' => true,
    //                 'error' => false,
    //                 'ques' => $ques,
    //             ]);
    //         }
    //     } else {

    //         return response()->json([
    //             'success' => false,
    //             'error' => true,
    //             'message' => 'Error #530',
    //         ]);
    //     }
    // }
}
