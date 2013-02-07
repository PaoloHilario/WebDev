<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>
<?php bloginfo('name'); ?>
<?php wp_title(); ?>
</title>
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/wp-style.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php _e('RSS 2.0 - all posts', ''); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php _e('RSS 2.0 - all comments', ''); ?>" href="<?php bloginfo('comments_rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if(is_singular()) wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>
<script type="text/javascript">  // This script is for the navigation menu
    jQuery(document).ready(function(){ 
		jQuery("#nav a").removeAttr("title"); 
        jQuery("ul.sf-menu").supersubs({ 
            minWidth:    12,   // minimum width of sub-menus in em units 
            maxWidth:    27,   // maximum width of sub-menus in em units 
            extraWidth:  2     // extra width can ensure lines don't sometimes turn over 
                               // due to slight rounding differences and font-family 
        }).superfish();  // call supersubs first, then superfish, so that subs are 
                         // not display:none when measuring. Call before initialising 
                         // containing tabs for same reason. 
		jQuery("#nav2 a").removeAttr("title"); 
		jQuery(".sidebarbox li a").removeAttr("title"); 
    }); 
</script>

<!-- If you want to use the slider on your blog, delete this line and the line immediately following the </script> tag below.

<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('.slideshow').cycle({ // see http://malsup.com/jquery/cycle/ for jQuery cycle options
		fx:  'fade', // options are: blindX, blindY, blindZ, cover, curtainX, curtainY, fade, fadeZoom, growX, growY, scrollUp, scrollDown, scrollLeft, scrollRight, scrollHorz, scrollVert, shuffle, slideX, slideY, toss, turnUp, turnDown, turnLeft, turnRight, uncover, wipe, zoom
		timeout: 5000, // how long slides are shown in ms
    	speed:  1000, // how long transition takes in ms
		easing: 'easeInOutQuad', // options are: easeInOutQuad, easeInOutCubic, easeInOutQuart, easeInOutQuint, easeInOutSine, easeInOutExpo, easeInOutCirc, easeInOutElastic, easeInOutBack, easeInOutBounce
		pause: 1,
		pauseOnPagerHover: 1, // pause slideshow when mouse hovers
		sync: 1, // set to 1 to see two slides at the same time
		autostop: 0,
		pager: '#slidenav' // container element for optional slideshow navigation
		});
	})
</script>

remove this too! -->

</head>
<body>
<div id="header" class="container_12"> <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /></a>
	<div class="headerlinks">
		<p><a href="#">About Us</a> | <a href="#">Our Guarantee</a> | <a href="#">Blog</a> | <a href="#">Privacy</a></p>
		<p><strong>Building Better Software</strong></p>
	</div>
</div>

<div id="nav" class="container_12">
	<?php if ( function_exists('wp_nav_menu') ) {
	wp_nav_menu( array('echo' => '1', 'menu_class' => 'sf-menu', 'fallback_cb' => 'twonine_menu'));
	} else { ?>
	<ul class="sf-menu">
    <li<?php if (is_home()) { echo ' class="current_page_item"'; } ?>><a href="<?php echo get_settings('home'); ?>"><span>Home</span></a></li>
    <?php echo wp_list_pages('echo=0&orderby=name&exclude=&title_li='); ?>
  </ul>
	<?php } ?>
</div>

<!-- If you want to use the slider on your blog, delete this line and the line immediately following the last </div> tag below

<div class="container_wide">
	<div class="slidewrap">
		<div class="slideshow slide960"><img src="<?php bloginfo('template_url'); ?>/images/slide1.jpg" width="960" height="175" /><img src="<?php bloginfo('template_url'); ?>/images/slide2.jpg" width="960" height="175" /><img src="<?php bloginfo('template_url'); ?>/images/slide3.jpg" width="960" height="175" /><img src="<?php bloginfo('template_url'); ?>/images/slide4.jpg" width="960" height="175" /></div>
	</div>
	<div class="slidenavwrap">
		<div id="slidenav"></div>
	</div>
</div>
remove this too! -->