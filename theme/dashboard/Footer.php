<?php 
//http://www.teachmehowtocode.com/change-the-footer-in-your-wordpress-dashboard-1081/
// http://www.wpbeginner.com/wp-themes/change-the-footer-in-your-wordpress-admin-panel/

function remove_footer_admin ()
{
    echo '<span id="footer-thankyou">Developed by <a href="mailto:michele.margiotta@gmail.com" target="_blank">Michele Margiotta</a> Thanks <a href="http://wordpress.org/" target="_blank">Wordpress</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');


