<div class="grid_3">

  <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Left Sidebar') ) : else : ?>
  <div class="simple">
  <h4><?php _e('Categories'); ?></h4>
    <ul>
      <?php wp_list_cats(); ?>
    </ul>
  </div>
  <?php endif; ?>
  
</div>
