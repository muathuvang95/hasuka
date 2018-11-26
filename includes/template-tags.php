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
	
	$query = new WP_Query(array(
		'post_type' => 'post',
		'posts_per_page' => 12,
		'post_status' => 'publish'
	));

	if($query->have_posts()):
	?>
	<div class="home-recent_posts">
		<div class="container">
			<div class="owl-carousel owl-theme home-recent_posts-carousel">
			<?php
			while($query->have_posts()):
				$query->the_post();
				?>
				
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'large', array('alt'=>esc_attr(get_the_title())) ); ?>
						<div class="info">
							<div>
								<h3><?php the_title(); ?></h3>
								<div class="excerpt"><?php the_excerpt(); ?></div>
							</div>
						</div>
					</a>
				
				<?php
	
			endwhile;
			wp_reset_postdata();
			?>
			</div>
		</div>
	</div>
	<?php
	endif;
}

