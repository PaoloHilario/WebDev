<?php
	if (!get_option('bottombar')) {
?>
<div id="bottompanel">
    <div class="roundcornrrbox">
        <div class="topleftcorner"><div class="toprightcorner"></div></div>
        <div class="roundcrrcnt">
        
        	
            <div class="col1">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_left') ) : ?>

					<?php 
						$number=5;
                        $r = new WP_Query(array('showposts' => $number, 'what_to_show' => 'posts', 'nopaging' => 0, 'post_status' => 'publish', 'caller_get_posts' => 1));
                        if ($r->have_posts()) :
                    ?>
                    <h3>Recent Posts</h3>
                    <ul>
                        <?php while ($r->have_posts()) : $r->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink() ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?> </a>
                            </li>
                        <?php endwhile ?>			
                    </ul>
                    <?php
                        wp_reset_query();
                        endif;
                    ?>


                <?php endif; ?>
            </div>
            
            <div class="col2">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_middle') ) : ?>
      
                    <h3>Archives</h3>
                    <ul>
                        <?php wp_get_archives('type=monthly&limit=5'); ?>
                    </ul>

                <?php endif; ?>
            </div>
            
            <div class="col3">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_right') ) : ?>
                    <h3>Tags</h3>
                    <ul>
                    	<?php wp_tag_cloud('smallest=8&largest=16&number=24'); ?>
                    </ul>
                    
                <?php endif; ?>
            </div>
            <div class="clr"></div>
        

            <div class="clr"></div>
        </div>
        <div class="bottomleftcorner"><div class="bottomrightcorner"></div></div>
    </div>
</div>
<!-- Bottom Panel ends -->


<?php
	}
?>