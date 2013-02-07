<?php get_header(); ?>

<div id="maincol">

	<h2 class="searchtitle-page">Search result for "<?php the_search_query(); ?>" </h2>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

<div class="postwrap">
  	<h2 class="posttitle"><a href="<?php the_permalink() ?>" class="searchtitle"><?php the_title(); ?></a></h2>
    <div class="postmeta">by <?php the_author_posts_link(); ?> , under <?php the_category(', '); ?></div>
    <div class="clr16"></div>
    
	<?php $content = the_excerpt(); ?>
    <?php
	$content = apply_filters('', $content);
	//$content = apply_filters('the_excerpt', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	?>

  	<div class="postcontent"><?php echo $content; ?></div>
  	<div class="clr"></div>
  	<span class="linkpages"><?php wp_link_pages(); ?></span>
	<div class="clr"></div>
</div> <!-- Closes topPost -->


<?php endwhile; ?>

<?php else : ?>

<div class="postwrap">
  <h2 class="posttitle"><a href="<?php the_permalink() ?>">Not Found</a></h2>
  <div class="postcontent"><p>Sorry, but you are looking for something that isn't here. You can search again by using <a href="#searchform">this form</a>...</p></div>
</div> <!-- Closes topPost -->

<?php endif; ?>
<div class="clr"></div>
</div> <!-- Closes main column-->


<div id="rightcol">
	<?php get_sidebar(); ?>
</div>
<div class="clr"></div>

<?php get_footer(); ?>