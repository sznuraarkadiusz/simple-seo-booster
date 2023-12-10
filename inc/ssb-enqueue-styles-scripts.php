<?php
    function ssb_enqueue_styles_scripts() {
        wp_enqueue_style('ssb_style', plugin_dir_url(dirname(__FILE__)) . 'src/css/ssb-style.css', array(), null);
        wp_enqueue_script('ssb-script', plugin_dir_url(dirname(__FILE__)) . 'src/js/ssb-script.js', array('jquery'), null, true);
    }
    add_action('wp_enqueue_scripts', 'ssb_enqueue_styles_scripts');

    if (is_admin()){
        function ssb_enqueue_styles_scripts_admin_panel(){
            wp_enqueue_style('ssb-admin-style', plugin_dir_url(dirname(__FILE__)) . 'src/css/ssb-admin-style.css', array(), null);
        }
        add_action('admin_enqueue_scripts', 'ssb_enqueue_styles_scripts_admin_panel');
    }
?>