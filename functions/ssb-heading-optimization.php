<?php

function ssb_custom_heading_filter($title, $id = null) {
    global $post_types;
    if (!is_admin() && is_singular($post_types) && ($ssb_custom_heading = get_post_meta(get_the_ID(), '_custom_heading', true))) {
        $title = esc_html($ssb_custom_heading);
    }
    return $title;
}

function ssb_output_custom_heading() {
    if ($ssb_custom_heading = get_post_meta(get_the_ID(), '_custom_heading', true)) {
        echo '<h1>' . esc_html($ssb_custom_heading) . '</h1>';
    }
}

remove_filter('the_title', 'wp_title');
add_action('some_action_hook', 'ssb_output_custom_heading', 9);
add_filter('the_title', 'ssb_custom_heading_filter', 10, 2);
add_action('add_meta_boxes', 'ssb_register_metabox');
add_action('save_post', 'ssb_save_custom_meta_box');