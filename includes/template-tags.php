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
	$hotline = (unyson_exists()) ? fw_get_db_settings_option('hotline') : '';
	$contacts = (unyson_exists()) ? fw_get_db_settings_option('contacts') : false;
	//print_r($contacts);
	?>
	<div class="home-contact-infos">
		<div class="container">
			<div class="hotline">
				<p>DỊCH VỤ HỖ TRỢ</p>
				<p>Hotline: <a href="tel:<?=esc_attr($hotline)?>"><?=esc_html($hotline)?></a></p>
			</div>
			<?php if($contacts): ?>
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
			<?php endif; ?>
		</div>
	</div>
	<?php
}

function hasuka_home_posts(){
	
	$query = new WP_Query(array(
		'post_type' => 'post',
		'posts_per_page' => 12,
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'desc',
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

function hasuka_home_intro_infos() {
	$intros = (unyson_exists()) ? fw_get_db_settings_option('intros') : false;
	
	if($intros):
	?>
	<div class="home-intro-infos">
		<div class="container">
			<div class="row intro-colums">
				<?php
				foreach ($intros as $intro) {
					//debug($intro);
					?>
					<div class="col-sm-4">
						<div class="icon"><i class="<?php  echo $intro['icon']['icon-class']; ?>"></i></div>
						<div class="heading"><?=esc_html($intro['header'])?></div>
						<div class="info"><?=format_content($intro['body'])?></div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	<?php
	endif;
}

function backtop_button() {
	?>
	<button id="back-to-top" title="Go to top"><i class="fa fa-chevron-up"></i></button>
	<?php
}

function hasuka_breadcrumb() {
	?>
	<div class="hasuka-breadcrumb">
		<div class="container">
			<?php
			if(woocommerce_exists()) {
				woocommerce_breadcrumb();
			}
			?>
		</div>
	</div>
	<?php
}