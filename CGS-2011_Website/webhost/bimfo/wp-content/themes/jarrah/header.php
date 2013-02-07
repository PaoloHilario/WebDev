<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"  />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta name="robots" content="follow, all" />

<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/menu.css" type="text/css" media="screen" />
<!--[if IE]><link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/ie.css" type="text/css" media="screen" /><![endif]-->

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.pngFix.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.lavalamp.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/my-menu.js"></script>

<!-- this product is released under General Public License. Please see the attached file for details. You can also find details about the license at http://www.opensource.org/licenses/gpl-license.php -->
<script type="text/javascript">
/* <![CDATA[ */

jQuery(document).ready(function(){ 
    jQuery(document).pngFix(); 
});

/* ]]> */ 
</script>

</head>

<body>

<div id="wrapper" align="center">
	<div id="layouttop"></div>
    
    <!-- Header Starts -->
    <div id="header">
    	<div id="headerleft">
        	<?php
        	 if (get_option('logoURL')) {
              ?>
              	<h1><a href="<?php bloginfo('url'); ?>" class="nobar"><img src="<?php echo get_option('logoURL'); ?>" alt="<?php bloginfo('name'); ?>"></a></h1></h3>
			  <?php
              } else {
              ?>
              	<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1><h3><?php bloginfo('description'); ?></h3>
			  <?php
            }
			?>
    	   
        </div>
        <div id="headerright">
        	<div id="searchboxo">
        		<?php include (TEMPLATEPATH . '/searchform.php'); ?> 
            </div>
        </div>
    </div>
    <!-- Header Ends -->

    
    
    <div id="innerwrapper">
    	
        <!-- Main nav Starts here -->
        <div id="navouter">
            <div id="nav">

                <ul class="lavalamp" id="menu1">
                <li class="page_item <?php if ( is_home() ) { ?>current_page_item<?php } ?>"><a href="<?php bloginfo('url'); ?>">Home</a></li>
                <?php /* Navigation */
                	wp_list_pages('title_li=&depth=2&sort_column=menu_order'); 
                ?>			
                </ul>
            
            </div>
        </div>
        <!-- Main nav Ends -->