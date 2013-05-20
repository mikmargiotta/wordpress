<?php 
//http://www.wpbeginner.com/wp-tutorials/how-to-remove-menu-item-in-wordpress-admin-panel/
//http://www.wprecipes.com/how-to-remove-menus-in-wordpress-dashboard

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



