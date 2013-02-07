<?php
$mysitename = get_bloginfo('name');

 if (get_option('copyright')) {
    echo "<div class=\"copyr\">" . get_option('copyright') . "</div>";
  } else {
  echo "<div class=\"copyr\">Copyright &copy; 1996-2010 $mysitename. All rights reserved.</div>";
}
