<?php 
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
	//var_dump($page->ID);
    add_rewrite_rule('^p-'.$user->ID.'/(.+)/(.+)/'.$page->post_name.'/?$','index.php?page_id='.$page->ID.'&propref=$matches[1]','top');
}
 //add_rewrite_rule('^team/(.+)/(.+)/?$','index.php?propref=$matches[1]&propref=$matches[1]','top');
flush_rewrite_rules(true);
}
?>
