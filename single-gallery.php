<?php
// Template Name: Single Gallery
// Template Post Type: gallery

    get_header();

    get_sidebar();

        $post = get_post( get_the_ID() );
        $post_images_url = array();
        $post_images_url = $post->custom_image_data;
        // var_dump($post);
        // var_dump($post->custom_image_data);
        // echo gettype($post->custom_image_data).'<br />';
?>
<div class="popup-gallery">
            <?php
                foreach ($post_images_url as $key => $value) {
                    echo '
                          <div class="single_gallery_div">
                              <a href="'.$value.'" style="text-decoration: none;">
                                <img src="'.$value.'" width="100%">
                              </a>
                          </div>
                         ';
                }
            ?>
        </div>

<?php

    get_sidebar();

    get_footer();

?>
