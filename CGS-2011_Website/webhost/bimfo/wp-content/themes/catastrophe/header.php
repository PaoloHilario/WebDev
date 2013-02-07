<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

<?php wp_enqueue_script('js/jquery'); ?> 

<script type='text/javascript'> 
jQuery(document).ready(function() { 
jQuery("#nav ul").css({display: "none"}); // Opera Fix 
jQuery("#nav li").hover(function(){ 
        jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).show(268); 
        },function(){ 
        jQuery(this).find('ul:first').css({visibility: "hidden"}); 
        }); 
}); 

</script>

</head>
<body <?php body_class(); ?>>
<div id="body_top"><div id="body_bot">
<div id="page">


<div id="header">
	<div id="headerimg">
		<div id="headerimg_left">
			<div id="headerimg_right">
				<div id="headcontent">
					
                    <div id="logo">
                    <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
                    <span id="tagline"><?php bloginfo('description'); ?></span>
                    </div>
					
                    <div id="search">
						<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
							<input name="s"  type="text" value="" class="search_feild" />
							<input name="" type="submit" value="Search" class="search_btn" />
						</form>
					</div>
				</div>
			</div>			
		</div>
		<div id="navigation">
			<ul id="nav">
				<li <?php if ( is_home() ) { echo 'class="current_page_item"'; } ?>><a href="<?php echo get_settings('home'); ?>"><?php _e("Home"); ?></a></li>
					<?php 
					$excludepages = get_option('fr_exclude_pages');
					wp_list_pages('title_li=&depth=4&sort_column=menu_order&exclude=' . $excludepages); ?>
			</ul>
		</div>
	</div>
</div>
<div id="mainwrapper_mid"><div id="mainwrapper_top"><div id="mainwrapper_bot">