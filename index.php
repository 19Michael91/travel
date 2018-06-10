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
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                        <?php the_excerpt(); ?>
                        <p><a href="<?php the_permalink(); ?>">Читать далее</a></p>
                        <p><?php the_tags(); ?></p>
                    </div>
                </div> <!-- .post-main --> <!-- End post -->
            <?php endwhile; ?>

            <div class="nav">
                <?php posts_nav_link(); ?>
            </div>

        <?php endif; ?>

    </div>

<?php

    get_sidebar();

    get_footer();

?>
