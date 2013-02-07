<?php get_header(); ?>
<div id="content-top" class="container_12"></div>
<div id="content" class="container_12">
 <?php get_sidebar('left'); ?>
  <div class="grid_6">
	<div class="post">

    <h1 class="posttitle">
      <?php
			if (is_search()) {
				_e('Search Results', '');
			} else {
				_e('Archives', '');
			}
		?>
    </h1>
    <div class="meta">
      <div class="info">
       <?php
// If this is a search
if (is_search()) {
	printf( __('Keyword: &#8216;%1$s&#8217;', ''), wp_specialchars($s, 1) );
// If this is a category archive
} elseif (is_category()) {
	printf( __('Archive for the &#8216;%1$s&#8217; Category', ''), single_cat_title('', false) );
// If this is a tag archive
} elseif (is_tag()) {
	printf( __('Posts Tagged &#8216;%1$s&#8217;', ''), single_tag_title('', false) );
// If this is a daily archive
} elseif (is_day()) {
	printf( __('Archive for %1$s', ''), get_the_time(__('F jS, Y', '')) );
// If this is a monthly archive
} elseif (is_month()) {
	printf( __('Archive for %1$s', ''), get_the_time(__('F, Y', '')) );
// If this is a yearly archive
} elseif (is_year()) {
	printf( __('Archive for %1$s', ''), get_the_time(__('Y', '')) );
// If this is an author archive
} elseif (is_author()) {
	printf( __('Archive by %1$s', ''), get_the_author() );
// If this is a paged archive
} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
	_e('Blog Archives', '');
}
?>
      </div>
      <div class="clear"></div>
    </div>

    
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="entry">
    <h3 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark">
      <?php the_title(); ?>
      </a></h3>
    <div class="excerpt">
      <?php the_excerpt(); ?>
    </div>

    <p class="comments" style="margin-bottom:5px;">
          <?php
				comments_popup_link(__('No comments', ''), __('1 comment', ''), __('% comments', ''));
			?>
        </p>

    <div class="info">
        <?php edit_post_link(__('Edit', 'nichebuilder'), '', ' | '); ?>

          <span class="nbdate"><?php the_time(__('M jS, Y', 'nichebuilder')) ?></span>

          <span class="nbauthor"><?php the_author_posts_link(); ?></span>
          
          <span class="nbcategories"><?php the_category(', '); ?></span>

        </div>
	<div class="clearer"></div>
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
  </div>
  <?php get_sidebar('right'); ?>
  <div class="clear"></div>

</div>
<?php get_footer(); ?>
