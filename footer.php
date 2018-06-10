
        <div class="footer">
            <?php wp_footer(); ?>
            <div class="cpy">
                <a href="#"><span>C</span>hoose <span>T</span>ravel</a>
                <p>
                  Choose travel 2017<br />
                  Все права защищены.<br />
                  Email: contact@chooceTravel.ru<br />
                </p>
            </div>
            <div class="menu_foot">
                <?php if(!function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Sidebar' )) : ?>
                  <p>
                    Текст если не назначены виджеты
                  </p>
                <?php endif; ?>
            </div>
            <div class="menu_foot">
                <h2>Страницы</h2>
                <ul>
                    <li><a href="#">Главная</a></li>
                    <li><a href="#">Автор</a></li>
                    <li><a href="#">Контакты</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
