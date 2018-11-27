<?php

function hasuka_import_post() {
	$post = isset($_POST['post']) ? $_POST['post'] : array();
	if(!empty($post)) {
		$post_id = check_post_exists( 'slug', $post['slug'], 'post');

		if(!$post_id) {
			$postarr['post_type'] = 'post';
			$postarr['post_title'] = $post['title'];
			$postarr['post_name'] = sanitize_title($post['slug']);
			$postarr['post_status'] = 'publish';
			$postarr['post_content'] = wp_kses_post($post['content']);
			$post_id = wp_insert_post( $postarr, false );
		}

		if($post_id) {
			$thumbnail_id = absint(get_post_meta($post_id, '_thumbnail_id', true));
			if(!$thumbnail_id) {
				$attach_id = upload_attachment($post['thumbnail']);
				if($attach_id) {
					update_post_meta($post_id, '_thumbnail_id', $attach_id);
				}
			}
		}
	}
	wp_send_json($post);
	//print_r($return);

	die;
}
add_action( 'wp_ajax_import_post', 'hasuka_import_post' );
add_action( 'wp_ajax_nopriv_import_post', 'hasuka_import_post' );

function check_post_exists($field, $value, $post_type='post', $file=array()) {
	global $wpdb;

	$query = "SELECT ID FROM $wpdb->posts WHERE 1=1";
	$args = array();

	if ( !empty ( $post_type ) ) {
		$query .= ' AND post_type=%s';
		$args[] = $post_type;
	}

	switch ($field) {
		case 'title':
		case 'post_title':
			$post_title = wp_unslash( sanitize_post_field( 'post_title', $value, 0, 'db' ) );
			if ( !empty ( $post_title ) ) {
				$query .= ' AND post_title=%s';
				$args[] = $post_title;
			}
			break;

		case 'content':
		case 'post_content':
			$post_content = wp_unslash( sanitize_post_field( 'post_content', $value, 0, 'db' ) );
			if ( !empty ( $post_content ) ) {
				$query .= ' AND post_content = %s';
				$args[] = $post_content;
			}
			break;
		
		case 'slug':
		case 'name':
		case 'post_slug':
		case 'post_name':
			$post_slug = sanitize_title($value);
			if ( !empty ( $post_slug ) ) {
				$query .= ' AND post_name=%s';
				$args[] = $post_slug;
			}
			break;

	}

	$post_id = 0;

	if ( !empty ( $args ) ) {
		$post_id = (int) $wpdb->get_var( $wpdb->prepare($query, $args) );
	}

	if($post_type=='attachment' && $post_id) {
		list($width, $height, $type, $attr) = getimagesize($file['tmp_name']);
		$filesize = filesize($file['tmp_name']);

		$exist_filesize = filesize( get_attached_file( $post_id ) );
		$exist_meta = wp_get_attachment_metadata( $post_id );

		if($filesize!=$exist_filesize || $exist_meta['width']!=$width || $exist_meta['height']!=$height) {
			$post_id = 0;
		}
	}

	return $post_id;

}

function upload_attachment($url='') {
	$post_id = 0;
	$attachmentId = false;
	if( !empty( $url )  ) {

		if ( !function_exists('media_handle_upload') ) {
			require_once(ABSPATH . "wp-admin" . '/includes/image.php');
			require_once(ABSPATH . "wp-admin" . '/includes/file.php');
			require_once(ABSPATH . "wp-admin" . '/includes/media.php');
		}

		$file = array();
		$file['name'] = basename($url);
		$file['tmp_name'] = download_url($url);

		$attachmentId = check_post_exists( 'title', $file['name'], 'attachment', $file );
		if(!$attachmentId) {
			if (is_wp_error($file['tmp_name'])) {
				@unlink($file['tmp_name']);
				//var_dump( $file['tmp_name']->get_error_messages( ) );
			} else {
				$attachmentId = media_handle_sideload($file, $post_id);

				if ( is_wp_error($attachmentId) ) {
					@unlink($file['tmp_name']);
					return $attachmentId->get_error_messages();
				}
			}
		}
	}
	return absint($attachmentId);
}