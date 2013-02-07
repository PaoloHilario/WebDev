<?php
// widgets
if ( function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Left Sidebar',
		'before_widget' => '<div class="simple">',
		'after_widget' => '</div>', 
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	)); 
	
	register_sidebar(array(
		'name' => 'Right Sidebar',
		'before_widget' => '<div class="simple">',
		'after_widget' => '</div>', 
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	)); 
}

$directory_uri = get_template_directory_uri();

wp_enqueue_script('jquery');
wp_enqueue_script( 'hoverIntent',     $directory_uri.'/js/hoverIntent.js', array('jquery'));
wp_enqueue_script( 'superfish', $directory_uri.'/js/superfish.js', array('jquery'));
wp_enqueue_script( 'supersubs', $directory_uri.'/js/supersubs.js', array('jquery'));

// if you want to use the slider on your blog, delete the slashes from the next two lines

// wp_enqueue_script( 'cycle', $directory_uri.'/js/jquery.cycle.all.min.js', array('jquery'));
// wp_enqueue_script( 'easing', $directory_uri.'/js/jquery.easing.1.3.js', array('jquery'));

if ( function_exists('add_theme_support') ) {
add_theme_support( 'nav-menus' );

function twonine_menu() {
	echo '<ul class="sf-menu">';
    echo '<li';
	if (is_home()) { 
	echo ' class="current_page_item"'; 
	} 
	echo'><a href="';
	echo get_settings('home'); 
	echo '"><span>Home</span></a></li>';
    echo wp_list_pages('echo=0&orderby=name&exclude=&title_li=');
  	echo '</ul>';
}
}

?>