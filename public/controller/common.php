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
class DS_bm_book_common
{

    public function __construct()
    {
    }

    function parse_books($books)
    {
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
        return [];
    }
}
