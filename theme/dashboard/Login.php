<?php 
//http://www.paulund.co.uk/how-to-customise-the-wordpress-login-page-2
//http://www.wprecipes.com/customize-wordpress-login-logo-without-a-plugin

//Custom Login Access
function my_custom_login_logo()
{
    echo '<style  type="text/css"> 
        h1 a {  background-image:url(' . get_bloginfo('template_directory') . '/img/login.png)  !important; } 
        @media only screen and (-webkit-min-device-pixel-ratio: 1.25), only screen and (min-device-pixel-ratio: 1.25) {
            h1 a {  background-image:url(' . get_bloginfo('template_directory') . '/img/login2x.png)  !important; }
        }
        </style>';
}
add_action('login_head',  'my_custom_login_logo');
function my_custom_login_url() {
  return home_url();
}
add_filter( 'login_headerurl', 'my_custom_login_url', 10, 4 );

