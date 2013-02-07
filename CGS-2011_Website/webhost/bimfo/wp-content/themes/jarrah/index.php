<?php get_header(); ?>

<!-- Contents Starts here -->

<!-- main column Starts here -->
<div id="maincol">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<?php if (function_exists('wp_list_comments')): ?>
				<div <?php post_class(postwrap); ?>>

			<?php else : ?>
    			<div class="postwrap">
   			<?php endif; ?>

                    <h2 class="posttitle"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <div class="postmeta">by <?php the_author_posts_link(); ?> on <?php the_time('M.d, Y') ?>, under <?php the_category(', '); ?></div>
                    <div class="clr16"></div>
                    <div class="postcontent"><?php the_content('(continue reading...)'); ?></div>
                    <div class="clr"></div>
                    
                    <div class="roundcornrrbox">
                    	<div class="topleftcorner"><div class="toprightcorner"></div></div>
                        <div class="roubcornrcontent">
                            <span class="posttags"><?php $tag = get_the_tags(); if (! $tag) {echo "No tags";} else {the_tags('', ', ', '');} ?></span>
                            <span class="postcomments"><?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?></span>
                            <span class="postmore"><a href="<?php the_permalink() ?>">more...</a></span>
                            <div class="clr"></div>
                        </div>
                        <div class="bottomleftcorner"><div class="bottomrightcorner"></div></div>
                    </div>
                    
                    <div class="clr"></div>
				</div> 
                <!-- Closes topPost -->
                <br/>

		<?php endwhile; ?>
	<?php else : ?>

        <div class="postwrap">
          <h2 class="posttitle"><a href="<?php the_permalink() ?>">Not Found</a></h2>
          <div class="postcontent"><p>Sorry, but you are looking for something that isn't here. You can search again by using <a href="#searchform">this form</a>...</p></div>
        </div> 
        <!-- Closes topPost -->

	<?php endif; ?>

    <div id="nextprevious">
        	<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
        	<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
        <div class="clr"></div>
    </div>
    <div class="clr"></div>
</div>

<!-- right column Starts here -->
<div id="rightcol">
	<?php get_sidebar(); ?>
</div>
<div class="clr"></div>

<?php get_footer(); ?>