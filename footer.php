<?php

?>
	</div><!-- /main -->
	<footer id="site-footer">
		<div class="footer-colums">
			<div class="container">
				<div class="footer-logo"><?php the_custom_logo(); ?></div>
				<div class="colums row">
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-5ths">
						<?php dynamic_sidebar('footer-1'); ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-5ths">
						<?php dynamic_sidebar('footer-2'); ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-5ths">
						<?php dynamic_sidebar('footer-3'); ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-5ths">
						<?php dynamic_sidebar('footer-4'); ?>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-5ths">
						<?php dynamic_sidebar('footer-5'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-6">
						<?php wp_nav_menu( array( 'theme_location'=>'bottom-menu' ) ); ?>
						<?php dynamic_sidebar('footer-left'); ?>
					</div>
					<div class="col-sm-12 col-md-6">
						<?php
						$text_copyright = (unyson_exists()) ? fw_get_db_settings_option('text-copyright') : '';
						if($text_copyright!='') {
							echo '<div class="text-copyright">'.format_content($text_copyright).'</div>';
						}
						?>
						<?php dynamic_sidebar('footer-left'); ?>
					</div>
				</div>
			</div>
		</div>
	</footer>
	</div><!-- /page -->
	<?php wp_footer(); ?>
</body>
</html>