<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
	<div id="sidebar">
		<ul class="rss">
			<li>
<a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>">
<img src="<?php bloginfo('template_url'); ?>/images/rss.jpg" alt="<?php bloginfo('name'); ?>" border="0" /></a>
                  </li>
		</ul>
        
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) { ?>
        
		<ul class="navigation">
            
			<?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?>

			<li><h2>Archives</h2>
				<ul>
                <?php wp_get_archives('type=monthly'); ?>
                </ul>
			</li>

			<?php wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>
            
		</ul>
        
        <?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
			<ul>
				<?php wp_list_bookmarks(); ?>

				<li><h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
				</li>
			
            </ul>
		<?php } ?>
        
        <?php } ?>
        
	</div>

