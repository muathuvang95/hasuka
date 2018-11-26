<?php
/*
 cung cấp các hàm xuất giao diện
 */
function hasuka_home_product_cats() {
	$product_cats = get_terms( array( 'taxonomy'=>'product_cat', 'hide_empty'=>false ) );

	?>
	<div class="home-product_cats">
		<div class="container">
			<div class="owl-carousel owl-theme home-product_cats-carousel">
			<?php
			foreach ($product_cats as $key => $value) {
				$thumbnail_id = get_term_meta( $value->term_id, 'thumbnail_id', true );
				?>
				<a href="<?php echo get_term_link( $value ); ?>">
					<?php echo wp_get_attachment_image( $thumbnail_id, 'full', false, array('alt'=>esc_attr($value->name)) ); ?>
				</a>
				<?php
			}
			?>
			</div>
		</div>
	</div>
	<?php
}

function hasuka_home_contact_infos() {
	$hotline = fw_get_db_settings_option('hotline');
	$contacts = fw_get_db_settings_option('contacts');
	//print_r($contacts);
	?>
	<div class="home-contact-infos">
		<div class="container">
			<div class="hotline">
				<p>DỊCH VỤ HỖ TRỢ</p>
				<p>Hotline: <a href="tel:<?=esc_attr($hotline)?>"><?=esc_html($hotline)?></a></p>
			</div>
			<div class="row contact-colums">
				<?php
				foreach ($contacts as $contact) {
					//debug($contact);
					?>
					<div class="col-sm-4">
						<div class="icon"><img src="<?php echo esc_url($contact['icon']['url']); ?>" alt="<?=esc_attr($contact['header'])?>"></div>
						<div class="heading"><?=esc_html($contact['header'])?></div>
						<div class="info"><?=format_content($contact['body'])?></div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	<?php
}
function hasuka_home_posts(){
	
	$posts = wp_get_recent_posts(array(
		'numberposts' => 10,
		'post_status' => 'publish',
	), OBJECT);
	?>
	<div class="home-recent_posts">
		<div class="container">
			<div class="owl-carousel owl-theme home-recent_posts-carousel">
			<?php
			wp_reset_postdata();
			foreach ($posts as $key => $post) {
				global $post;
				setup_postdata($post);
				debug($post);
				?>
				<div class="home-wrap-recent_posts">
					<a href="<?php the_permalink(); ?>">
						<?php echo get_the_post_thumbnail( get_the_ID(), 'large', array('alt'=>esc_attr(get_the_title())) ); ?>
						<div class="info">
							<?php 
								the_title();
								
								the_excerpt();
							?>
						</div>
					</a>
				</div>
				<?php
			}
			wp_reset_postdata();
			?>
			</div>
		</div>
	</div>
	<?php
}