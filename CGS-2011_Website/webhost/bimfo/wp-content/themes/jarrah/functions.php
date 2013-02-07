<?php
// load jQuery
/*
function my_jquery_init() {
	if ( $wp_version != '2.6') {
		wp_deregister_script('jquery');
	
		wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-1.4.2.min.js', null, '1.4.2', false);
	} else {
		wp_enqueue_script('jquery');
	}
}    
add_action('init', 'my_jquery_init');
*/
function my_jquery_init() {
		wp_enqueue_script('jquery');
}    
add_action('init', 'my_jquery_init');



if ( function_exists('register_sidebar') )
    register_sidebar(array(
	'name'=>'sidebar_right',
        'before_widget' => '<li id="%1$s" class="sidebaritem %2$s"><div class="sidebarbox">',
        'after_widget' => '</div></li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
	'name'=>'footer_left',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
	'name'=>'footer_middle',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
	'name'=>'footer_right',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));




add_action('admin_menu', 'add_copyright_notice');

function add_copyright_notice() {
  add_theme_page('welcome', 'Theme Options', '8', 'functions', 'editoptions');
}

function editoptions() {
  ?>
  <div class='wrap'>
  <h2>Theme Options</h2>
  <form method="post" action="options.php">
  <?php wp_nonce_field('update-options') ?>
  
  <p><strong>Site Welcome Message Title:</strong><br />
  <input type="text" name="intro_title" value="<?php echo get_option('intro_title'); ?>" size="60" /><br /><br />
  
  <strong>Site Welcome Message:</strong><br />
  <textarea name="intro_message" cols="52" /><?php echo get_option('intro_message'); ?></textarea><br /><br />
  
  <strong>Activate Welcome Message:</strong><br />
  <?php if(get_option('activate_intro')){ $checked2 = "checked=\"checked\""; }else{ $checked2 = ""; } ?>
  <input name="activate_intro" type="checkbox" value="1" <?php echo $checked2; ?> />
  </p>
   

  <p><strong>Copy Right Notice:</strong></p>
  <p><input type="text" name="copyright" value="<?php echo get_option('copyright'); ?>" size="60" /></p>
  
  <p><strong>Logo Image URL (Optional),</strong>  Recommended maximum height 60px.</p>
  <p><input type="text" name="logoURL" value="<?php echo get_option('logoURL'); ?>" size="60" /></p>  

  <p><strong>Disable Bottom Bar:</strong></p>
  
  <?php if(get_option('bottombar')){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
  <p><input name="bottombar" type="checkbox" value="1" <?php echo $checked; ?> /></p>
  
  

  <p><input type="submit" name="Submit" value="Update Options" /></p>
  <input type="hidden" name="action" value="update" />
  <input type="hidden" name="page_options" value="copyright,bottombar,intro_title,intro_message,activate_intro,logoURL" />
  </form>
  </div>
  <?php
  }


function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">

			<div class="commentbody">
            
                <a class="gravatar">
                	<?php echo get_avatar($comment,$size='60'); ?>
                </a>            
            
			<cite><?php comment_author_link() ?></cite> 
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is awaiting moderation.</em>
			<?php endif; ?>
			<br />
			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> on <?php comment_time() ?></a> <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?></small>

			<?php comment_text() ?>
			</div><div class="cleared"></div>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
        }



function mytheme_ping($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
			<div class="commentbody">
			<cite><?php comment_author_link() ?></cite> 
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is awaiting moderation.</em>
			<?php endif; ?>
			<br />
			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> on <?php comment_time() ?></a> <?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?></small>

			<?php comment_text() ?>
			</div>
     </div>
<?php
        }

function new_excerpt_more($post) {
	return '<a href="'. get_permalink($post->ID) . '" class="searchmore">' . 'Read the Rest...' . '</a><div class="clr"></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');


?>