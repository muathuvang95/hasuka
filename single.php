<?php

get_header();
?>
<div class="container main-content">
	<div class="row">
		<div class="col-md-9 content-area">
			<?php
			while (have_posts()) {
				the_post();
				the_content();
			}
			?>
		</div>
		<?php  get_sidebar(); ?>
	</div>
</div>
<?php

get_footer();
