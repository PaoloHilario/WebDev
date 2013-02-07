<?php get_header(); ?>

<div id="content-top" class="container_12"></div>
<div id="content" class="container_12">
	<?php get_sidebar('left'); ?>
	<div class="grid_6">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>" style="margin-bottom:30px;">
			<h2 class="posttitle"><a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
				</a></h2>
			<div class="meta">
				<div class="info">
					<?php edit_post_link(__('Edit', ''), '', ' | '); ?>
					<span class="nbdate">
					<?php the_time(__('M jS, Y', '')) ?>
					</span> <span class="nbauthor">
					<?php the_author_posts_link(); ?>
					</span> <span class="nbcategories">
					<?php the_category(', '); ?>
					</span>
					<p class="comments">
						<?php comments_popup_link(__('No comments', ''), __('1 comment', ''), __('% comments', ''));?>
					</p>
				</div>
				<div class="clear"></div>
			</div>
			<?php the_content('Continue reading');?>
			<p><span class="nbtags"><?php _e('Tags: ', ''); the_tags('', ', ', ''); ?></span></p>
		</div>
		<?php endwhile; else: ?>
		<p>
			<?php _e('Sorry, no posts matched your criteria.'); ?>
		</p>
		<?php endif; ?>
		<p>
			<?php posts_nav_link(); ?>
		</p>
	</div>
	<?php get_sidebar('right'); ?>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>
