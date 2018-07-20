 <?php

 /*
   Plugin Name: User to link  Plugin
   Plugin URI:  https://github.com/lettertoamit/Wp-adding-user-link/tree/master/
   Description: Plugin for adding user id to link for more work(mailto :-- lettertoamit@gmail.com)
   Version: 1.0
   Author: Amit Sharma 
   Author URI: https://github.com/lettertoamit
   License: MIT
  */
 
add_action('init', 'dcc_rewrite_tags');
function dcc_rewrite_tags() {
    add_rewrite_tag('%propref%', '([^&]+)');
}

add_action('init', 'dcc_rewrite_rules');
function dcc_rewrite_rules() { 
	$user = wp_get_current_user();
	//var_dump(wp_get_current_user());
$pages = get_pages(array('meta_key' => '_wp_page_template', 'meta_value' => 'default'));
foreach ($pages as $page) { 
	$a = $page->ID;
	// //var_dump($page->ID);
	// if($user->ID == '8')
	// {
	// //	var_dump($user);	
	// }
	//   add_rewrite_rule('^p-'.$user->user_login.'/(.+)/(.+)/'.$page->post_name.'/?$','index.php?page_id='.$page->ID.'&propref=$matches[1]','top');
	add_rewrite_rule('^p-'.$user->user_login.'/'.$page->post_name.'/?$','index.php?page_id='.$page->ID.'&propref=$matches[1]','top');
    add_rewrite_rule('^p-'.$user->user_login.'/(.+)/(.+)/'.$page->post_name.'/?$','index.php?page_id='.$page->ID.'&propref=$matches[1]','top');
}
 //add_rewrite_rule('^team/(.+)/(.+)/?$','index.php?propref=$matches[1]&propref=$matches[1]','top');
flush_rewrite_rules(true);
}
 
 ?>
