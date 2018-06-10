    <form class="search_main" action="./" method="get">
        <input class="search_txt" type="text" name="s" id="s" value="<?php the_search_query(); ?>"/>
        <input class="search_btn" type="image" src="<?php bloginfo( 'template_url' )?>/images/search.jpg" />
    </form>
