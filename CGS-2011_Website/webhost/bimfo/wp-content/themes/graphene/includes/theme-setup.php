<?php
/**
 * Run the database updater if necessary
*/
if ( ! function_exists( 'graphene_db_init' ) ) :
	function graphene_db_init(){
		global $graphene_settings, $graphene_defaults;
		
		/* Run DB updater if $graphene_settings does not exist in db */
		if ( get_option( 'graphene_ga_code' ) === '' ){
			
			// Updates the database for much older version, when Settings API was not yet implemented
			include( get_template_directory() . '/admin/db-updater.php' );
			graphene_update_db();
			$graphene_settings = array_merge( $graphene_defaults, get_option( 'graphene_settings', array() ) );
		
		} 
		
		/* Delete DB Version from the database. This value is now included in the $graphene_defaults array */
		delete_option( 'graphene_dbversion' );
	}
endif;
add_action( 'init', 'graphene_db_init' );


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
function graphene_get_content_width(){
	global $graphene_settings, $graphene_defaults;
	$gutter = $graphene_settings['gutter_width'];
	
	$column_mode = graphene_column_mode();
	$diff = 0;
	
	if ( strpos( $column_mode, 'two-col' ) === 0 )
		$diff = $graphene_settings['column_width']['two-col']['content'] - graphene_grid_width( '', 11 );
	if ( strpos( $column_mode, 'three-col' ) === 0 )
		$diff = $graphene_settings['column_width']['three-col']['content'] - graphene_grid_width( '', 8 );

	return graphene_grid_width( -($gutter * 2) + $diff, 16, 11, 8 );
}
global $content_width;
$content_width = graphene_get_content_width();


if ( ! function_exists( 'graphene_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function graphene_setup() {
	global $graphene_settings, $graphene_defaults;
		
	// Add custom image sizes selectively
	if ( $graphene_settings['slider_display_style'] == 'bgimage-excerpt' ) {
		$height = ( $graphene_settings['slider_height']) ? $graphene_settings['slider_height'] : 240;
		$frontpage_id = ( get_option( 'show_on_front' ) == 'posts' ) ? NULL : get_option( 'page_on_front' );
		$column_mode = graphene_column_mode( $frontpage_id );
		
		if ( strpos( $column_mode, 'two-col' ) === 0 )
			$column_mode = 'two-col';
		elseif ( strpos( $column_mode, 'three-col' ) === 0 )
			$column_mode = 'three-col';
		else 
			$column_mode = NULL;
			
		if ( $column_mode )
			$slider_width = $graphene_settings['column_width'][$column_mode]['content'];
		else 
			$slider_width = graphene_grid_width( '', 16, 11, 8, $frontpage_id );
		
		add_image_size( 'graphene_slider', apply_filters( 'graphene_slider_image_width', $slider_width ), $height, true);
	}
	if (get_option( 'show_on_front' ) == 'page' && !$graphene_settings['disable_homepage_panes']) {
		$pane_width = graphene_grid_width( '', 8, 6, 4 );
		add_image_size( 'graphene-homepage-pane', apply_filters( 'graphene_homepage_pane_image_width', $pane_width ), apply_filters( 'graphene_homepage_pane_image_height', floor( $pane_width * 0.5 ) ), true);
	}
	
	// Add support for editor syling
	if ( ! $graphene_settings['disable_editor_style'] ){
		global $content_width;
		add_editor_style();
		add_editor_style( 'admin/editor.css.php?content_width=' . $content_width );
	}
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	// Add support for post thumbnail / featured image
	add_theme_support( 'post-thumbnails' );
	
	// Add supported post formats
	add_theme_support( 'post-formats', array( 'status', 'audio', 'image', 'video' ) );

	// Make theme available for translation
	load_theme_textdomain( 'graphene', get_template_directory() . '/languages' );
	
	// Register the custom menu locations
	register_nav_menus( array( 
		'Header Menu' => __( 'Header Menu', 'graphene' ),
		'secondary-menu' => __( 'Secondary Menu', 'graphene' ),
		'footer-menu' => __( 'Footer Menu', 'graphene' ),
	) );

	// Add support for custom background
	add_custom_background();

	// Add support for custom header
	define( 'HEADER_TEXTCOLOR', apply_filters( 'graphene_header_textcolor', '000000' ) );
	// The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', apply_filters( 'graphene_header_image', '%s/images/headers/flow.jpg' ) );
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'graphene_header_image_width', graphene_grid_width( $graphene_settings['gutter_width'] * 2, 16 ) ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'graphene_header_image_height', 198 ) );
	define( 'NO_HEADER_TEXT', apply_filters( 'graphene_header_text', false ) );
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See graphene_admin_header_style(), below.
	add_custom_image_header( '', 'graphene_admin_header_style' );

	// Register default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( graphene_get_default_headers() );
        
    do_action( 'graphene_setup' );
}
endif;
add_action( 'after_setup_theme', 'graphene_setup' );


