<?php
/*
 Template Name: No Sidebar
 */
get_header();
?>
<div class="container main-content">
	<div class="row">
		<div class="col-xs-12 content-area">
			<?php
			while (have_posts()) {
				the_post();
				the_content();
			}
			?>
		</div>
	</div>
</div>
<?php

get_footer();
