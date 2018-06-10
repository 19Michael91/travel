<?php

    if (function_exists( 'register_sidebar' ))
        register_sidebar(array('name' => 'Sidebar'));
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size(166, 124, TRUE);


    function register_admin_scripts() {
        wp_enqueue_style("style_1",get_stylesheet_directory_uri()."/admin_style.css");
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'main_js', get_stylesheet_directory_uri() . '/js/gallery.js' );
        wp_localize_script( 'main_js', 'customUploads', array( 'imageData' => get_post_meta( get_the_ID(), 'save_custom_image', true ) ) );
    }
    add_action( 'admin_enqueue_scripts', 'register_admin_scripts' );

    function register_content_scripts() {
        wp_enqueue_style("magnific_popup_style",get_stylesheet_directory_uri()."/libs/magnific-popup.css");
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'magnific_popup_js', get_stylesheet_directory_uri() . '/libs/jquery.magnific-popup.min.js',array( 'jquery' ) );
        wp_enqueue_script( 'main_js', get_stylesheet_directory_uri() . '/js/slider.js' );
    }
    add_action( 'wp_enqueue_scripts', 'register_content_scripts' );


    add_action('init', 'my_custom_init');
    function my_custom_init(){
        register_post_type('gallery', array(
            'labels'             => array(
                'name'               => 'Фотогалереи', // Основное название типа записи
                'singular_name'      => 'Фотогалерея', // отдельное название записи типа gallery
                'add_new'            => 'Добавить новую',
                'add_new_item'       => 'Добавить новую фотогалерею',
                'edit_item'          => 'Редактировать фотогалерею',
                'new_item'           => 'Новая фотогалерея',
                'view_item'          => 'Посмотреть фотогалерею',
                'search_items'       => 'Найти фотогалерею',
                'not_found'          =>  'Фотогалерей не найдено',
                'not_found_in_trash' => 'В корзине фотогалерей не найдено',
                'parent_item_colon'  => '',
                'menu_name'          => 'Фотогалереи'
            ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_admin_bar'  => true,
            'menu_position'      => 6,
            'menu_icon'          => 'dashicons-format-gallery',
            'query_var'          => true,
            'rewrite'            => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title','thumbnail' ) // 'title','editor','author','thumbnail','excerpt','comments'
          )
       );
    }


    function newTheme_add_custom_metabox()
    {
        add_meta_box(
            'newTheme_meta',
            'Фотогалерея',
            'newTheme_meta_callback',
            'gallery',
            'normal',
            'high'
        );
    }
    add_action('add_meta_boxes', 'newTheme_add_custom_metabox');


    function newTheme_meta_callback( $post ){
        wp_nonce_field( basename( __FILE__ ), 'custom_image_nonce');
        echo '<div class="global_div">';
            $post_id = get_the_ID();
            $post_array = get_post_meta( $post_id, 'custom_image_data', true);
            echo '<br> post_id = '. $post_id;
            echo '<br>';
            if(!empty($post_array)) {
                foreach ($post_array as $key => $value1) {
                  $js_on = $value1;
                  //print_r($js_on) . '<br />';
                  echo  '<div class="con_teiner">
                             <div class="photo_1 glob_photo">
                                 <span class="photo_number">Photo</span>
                                 <span class="photo_header">
                                     <a href="#" class="img_more hold_on">&#9660;</a>';
                                       if($key != 0){
                                           echo '<a href="#" class="img_close hold_on">&#215;</a>';
                                       }
                           echo '</span>
                             </div>
                             <div class="upload_field">
                                 <img class="image-tag" src="'. $js_on .'" style="width:100%;">

                                 <input type="hidden" class="img-hidden-field" value="'. $js_on .'" name="custom_image_data[]">

                                 <input type="button" class="button image-upload-button" value="Add Image">
                                 <input type="button" class="button image-delete-button" id="image-delete-button" value="Remove Image">
                             </div>
                         </div>
                         <br />';
                }
            } else {
                echo  '<div class="con_teiner">
                             <div class="photo_1 glob_photo">
                                 <span class="photo_number">Photo</span>
                                 <span class="photo_header">
                                     <a href="#" class="img_more hold_on">&#9660;</a>
                                 </span>
                             </div>
                             <div class="upload_field">
                                 <img class="image-tag" src="" style="width:100%; border: none;">

                                 <input type="hidden" class="img-hidden-field" value="" name="custom_image_data[]">

                                 <input type="button" class="button image-upload-button" value="Add Image">
                                 <input type="button" class="button image-delete-button" id="image-delete-button" value="Remove Image">
                             </div>
                         </div>
                         <br />';
            }
        echo '</div>';
?>
        <button class="add_photo_button">Add_gallery</button>
<?php
    }


    function save_custom_image( $post_id ) {
        if ( isset( $_POST[ 'custom_image_data' ] ) ) {
            $image_data = $_POST[ 'custom_image_data' ] ;
            update_post_meta( $post_id, 'custom_image_data', $image_data);
        } else {
            update_post_meta( $post_id, 'custom_image_data', '');
        }
    }
    add_action( 'save_post', 'save_custom_image' );
