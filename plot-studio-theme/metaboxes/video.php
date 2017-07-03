<?php

function bs_page_image_square_cb($post) {
    wp_nonce_field('ps_video_thumb_meta', 'ps_video_thumb_nonce');
    $video_thumb = get_post_meta($post->ID, 'video_thumb_key', true);
    $client_name = get_post_meta($post->ID, 'client_name_key', true);
?>

<div>
	<p>
		<input
			type="text"
			class="uploader"
			name="video_thumb"
			placeholder="Video Thumb"
			value="<?php echo $video_thumb ?>"
			style="height: 35px; width: 100%;"
		/>
	</p>

  <p>
		<input
			type="text"
			name="client_name"
			placeholder="Client Name"
			value="<?php echo $client_name ?>"
			style="height: 35px; width: 100%;"
		/>
	</p>

</div>

<script>
const open_media_uploader_image = () => {
	let media_uploader = wp.media({ frame: 'post', state: 'insert', multiple: false });

	let promise = new Promise((resolve) => {
		media_uploader.on('insert', () => {
			let json = media_uploader.state().get('selection').first().toJSON();
			return resolve(json);
		});
	});

	media_uploader.open();

	return promise;
};

const section = () => {

	jQuery('.uploader').on('click', (e) => {
		open_media_uploader_image() .then(res => { jQuery(e.currentTarget).attr('value', res.url); });
	});
};

section();


</script>
<?php
} //end bs_page_image_square_cb


function ps_save_video_thumb_meta($post_id) {
  update_meta_field(array(
    'field_key' => 'video_thumb_key',
    'field_name' => 'video_thumb',
    'post_id' => $post_id
  ));

  update_meta_field(array(
    'field_key' => 'client_name_key',
    'field_name' => 'client_name',
    'post_id' => $post_id
  ));
}

add_action( 'save_post', 'ps_save_video_thumb_meta');

function ps_video_thumb_mb() {

    $post_id = null;
		if(isset($_GET['post'])) $post_id =  $_GET['post'] ? $_GET['post'] : null;
		if(isset($_POST['post_ID']) && $post_id == null) $post_id = $_POST['post_ID'] ? $_POST['post_ID']: null;

    add_meta_box('page_image_square', 'Project Info', 'bs_page_image_square_cb', 'portfolio', 'normal', 'high', null);
}

add_action('add_meta_boxes', 'ps_video_thumb_mb');
