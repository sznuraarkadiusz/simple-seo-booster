<?php
/*
 Plugin Name: Simple SEO Booster
 Version: 1.0
 Author: DEVAS Arkadiusz Sznura
 Description: Low-load plugin that allows you to add custom h1, bottom description (WooCommerce products category), internal linking & FAQ section.
 Author URI: https://github.com/sznuraarkadiusz
*/

global $post_types;
$post_types = array('post', 'page', 'product', 'product_cat');

function ssb_register_metabox() {
    global $post_types;
    add_meta_box('simple_seo_booster', 'Simple SEO Booster', 'ssb_admin_render_metabox', $post_types , 'normal', 'default');
}

function ssb_admin_render_metabox($post) {
    $ssb_custom_heading = get_post_meta($post->ID, '_custom_heading', true);
    wp_nonce_field('ssb_custom_meta_nonce', 'ssb_custom_meta_nonce');
    ?>
    <label for="ssb_custom_heading">Custom H1:</label>
    <textarea id="ssb_custom_heading" name="ssb_custom_heading"><?php echo esc_textarea($ssb_custom_heading); ?></textarea>
    <?php
}

function ssb_save_custom_meta_box($post_id) {
    global $post_types;
    if (isset($_POST['ssb_custom_meta_nonce'], $_POST['ssb_custom_heading']) && wp_verify_nonce($_POST['ssb_custom_meta_nonce'], 'ssb_custom_meta_nonce') && in_array(get_post_type($post_id), $post_types)) {
        update_post_meta($post_id, '_custom_heading', sanitize_textarea_field($_POST['ssb_custom_heading']));
    }
}

require_once plugin_dir_path(__FILE__) . 'functions/ssb-heading-optimization.php';
require_once plugin_dir_path(__FILE__) . 'inc/ssb-enqueue-styles-scripts.php';

?>