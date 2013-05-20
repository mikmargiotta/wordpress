<?php 
//http://css-tricks.com/snippets/wordpress/remove-wp-generator-meta-tag/

//Rimuovere visualizzazione della versione
remove_action('wp_head', 'wp_generator');



