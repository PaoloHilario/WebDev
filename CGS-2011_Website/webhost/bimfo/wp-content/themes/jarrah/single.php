<?php get_header(); ?>

<div id="maincol">
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

        <div class="postwrap">
          	<h2 class="posttitle"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
          	<div class="postmeta">by <?php the_author_posts_link(); ?> on <?php the_time('M.d, Y') ?>, under <?php the_category(', '); ?></div>
            <div class="clr16"></div>
          	<div class="postcontent"><?php the_content('(continue reading...)'); ?></div>
          	<div class="clr"></div>
          	<span class="linkpages"><?php wp_link_pages(); ?></span><div class="cleared"></div>
          	
			<?php if ( function_exists('the_tags') ) : ?>
            
				<div class="roundcornrrbox">
                   	<div class="topleftcorner"><div class="toprightcorner"></div></div>
                    <div class="roubcornrcontent">
            			<span class="posttags-single"><?php $tag = get_the_tags(); if (! $tag) {echo "No tags";} else {the_tags('', ', ', '');} ?></span>
                    	<div class="clr"></div>
                    </div>
                    <div class="bottomleftcorner"><div class="bottomrightcorner"></div></div>
                </div>                        
                        
			
			<?php endif; ?>
        	
            <div class="clr"></div>
        </div> <!-- Closes topPost -->
		<small><?php edit_post_link('Edit this entry?','',''); ?></small>

		<div id="comments">
			<?php if (function_exists('wp_list_comments')): ?>
            <!-- WP 2.7 and above -->
            <?php comments_template('', true); ?>
            
            <?php else : ?>
            <!-- WP 2.6 and below -->
            <?php comments_template(); ?>
            <?php endif; ?>
        </div> <!-- Closes Comment -->

<div id="extrastuff">
<span id="rssleft"><?php comments_rss_link(__('<abbr title="Really Simple Syndication">RSS</abbr> feed for this post (comments)')); ?></span>

<span id="trackright"><?php if ( pings_open() ) : ?> &#183; <a href="<?php trackback_url() ?>" rel="trackback"><?php _e('TrackBack <abbr title="Uniform Resource Identifier">URI</abbr>'); ?></a><?php endif; ?></span>
<div class="cleared"></div>
</div>

<?php endwhile; ?>

<?php else : ?>

<div class="topPost">
  <h2 class="topTitle"><a href="<?php the_permalink() ?>">Not Found</a></h2>
  <div class="topContent"><p>Sorry, but you are looking for something that isn't here. You can search again by using <a href="#searchform">this form</a>...</p></div>
</div> <!-- Closes topPost -->

<?php endif; ?>
</div><!-- Closes Main -->


<div id="rightcol">
	<?php get_sidebar(); ?>
</div>
<div class="clr"></div>




<?php get_footer(); ?>