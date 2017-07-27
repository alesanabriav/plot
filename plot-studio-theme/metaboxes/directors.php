<?php

function ps_directors_cb($post) {
    wp_nonce_field('ps_director_meta', 'ps_director_nonce');
    $director_name = get_post_meta($post->ID, 'director_name_key', true);
?>

<div>
  <p>
		<input
			type="text"
			name="director_name_key"
			placeholder="Director name"
			value="<?php echo $director_name ?>"
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
} //bs_directors_cb

function ps_save_director_meta($post_id) {
  update_meta_field([
    'field_key' => 'director_name_key',
    'field_name' => 'director_name',
    'post_id' => $post_id
  ]);
}

add_action( 'save_post', 'ps_save_director_meta');

function ps_director_mb() {
  $post_id = null;
	if(isset($_GET['post'])) $post_id =  $_GET['post'] ? $_GET['post'] : null;
	if(isset($_POST['post_ID']) && $post_id == null) $post_id = $_POST['post_ID'] ? $_POST['post_ID']: null;

  add_meta_box('ps_directors', ' Director info', 'ps_directors_cb', 'director', 'normal', 'high', null);
}

add_action('add_meta_boxes', 'ps_director_mb');
