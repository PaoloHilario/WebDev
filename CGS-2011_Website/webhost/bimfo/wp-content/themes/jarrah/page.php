<?php get_header(); ?>

<div id="maincol">
	

	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

    <div class="postwrap">
      <h2 class="posttitle-page"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
      <div class="postcontent"><?php the_content('(continue reading...)'); ?></div>
      <div class="clr"></div>
      <span class="linkpages"><?php wp_link_pages(); ?></span>
      <div class="clr"></div>

		<div id="comments">
			<?php if (function_exists('wp_list_comments')): ?>
            <!-- WP 2.7 and above -->
            <?php comments_template('', true); ?>
            
            <?php else : ?>
            <!-- WP 2.6 and below -->
            <?php comments_template(); ?>
            <?php endif; ?>
        </div> <!-- Closes Comment -->      
      
    </div> <!-- Closes topPost -->
    


<?php endwhile; ?>

<?php else : ?>

<div class="postwrap">
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