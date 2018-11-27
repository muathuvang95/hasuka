<?php
/*
 Template Name: Lech Posts
 */
get_header();

?>
<div class="container">
	Lấy bài viết từ saiko.com.vn
	<ul id="lp-result">
		
	</ul>
</div>
<script type="text/javascript">
	jQuery(function($){
		var ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
		function ajax_import_post(post) {
			$.ajax({
				url: ajax_url+'?action=import_post',
				type: 'POST',
				//dataType: 'json',
				data: {post: post},
				success: function(response) {
					$('#lp-result').prepend('<li>'+response.title+'</li>');
				}
			});
		}

		$.ajax({
			url: 'http://saiko.com.vn/wp-json/wp/v2/posts?per_page=12',
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				//console.log(data);
				var posts = [];
				$.each(data, function(index, val) {
					var post = {
						title: val.title.rendered,
						slug: val.slug,
						content: val.content.rendered
					}
					
					$.ajax({
						url: 'http://saiko.com.vn/wp-json/wp/v2/media/'+val.featured_media,
						type: 'GET',
						dataType: 'json',
						success: function(res) {
							post.thumbnail = res.source_url;
							//posts.push(post);
							ajax_import_post(post);
						}
					});
					
				});
			}
		});

	});
</script>
<?php

get_footer();