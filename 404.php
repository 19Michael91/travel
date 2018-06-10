<?php

    get_header();

    get_sidebar();

?>
    <div class="content">
          <div class="post_main"> <!-- Start post -->
            <h1>Здесь ничего нет.</h1>
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
    </div>
<?php

    get_footer();

?>
