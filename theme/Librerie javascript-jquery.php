<?php 
//http://css-tricks.com/snippets/wordpress/include-jquery-in-wordpress-theme/

//jQuery Header
if (!is_admin()) add_action('wp_enqueue_scripts','my_theme_scripts_function', 11);
function my_theme_scripts_function() {
    //Google jQuery
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
    if(is_home()){
        wp_enqueue_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js');
        wp_enqueue_script('bxsliderinit', get_template_directory_uri() . '/js/jquery.bxslider.init.js');
        wp_enqueue_style('bxslidercss', get_template_directory_uri() . '/css/jquery.bxslider.css', array(), '14052013', 'all');
    }
}
