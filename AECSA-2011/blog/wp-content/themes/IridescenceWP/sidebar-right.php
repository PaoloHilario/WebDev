<div class="grid_3">

  <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar') ) : else : ?>
  <div class="simple">
  <h4><?php _e('Archives'); ?></h4>
    <ul>
      <?php wp_get_archives() ; ?>
    </ul>
    </div>
  <?php endif; ?>

</div>
