<div class="roundcornrrbox">
    <div class="topleftcorner"><div class="toprightcorner"></div></div>
    <div class="roundcrrcnt">
    
    	<div id="feedbox">
            <div id="contrssbox">
                <a href="<?php bloginfo('rss2_url'); ?>">RSS Feed</a>
            </div>
        </div>
        
        <!-- Optional Intro -->
        <?php if (get_option('activate_intro')) {
            echo "<div class=\"widget\">";
                echo "<h4>". get_option('intro_title'). "</h4>";
				echo "<div class=\"welcomemsg\">". get_option('intro_message')."</div>";
           	echo "</div>";
		} 
		?>        
        <!-- widget -->
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_right') ) : ?>
            <div class="widget-cat">
                <h4>Categories</h4>
                <ul>
                    <?php wp_list_categories('title_li=0&categorize=0&number=NULL'); ?>
                </ul>
            </div>

            <div class="widget">
                    <?php wp_list_bookmarks('title_li=0&categorize=1&category_before=&category_after='); ?>
            </div>

            <div class="widget">
                <h4>Meta</h4>	
                <ul>
                    <?php wp_register(); ?>
                    <li><?php wp_loginout(); ?></li>
                    <li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
                    <li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
                    <?php wp_meta(); ?>
                </ul>
            </div>
        <?php endif; // endif widget ?> 

        <div class="clr"></div>
    </div>
    <div class="bottomleftcorner"><div class="bottomrightcorner"></div></div>
</div>
