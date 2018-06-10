    <div class="sidebar">
        <div class="vidget">
            <?php if(!function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Sidebar' )) : ?>
                <p>
                    Текст если не назначены виджеты
                </p>
            <?php endif; ?>
        </div>
    </div>
