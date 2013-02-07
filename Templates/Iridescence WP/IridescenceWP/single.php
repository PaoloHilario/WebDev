<?php get_header(); ?>
<div id="content-top" class="container_12"></div>
<div id="content" class="container_12">
<?php get_sidebar('left'); ?>
  <div class="grid_6">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="post" id="post-<?php the_ID(); ?>">
    <h1 class="posttitle">
      <?php the_title(); ?>
      </h1>
    <div class="meta">
		 <div class="info">
        <?php edit_post_link(__('Edit', ''), '', ' | '); ?>
          <span class="nbdate"><?php the_time(__('M jS, Y', '')) ?></span>

          <span class="nbauthor"><?php the_author_posts_link(); ?></span>

          <span class="nbcategories"><?php the_category(', '); ?></span>

        </div>
        
		<div class="clear"></div>
	</div>
    <?php the_content();?>
    <?php wp_link_pages('before=<div id="nextpage" style="clear:both;"><p><strong>Pages: &after=</strong></p></div>&pagelink=%'); ?>

			<p><span class="nbtags"><?php _e('Tags: ', ''); the_tags('', ', ', ''); ?></span></p>

    </div>
    <?php endwhile; else: ?>
    <p>
      <?php _e('Sorry, no posts matched your criteria.'); ?>
    </p>
    <?php endif; ?>
    <p><?php posts_nav_link(); ?></p>

    <?php
	if (function_exists('wp_list_comments')) {
		comments_template('', true);
	} else {
		comments_template();
	}
	?>

  </div>
  
  
  <?php get_sidebar('right'); ?>
  
  <div class="clear"></div>
</div>
<?php get_footer(); ?>
