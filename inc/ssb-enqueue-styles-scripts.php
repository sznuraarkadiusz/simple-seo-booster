<?php
    function ssb_enqueue_styles_scripts() {
        wp_enqueue_style('books-style', plugin_dir_url(dirname(__FILE__)) . 'src/css/ssb-style.css', array(), null);
        wp_enqueue_script('books-script', plugin_dir_url(dirname(__FILE__)) . 'src/js/ssb-script.js', array('jquery'), null, true);
    }
    add_action('wp_enqueue_scripts', 'ssb_enqueue_styles_scripts');
?>