if ( ! function_exists( 'graphene_get_default_headers' ) ) {
	function graphene_get_default_headers() {
		$headers = array( 
			'Schematic' => array( 'url' => '%s/images/headers/schematic.jpg',
				'thumbnail_url' => '%s/images/headers/schematic-thumb.jpg',
				'description' => __( 'Header image by Syahir Hakim', 'graphene' ) ),
			
			'Flow' => array( 'url' => '%s/images/headers/flow.jpg',
				'thumbnail_url' => '%s/images/headers/flow-thumb.jpg',
				'description' => __( 'This is the default Graphene theme header image, cropped from image by Quantin Houyoux at sxc.hu', 'graphene' ) ),
			
			'Fluid' => array( 'url' => '%s/images/headers/fluid.jpg',
				'thumbnail_url' => '%s/images/headers/fluid-thumb.jpg',
				'description' => __( 'Header image cropped from image by Ilco at sxc.hu', 'graphene' ) ),
			
			'Techno' => array( 'url' => '%s/images/headers/techno.jpg',
				'thumbnail_url' => '%s/images/headers/techno-thumb.jpg',
				'description' => __( 'Header image cropped from image by Ilco at sxc.hu', 'graphene' ) ),
			
			'Fireworks' => array( 'url' => '%s/images/headers/fireworks.jpg',
				'thumbnail_url' => '%s/images/headers/fireworks-thumb.jpg',
				'description' => __( 'Header image cropped from image by Ilco at sxc.hu', 'graphene' ) ),
			
			'Nebula' => array( 'url' => '%s/images/headers/nebula.jpg',
				'thumbnail_url' => '%s/images/headers/nebula-thumb.jpg',
				'description' => __( 'Header image cropped from image by Ilco at sxc.hu', 'graphene' ) ),
			
			'Sparkle' => array( 'url' => '%s/images/headers/sparkle.jpg',
				'thumbnail_url' => '%s/images/headers/sparkle-thumb.jpg',
				'description' => __( 'Header image cropped from image by Ilco at sxc.hu', 'graphene' ) ),
		);
		
		return apply_filters( 'graphene_default_header_images', $headers );
	}
}


if ( ! function_exists( 'graphene_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
*/
function graphene_admin_header_style(){ ?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		min-height: 0;
	}
    #headimg #name{
		position: relative;
		top: 65px;
		left: 38px;
		width: 852px;
		font: bold 28px "Trebuchet MS";
		text-decoration: none;
    }
    #headimg #desc{
        color: #000;
        border-bottom: none;
        position: relative;
        top: 50px;
        width: 852px;
        left: 38px;
        font: 18px arial;
    }
    </style>
    
	<?php
	do_action( 'graphene_admin_header_style' );
}
endif;


/**
 * Register widgetized areas
 *
 * To override graphene_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Graphene 1.0
 * @uses register_sidebar
 */
