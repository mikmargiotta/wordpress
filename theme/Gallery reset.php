<?php 
//http://artmov.com/crumbs/2012/remove-br-tag-default-wordpress-gallery-output
//http://css-tricks.com/snippets/wordpress/remove-gallery-inline-styling/
//http://theme.fm/2011/06/how-to-style-your-wordpress-gallery-43/

/*Reset Gallery CSS
add_filter('gallery_style', create_function('$css', 'return preg_replace("#<style type=\'text/css\'>(.*?)</style>#s", "", $css);'));*/
add_filter( 'use_default_gallery_style', '__return_false' );
add_filter('the_content', 'fy_neutra_gallery_break', 11, 2);
function fy_neutra_gallery_break($output) {
    return preg_replace('/<br[^>]*>/', '', $output);
}


