<?php
// Template Name: gallery

    get_header();

    get_sidebar();

        // параметры по умолчанию
        $args = array(
           'post_type'   => 'gallery',
           'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        );

        $posts = get_posts( $args );
        foreach($posts as $post){
            echo '<a href="'.$post->guid.'"><img src="'.get_the_post_thumbnail_url($post->ID).'"></a>';
        }

    get_sidebar();

    get_footer();

?>
