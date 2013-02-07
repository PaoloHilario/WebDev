<?php get_header(); ?>
<div id="content-top" class="container_12"></div>
<div id="content" class="container_12">
<?php get_sidebar('left'); ?>
  <div class="grid_6">
	<div class="post">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="posttitle">
      <?php the_title(); ?>
      </h1>
    
    <?php the_content('Continue reading');?>
    <?php wp_link_pages('before=<div id="nextpage" style="clear:both;"><p><strong>Pages: &after=</strong></p></div>&pagelink=%'); ?>
    <?php edit_post_link(__('Edit'), '<p>', '</p>'); ?>

    <?php endwhile; else: ?>
    

   <?php endif; ?>

    <?php
	if (function_exists('wp_list_comments')) {
		comments_template('', true);
	} else {
		comments_template();
	}
	?>

  </div>
	</div>
 	<?php get_sidebar('right'); ?>
  
  <div class="clear"></div>
</div>
<?php get_footer(); ?>