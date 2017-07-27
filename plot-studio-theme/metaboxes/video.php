<?php

function bs_page_image_square_cb($post) {
    wp_nonce_field('ps_video_thumb_meta', 'ps_video_thumb_nonce');
    $video_url = get_post_meta($post->ID, 'video_url_key', true);
    $video_thumb = get_post_meta($post->ID, 'video_thumb_key', true);
    $client_name = get_post_meta($post->ID, 'client_name_key', true);
    $content_right_titles = get_post_meta($post->ID, 'content_right_titles_key');
    $content_right_texts = get_post_meta($post->ID, 'content_right_texts_key');
    $content_bottom_col1 = get_post_meta($post->ID, 'content_bottom_col1_key');
    $content_bottom_col2 = get_post_meta($post->ID, 'content_bottom_col2_key');
    $content_bottom_col3 = get_post_meta($post->ID, 'content_bottom_col3_key');

?>

<div>
  <p>
    <input
      type="text"
      name="video_url"
      placeholder="Video url"
      value="<?php echo $video_url ?>"
      style="height: 35px; width: 100%;"
    />
  </p>

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

  <div class="content-right">
    <h4>Content Right</h4>

    <div class="content-right-placeholder">
    <?php if(count($content_right_titles[0]) > 0): foreach($content_right_titles[0] as $i => $title): ?>

      <div>
        <p>
          <input
            type="text"
            name="content_right_titles[]"
            placeholder="Title"
            value="<?php echo $title ?>"
            style="height: 35px; width: 100%;"
          />
        </p>

        <p>
          <input
            type="text"
            name="content_right_texts[]"
            placeholder="content"
            value="<?php echo $content_right_texts[0][$i] ?>"
            style="height: 35px; width: 100%;"
          />
        </p>
          <button class="button remove-content-right">remove</button>
      </div>
    <?php endforeach; endif; ?>
    </div>

    <p>
      <button class="button add-content-right">Add</button>
    </p>

  </div>

  <div class="content-bottom-col-1">
    <h4>Content bottom col 1</h4>
    <div class="content-bottom-col-1-placeholder">
      <?php if(count($content_bottom_col1[0]) > 0): foreach($content_bottom_col1[0] as $i => $col1): ?>

        <div>
          <p>
            <input
              type="text"
              name="content_bottom_col1[]"
              placeholder="Title"
              value="<?php echo $col1 ?>"
              style="height: 35px; width: 100%;"
            />
          </p>
            <button class="button remove-content-bottom-col-1">remove</button>
        </div>
      <?php endforeach; endif; ?>

    </div>
        <button class="button add-content-bottom-col-1">Add</button>
  </div>

  <div class="content-bottom-col-2">
    <h4>Content bottom col 2</h4>
    <div class="content-bottom-col-2-placeholder">
      <?php if(count($content_bottom_col2[0]) > 0): foreach($content_bottom_col2[0] as $i => $col1): ?>

        <div>
          <p>
            <input
              type="text"
              name="content_bottom_col2[]"
              placeholder="Title"
              value="<?php echo $col1 ?>"
              style="height: 35px; width: 100%;"
            />
          </p>
          <p><button class="button remove-content-bottom-col-2 button-danger">remove</button></p>

        </div>
      <?php endforeach; endif; ?>

    </div>
    <button class="button add-content-bottom-col-2">Add</button>
  </div>

  <div class="content-bottom-col-3">
    <h4>Content bottom col 3</h4>
    <div class="content-bottom-col-3-placeholder">
      <?php if(count($content_bottom_col3[0]) > 0): foreach($content_bottom_col3[0] as $i => $col1): ?>

        <div>
          <p>
            <input
              type="text"
              name="content_bottom_col3[]"
              placeholder="Title"
              value="<?php echo $col1 ?>"
              style="height: 35px; width: 100%;"
            />
          </p>
          <p>
            <button class="button remove-content-bottom-col-3">remove</button>
          </p>

        </div>
      <?php endforeach; endif; ?>

    </div>
    <button class="button add-content-bottom-col-3">Add</button>
  </div>

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

const contentRightTemplate = `
<div>
  <p>
    <input
      type="text"
      name="content_right_titles[]"
      placeholder="Title"
      value=""
      style="height: 35px; width: 100%;"
    />
  </p>

  <p>
    <input
      type="text"
      name="content_right_texts[]"
      placeholder="content"
      value=""
      style="height: 35px; width: 100%;"
    />
  </p>
    <button class="button remove-content-right">remove</button>
</div>
`;

jQuery(document).on('click', '.remove-content-right', function(e) {
  e.preventDefault();
  console.log(jQuery(this), jQuery(this).parent());
  jQuery(this).parent().remove();
})

  jQuery('.add-content-right').on('click', function(e) {
    e.preventDefault();
    jQuery('.content-right-placeholder').append(contentRightTemplate);
  });

  const contentButtomTemplate = num => `
  <div>
    <p>
      <input
        type="text"
        name="content_bottom_col${num}[]"
        placeholder="Title"
        value=""
        style="height: 35px; width: 100%;"
      />
    </p>
      <button class="button remove-content-bottom-col-${num}">remove</button>
  </div>
  `;

    jQuery('.add-content-bottom-col-1').on('click', function(e) {
      e.preventDefault();
      jQuery('.content-bottom-col-1-placeholder').append(contentButtomTemplate('1'));
    })

    jQuery(document).on('click', '.remove-content-bottom-col-1', function(e) {
      e.preventDefault();
      jQuery(this).parent().remove();
    })

    jQuery('.add-content-bottom-col-2').on('click', function(e) {
      e.preventDefault();
      jQuery('.content-bottom-col-2-placeholder').append(contentButtomTemplate('2'));
    })

    jQuery(document).on('click', '.remove-content-bottom-col-2', function(e) {
      e.preventDefault();
      jQuery(this).parent().remove();
    })


    jQuery('.add-content-bottom-col-3').on('click', function(e) {
      e.preventDefault();
      jQuery('.content-bottom-col-3-placeholder').append(contentButtomTemplate('3'));
    })

    jQuery(document).on('click', '.remove-content-bottom-col-3', function(e) {
      e.preventDefault();
      jQuery(this).parent().remove();
    })


</script>
<?php
} //end bs_page_image_square_cb


function ps_save_video_thumb_meta($post_id) {
  update_meta_field(array(
    'field_key' => 'video_url_key',
    'field_name' => 'video_url',
    'post_id' => $post_id
  ));

  update_meta_field(array(
    'field_key' => 'video_thumb_key',
    'field_name' => 'video_thumb',
    'post_id' => $post_id
  ));

  update_meta_field(array(
    'field_key' => 'content_right_titles_key',
    'field_name' => 'content_right_titles',
    'post_id' => $post_id
  ));

  update_meta_field(array(
    'field_key' => 'content_right_texts_key',
    'field_name' => 'content_right_texts',
    'post_id' => $post_id
  ));


  update_meta_field(array(
    'field_key' => 'client_name_key',
    'field_name' => 'client_name',
    'post_id' => $post_id
  ));

  update_meta_field(array(
    'field_key' => 'content_bottom_col1_key',
    'field_name' => 'content_bottom_col1',
    'post_id' => $post_id
  ));

  update_meta_field(array(
    'field_key' => 'content_bottom_col2_key',
    'field_name' => 'content_bottom_col2',
    'post_id' => $post_id
  ));

  update_meta_field(array(
    'field_key' => 'content_bottom_col3_key',
    'field_name' => 'content_bottom_col3',
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