function graphene_widgets_init() {
	if (function_exists( 'register_sidebar' ) ) {
		global $graphene_settings;
		
		register_sidebar(array( 'name' => __( 'Sidebar Widget Area', 'graphene' ),
			'id' => 'sidebar-widget-area',
			'description' => __( 'The first sidebar widget area (will always be displayed on the right hand side).', 'graphene' ),
			'before_widget' => '<div id="%1$s" class="sidebar-wrap clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => "<h3>",
			'after_title' => "</h3>",
		) );
                
		register_sidebar(array( 'name' => __( 'Sidebar Two Widget Area', 'graphene' ),
			'id' => 'sidebar-two-widget-area',
			'description' => __( 'The second sidebar widget area (will always be displayed on the left hand side).', 'graphene' ),
			'before_widget' => '<div id="%1$s" class="sidebar-wrap clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => "<h3>",
			'after_title' => "</h3>",
		) );
		
		register_sidebar(array( 'name' => __( 'Footer Widget Area', 'graphene' ),
			'id' => 'footer-widget-area',
			'description' => __( "The footer widget area. Leave empty to disable. Set the number of columns to display at the theme's Display Options page.", 'graphene' ),
			'before_widget' => '<div id="%1$s" class="sidebar-wrap clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => "<h3>",
			'after_title' => "</h3>",
		) );
		
		/**
		 * Register alternate widget areas to be displayed on the front page, if enabled
		 *
		 * @package Graphene
		 * @subpackage Graphene
		 * @since Graphene 1.0.8
		*/
		if ( $graphene_settings['alt_home_sidebar']) {
			register_sidebar(array( 'name' => __( 'Front Page Sidebar Widget Area', 'graphene' ),
				'id' => 'home-sidebar-widget-area',
				'description' => __( 'The first sidebar widget area that will only be displayed on the front page.', 'graphene' ),
				'before_widget' => '<div id="%1$s" class="sidebar-wrap clearfix %2$s">',
				'after_widget' => '</div>',
				'before_title' => "<h3>",
				'after_title' => "</h3>",
			) );
			
			register_sidebar(array( 'name' => __( 'Front Page Sidebar Two Widget Area', 'graphene' ),
				'id' => 'home-sidebar-two-widget-area',
				'description' => __( 'The second sidebar widget area that will only be displayed on the front page.', 'graphene' ),
				'before_widget' => '<div id="%1$s" class="sidebar-wrap clearfix %2$s">',
				'after_widget' => '</div>',
				'before_title' => "<h3>",
				'after_title' => "</h3>",
			) );
		}
		
		if ( $graphene_settings['alt_home_footerwidget']) {
			register_sidebar(array( 'name' => __( 'Front Page Footer Widget Area', 'graphene' ),
				'id' => 'home-footer-widget-area',
				'description' => __( "The footer widget area that will only be displayed on the front page. Leave empty to disable. Set the number of columns to display at the theme's Display Options page.", 'graphene' ),
				'before_widget' => '<div id="%1$s" class="sidebar-wrap clearfix %2$s">',
				'after_widget' => '</div>',
				'before_title' => "<h3>",
				'after_title' => "</h3>",
			) );
		}
		
		/* Header widget area */
		if ( $graphene_settings['enable_header_widget']) :
			register_sidebar(array( 'name' => __( 'Header Widget Area', 'graphene' ),
				'id' => 'header-widget-area',
				'description' => __("The header widget area.", 'graphene' ),
				'before_widget' => '<div id="%1$s" class="sidebar-wrap clearfix %2$s">',
				'after_widget' => '</div>',
				'before_title' => "<h3>",
				'after_title' => "</h3>",
			) );
		endif;
                
		/* Action hooks widget areas */
		if ( count( $graphene_settings['widget_hooks'] ) > 0 ) {
			$available_hooks = graphene_get_action_hooks( true );
			
			foreach ($graphene_settings['widget_hooks'] as $hook) {
				if (in_array($hook, $available_hooks)) {
					register_sidebar(array(
						'name' => ucwords( str_replace('_', ' ', $hook) ),
						'id' => $hook,
						'description' => sprintf( __("Dynamically added widget area. This widget area is attached to the %s action hook.", 'graphene'), "'$hook'" ),
						'before_widget' => '<div id="%1$s" class="sidebar-wrap clearfix %2$s">',
						'after_widget' => '</div>',
						'before_title' => "<h3>",
						'after_title' => "</h3>",
					));
					// to display the widget dynamically attach the dynamic method
					add_action( $hook, 'graphene_display_dynamic_widget_hooks' );
				}
				
			}                    
		}
	}
	
	do_action( 'graphene_widgets_init' );
}
add_action( 'widgets_init', 'graphene_widgets_init' );


/**
 * Display a dynamic widget area, this is hooked to the user selected do_action() hooks available in Graphene.
 * @global array $graphene_settings 
 */
function graphene_display_dynamic_widget_hooks(){
    global $graphene_settings;
	
    // to find the current action
    $actionhook_id = current_filter();
    if ( in_array( $actionhook_id, $graphene_settings['widget_hooks'])  && is_active_sidebar( $actionhook_id ) ) : ?>
    <div class="graphene-dynamic-widget" id="graphene-dynamic-widget-<?php echo $actionhook_id; ?>">
        <?php dynamic_sidebar( $actionhook_id ); ?>
    </div>
    <?php endif;
}

?>