<?php
/*
Template Name: gsearch
*/
?>
<?php get_header(); ?>
	<div id="content">
	<div class="gap">
    
    	<h2 class="pagetitle"><?php _e('Search Results','yashfa')?></h2>
		<!-- Google Search Result Snippet Begins -->
            <div id="cse-search-results"></div>
            <script type="text/javascript">
              var googleSearchIframeName = "cse-search-results";
              var googleSearchFormName = "cse-search-box";
              var googleSearchFrameWidth = 500;
              var googleSearchDomain = "www.google.com";
              var googleSearchPath = "/cse";
            </script>
            <script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
		<!-- Google Search Result Snippet Ends -->
		</div>
    
    </div>
	</div>