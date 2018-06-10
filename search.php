<?php

    get_header();

    get_sidebar();

?>
    <div class="content">

      <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
              <div class="post_main"> <!-- Start post -->
                  <h1>
                      <a href="<?php the_permalink(); ?>">
                          <?php the_title();?>
                      </a>
                      <span>
                          <?php the_date_xml(); ?>
                      </span>
                  </h1>
                  <div class="post">
                      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                      <?php the_excerpt(); ?>
                  </div>
          <?php endwhile; ?>
          <div class="nav">
              <?php previous_post_link( '%link &nbsp;&nbsp;' ); ?>
              <?php next_post_link( '%link' ); ?>
          </div>
      <?php else : ?>
          <div class="post_main"> <!-- Start post -->
              <h1>По запросу ничего не найдено.</h1>
              <div class="post">
                  ERROR 404!!!!!!!!
                  <br />
                  ERROR 404!!!!!!!!
                  <br />
                  ERROR 404!!!!!!!!
              </div>
          </div>
          <div class="nav">
              <?php previous_post_link( '%link &nbsp;&nbsp;' ); ?>
              <?php next_post_link( '%link' ); ?>
          </div>
      <?php endif; ?>
                </div>
<?php

    get_footer();

?>
