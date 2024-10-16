<?php


function timeline_um_get_all_post_ids($postid)
{
    $timeline_um_post_ids = get_post_meta($postid, 'timeline_um_post_ids', true);
    $timeline_um_posttype = get_post_meta($postid, 'timeline_um_posttype', true);


    $return_string = '';
    $return_string .= '<ul style="margin: 0;">';


    $args_product = [
        'post_type' => $timeline_um_posttype,
        'posts_per_page' => -1,
    ];

    $product_query = new WP_Query($args_product);

    if ($product_query->have_posts()): while ($product_query->have_posts()): $product_query->the_post();


        $return_string .= '<li><label ><input class="timeline_um_post_ids" type="checkbox" name="timeline_um_post_ids[' . get_the_ID(
            ) . ']" value ="' . get_the_ID() . '" ';

        if (isset($timeline_um_post_ids[get_the_ID()])) {
            $return_string .= "checked";
        }

        $return_string .= '/>';

        $return_string .= get_the_title() . '</label ></li>';

    endwhile;

    else:
        $return_string .= '<span style="color:#f00;">Sorry No Post Found, Please select at least one posttype above or make sure you have at least one post in your posttype selection.';
    endif;
    wp_reset_query();


    $return_string .= '</ul>';
    echo $return_string;
}


function timeline_um_get_taxonomy_category($postid)
{
    $timeline_um_taxonomy = get_post_meta($postid, 'timeline_um_taxonomy', true);
    if (empty($timeline_um_taxonomy)) {
        $timeline_um_taxonomy = "";
    }
    $timeline_um_taxonomy_category = get_post_meta($postid, 'timeline_um_taxonomy_category', true);


    if (empty($timeline_um_taxonomy_category)) {
        $timeline_um_taxonomy_category = ['none']; // an empty array when no category element selected


    }


    if (!isset($_POST['taxonomy'])) {
        $taxonomy = $timeline_um_taxonomy;
    } else {
        $taxonomy = $_POST['taxonomy'];
    }


    $args = [
        'orderby' => 'name',
        'order' => 'ASC',
        'taxonomy' => $taxonomy,
    ];

    $categories = get_categories($args);


    if (empty($categories)) {
        echo "No Items Found!";
    }


    $return_string = '';
    $return_string .= '<ul style="margin: 0;">';

    foreach ($categories as $category) {
        if (array_search($category->cat_ID, $timeline_um_taxonomy_category)) {
            $return_string .= '<li class=' . $category->cat_ID . '><label ><input class="timeline_um_taxonomy_category" checked type="checkbox" name="timeline_um_taxonomy_category[' . $category->cat_ID . ']" value ="' . $category->cat_ID . '" />' . $category->cat_name . '</label ></li>';
        } else {
            $return_string .= '<li class=' . $category->cat_ID . '><label ><input class="timeline_um_taxonomy_category" type="checkbox" name="timeline_um_taxonomy_category[' . $category->cat_ID . ']" value ="' . $category->cat_ID . '" />' . $category->cat_name . '</label ></li>';
        }
    }

    $return_string .= '</ul>';

    echo $return_string;

    if (isset($_POST['taxonomy'])) {
        die();
    }
}

add_action('wp_ajax_timeline_um_get_taxonomy_category', 'timeline_um_get_taxonomy_category');
add_action('wp_ajax_nopriv_timeline_um_get_taxonomy_category', 'timeline_um_get_taxonomy_category');


function timeline_um_dark_color($input_color)
{
    if (empty($input_color)) {
        return "";
    } else {
        $input = $input_color;

        $col = [
            hexdec(substr($input, 1, 2)),
            hexdec(substr($input, 3, 2)),
            hexdec(substr($input, 5, 2)),
        ];
        $darker = [
            $col[0] / 2,
            $col[1] / 2,
            $col[2] / 2,
        ];

        return "#" . sprintf("%02X%02X%02X", $darker[0], $darker[1], $darker[2]);
    }
}


function timeline_um_get_content($timeline_um_post_content, $post_id, $shortcode_id)
{
    $post_content = get_post($post_id);
    $post_content = $post_content->post_content;


    if ($timeline_um_post_content == "full") {
        $timeline_um_post_content = apply_filters('the_content', $post_content);
    } else {
        if ($timeline_um_post_content == "excerpt") {
            $timeline_um_post_excerpt_count = get_post_meta($shortcode_id, 'timeline_um_post_excerpt_count', true);
            $timeline_um_post_excerpt_text = get_post_meta($shortcode_id, 'timeline_um_post_excerpt_text', true);


            $timeline_um_post_content = wp_trim_words(
                $post_content,
                $timeline_um_post_excerpt_count,
                ' <a class="read-more" href="' . get_permalink(
                    $post_id
                ) . '"> ' . $timeline_um_post_excerpt_text . '</a>'
            );
        }
    }

    return $timeline_um_post_content;
}
