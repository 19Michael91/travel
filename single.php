<?php

    get_header();

    get_sidebar();

?>
    <div class="content">

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="post_main"> <!-- Start post -->
                <h1><a href="<?php the_permalink(); ?>"><?php the_title();?></a> <span><?php the_date_xml(); ?></span></h1>
                <div class="post">
                    <?php the_content(); ?>
                    <hr />
                    <?php comments_template(); ?>
                </div>
            <?php endwhile; ?>
            <div class="nav">
              <?php previous_post_link( '%link &nbsp;&nbsp;' ); ?>
              <?php next_post_link( '%link' ); ?>
            </div>
        <?php endif; ?>
                </div>

<?php

get_footer();

?>
