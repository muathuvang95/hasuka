<?php
/*
 Cung cấp cá hàm dùng chung
 */
function parse_bool($var) {
	# '1','-1','1.1','2','true' => true
	# '','0.0','0','false' => false
	return (bool)json_decode(strtolower($var));
}

function string_to_bool( $string ) {
	return is_bool( $string ) ? $string : ( 'yes' === $string || 1 === $string || 'true' === $string || '1' === $string );
}

/**
 * Converts a bool to a 'yes' or 'no'.
 */
function bool_to_string( $bool ) {
	if ( ! is_bool( $bool ) ) {
		$bool = string_to_bool( $bool );
	}
	return true === $bool ? 'yes' : 'no';
}

function format_content($raw_string) {
	global $wp_embed;

	$content = wptexturize($raw_string);
	$content = convert_smilies($content);
	$content = convert_chars($content);
	$wp_embed->run_shortcode($content);
	$content = wpautop($content);
	$content = shortcode_unautop($content);
	$content = prepend_attachment($content);
	$content = do_shortcode($content);
	$content = $wp_embed->autoembed($content);

	return $content;
}

function unautop($s) {
    //remove any new lines already in there
    $s = str_replace("\n", "", $s);

    //remove all <p>
    $s = str_replace("<p>", "", $s);

    //replace <br /> with \n
    $s = str_replace(array("<br />", "<br>", "<br/>"), "", $s);

    //replace </p> with \n\n
    $s = str_replace("</p>", "", $s);       

    return $s;      
}

/*
 
 */
function do_wp_shortcode( $tag, array $atts = array(), $content = null ) {
	global $shortcode_tags;

	if ( ! isset( $shortcode_tags[ $tag ] ) ) {
		return false;
	}

	return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
}

/*
 get current url
 */
function current_url() {
	global $wp;
	return home_url( add_query_arg( array(), $wp->request ) );
}

/**
 * Retrieve the archive title based on the queried object.
 * Trả về tiêu đề trang lưu trữ từ đối tượng đã truy vấn.
 */
function get_archive_title() {
	if ( is_category() ) {
		/* translators: Category archive title. 1: Category name */
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		/* translators: Tag archive title. 1: Tag name */
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		/* translators: Author archive title. 1: Author name */
		$title = sprintf(
			'Tác giả: %s',
			'<span class="vcard">' . get_the_author() . '</span>'
		);
	} elseif ( is_year() ) {
		/* translators: Yearly archive title. 1: Year */
		$title = sprintf(
			'Năm: %s',
			get_the_date( 'Y' )
		);
	} elseif ( is_month() ) {
		/* translators: Monthly archive title. 1: Month name and year */
		$title = sprintf( 
			'Tháng %s năm %s',
			get_the_date( 'm' ), 
			get_the_date( 'Y' ) 
		);
	} elseif ( is_day() ) {
		/* translators: Daily archive title. 1: Date */
		$title = sprintf( 
			'Ngày %s tháng %s năm %s',
			get_the_date( 'd' ), get_the_date( 'm' ), 
			get_the_date( 'Y' ) 
		);
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = 'Bên lề';
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = 'Bộ sưu tập';
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = 'Hình ảnh';
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = 'Video';
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = 'Lưu ý';
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = 'Liên kết';
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = 'Trạng thái';
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = 'Âm thanh';
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = 'Tán gẫu';
		}
	} elseif ( is_post_type_archive() ) {
		/* translators: Post type archive title. 1: Post type name */
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( '%1$s: %2$s', $tax->labels->singular_name, single_term_title( '', false ) );
	} elseif ( is_search() ) {
		$title = sprintf(
			'Tìm kiếm: "%s"',
			get_search_query()
		);
	} else {
		$title = 'Lưu trữ';
	}

	return $title;
}

/*
 Cắt lấy nội dung tóm tắt bài viết 
 */
function get_excerpt($post=null, $limit=100) {
  
  $post = get_post($post);
  
  $excerpt = $post->post_excerpt;
  $content = $post->post_content;

  if(''==$excerpt) {
    $content = strip_shortcodes( $content );
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);
    $excerpt = $content;
  }

  if(mb_strlen($excerpt)>$limit)
    $excerpt = mb_substr($excerpt, 0, $limit).'...';

  return $excerpt;

}

/*
 hàm gọi lại của array_map trả về mảng term_id từ mảng term.
 */
function term_id_map($term) {
  return $term->term_id;
}

/*
 hàm gọi lại của array_map trả về mảng term slug từ mảng term.
 */
function term_slug_map($term) {
  return $term->slug;
}

/*
 hàm gọi lại của array_map trả về mảng term name từ mảng term.
 */
function term_name_map($term) {
  return $term->name;
}

/*
 debug variable
 */
function debug($var) {
  echo '<pre>'.print_r($var, true).'</pre>';
}
