<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
				<h2>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>
				</h2>
				
				<div class="user"><?php the_author() ?></div>
				
				<div class="entry">
					<?php the_content('...'); ?>
				</div>

				<p class="postmetadata"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
				<p class="more"><a href="<?php the_permalink() ?>">Continue reading...</a></p>
			  <br clear="all" />
			</div>
			<div class="postsep">&nbsp;</div>
		<?php endwhile; ?>

		<div class="navigation_post">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>
	
	


<div style="height:1px; clear:both;"></div>
<?php get_footer(); ?>
