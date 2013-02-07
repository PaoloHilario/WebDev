<?php

/**

 * @package WordPress

 * @subpackage Default_Theme

 */



get_header(); ?>



	<div id="content" class="narrowcolumn" role="main">



	<?php if (have_posts()) : ?>



		<h2 class="pagetitle">Search Results</h2>



		<div class="navigation_post">

			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>

			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>

		</div>





		<?php while (have_posts()) : the_post(); ?>



			<div class="post ">

				<h2>

				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>

				<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>

				</h2>



				<p class="postmetadata"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

				<p class="more"><a href="<?php the_permalink() ?>">Continue reading...</a></p>

				<br clear="all" />

				

				<div class="postsep">&nbsp;</div>

			</div>



		<?php endwhile; ?>



		<div class="navigation_post">

			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>

			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>

		</div>



	<?php else : ?>



		<h2 class="center">No posts found. Try a different search?</h2>

		<?php get_search_form(); ?>



	<?php endif; ?>



	</div>



<?php get_sidebar(); ?>

<div style="height:1px; clear:both;"></div>

<?php get_footer(); ?>

