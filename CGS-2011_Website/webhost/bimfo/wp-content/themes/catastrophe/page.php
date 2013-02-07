<?php

/**

 * @package WordPress

 * @subpackage Default_Theme

 */



get_header(); ?>



	<div id="content" class="narrowcolumn">



		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">

			

			<h2>

				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>

				<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>

			</h2>

			

			<div class="user"><?php the_author() ?></div>

			

			<div class="entry">

				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>



				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				<p class="alt" style="font-size:11px;">
					
						This entry was posted
						on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>


						<?php if ( comments_open() && pings_open() ) {
							// Both Comments and Pings are open ?>
							You can <a href="#respond">leave a response</a>,  or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site..

						<?php } elseif ( !comments_open() && pings_open() ) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif ( comments_open() && !pings_open() ) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif ( !comments_open() && !pings_open() ) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.
                                    <?php } ?>
								
				</p>

			</div>
<p class="postmetadata"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>

		</div>
<?php comments_template(); ?>
		<?php endwhile; endif; ?>

	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

	</div>



<?php get_sidebar(); ?>

<div style="height:1px; clear:both;"></div>

<?php get_footer(); ?>

