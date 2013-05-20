<?php 
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
//Rimuovere visualizzazione della versione
remove_action('wp_head', 'wp_generator');

//Menu
register_nav_menu( 'menu', 'Menu principale' );

//Thumbnail
set_post_thumbnail_size( 460, 999);

/*Riassunto*/
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*
    PERSONALIZZAZIONE INTERFACCIA
*/
// Admin footer modification
function remove_footer_admin ()
{
    echo '<span id="footer-thankyou">Developed by <a href="mailto:michele.margiotta@gmail.com" target="_blank">Michele Margiotta</a> Thanks <a href="http://wordpress.org/" target="_blank">Wordpress</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');
//Custom Menu Dashboard
function remove_menus () {  
global $menu;  
        $restricted = array(__('Comments'));  
        end ($menu);  
        while (prev($menu)){  
            $value = explode(' ',$menu[key($menu)][0]);  
            if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}  
        }  
}  
add_action('admin_menu', 'remove_menus');

//Custom skin Royalslider
add_filter('new_royalslider_skins', 'new_royalslider_add_custom_skin', 10, 2);
function new_royalslider_add_custom_skin($skins) {
      $skins['myCustomSkin'] = array(
           'label' => 'Casamanu',
           'path' => '/wp-content/themes/casamanu/slider-skin/rs-casamanu.css',
      );
      return $skins;
}
/*Reset Gallery CSS
add_filter('gallery_style', create_function('$css', 'return preg_replace("#<style type=\'text/css\'>(.*?)</style>#s", "", $css);'));*/
add_filter( 'use_default_gallery_style', '__return_false' );
add_filter('the_content', 'fy_neutra_gallery_break', 11, 2);
function fy_neutra_gallery_break($output) {
    return preg_replace('/<br[^>]*>/', '', $output);
}


