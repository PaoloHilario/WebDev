<?php get_header(); ?>
<div id="content-top" class="container_12"></div>
<div id="content" class="container_12">
<?php get_sidebar('left'); ?>
  <div class="grid_6">
    <h1 class="posttitle"> Sorry, that wasn't found! </h1>
    <p>Please navigate to another page or enter a search below.
    <p>
    <div class="post">
      <?php get_search_form(); ?>
    </div>
  </div>
  <?php get_sidebar('right'); ?>
  <div class="clear"></div>
</div>
<?php get_footer(); ?>
