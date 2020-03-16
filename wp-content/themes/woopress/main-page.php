<div class="content-page main-page-container">


    <div class="first-block">
        <div class="field">
            <img src="/wp-content/themes/woopress/images/main-img/monitor.svg" alt="monitor">
            <p>Мгновенные решения</p>
        </div>
        <div class="field">
            <img src="/wp-content/themes/woopress/images/main-img/glasses.svg" alt="glasses">
            <p>Просто и доступно</p>
        </div>
        <div class="field">
            <img src="/wp-content/themes/woopress/images/main-img/book.svg" alt="book">
            <p>Реальные животные</p>
        </div>
    </div>
    <div class="type-of-animals">
        <div class="block-two-column">
            <a href="http://www.veterinary.wiki/category/cats/" id="cats" class="big-img">
                <h4>Коты и кошки</h4>
                <p class="post-link">Статьи ></p>
            </a>
            <div class="block-animals">
                <a href="https://www.veterinary.wiki/category/birds/" id="birds">
                    <h4>Птицы</h4>
                    <p class="post-link">Статьи ></p>
                </a>
                <a href="https://www.veterinary.wiki/category/exotic/" id="exotics">
                    <h4>Экзотика</h4>
                    <p class="post-link">Статьи ></p>
                </a>
            </div>
        </div>
        <div class="block-two-column">
            <div class="block-animals">
                <a href="http://www.veterinary.wiki/%d0%b2%d1%81%d0%b5-%d0%ba%d0%b0%d1%82%d0%b5%d0%b3%d0%be%d1%80%d0%b8%d0%b8/" class="new-type">
                    <h4>Нет вашего животного?</h4>
                    <p class="post-link">Смотреть все ></p>
                </a>
                <a href="http://www.veterinary.wiki/category/rodents/" id="rodents">
                    <h4>Грызуны</h4>
                    <p class="post-link">Статьи ></p>
                </a>
            </div>
            <a href="http://www.veterinary.wiki/category/dogs/" id="dogs" class="big-img">
                <h4>Собаки</h4>
                <p class="post-link">Статьи ></p>
            </a>
        </div>
    </div>
    <div class="flex">
        <div class="sidebar-left-column">
            <h4>Популярные статьи</h4>
            <div style="border: 1px solid #E5E5E5;"></div>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $args = array(
                        'limit' => 5,
                        'excerpt_length' => 50,
                        'excerpt_by_words' => 1,
                        'thumbnail_width' => 255,
                        'thumbnail_height' => 255,
                        'stats_views' => 1,
                        'stats_author' => 1,
                        'stats_date' => 1,
                        'stats_date_format' => 'j F, Y',
                        'post_html' =>
                            '<div class="recent-added-post carousel-item">
                        {thumb}
                        <div class="content-text">
                            <div class="block-right">
                                <h2>{title}</h2>
                                <p>{summary}</p>
                            </div>
                            <div class="block-data-post">
                                <p>Автор: {author}</p>
                                <p>{date}</p>
                            </div>
                            <a class="block-custom" href="{url}">Читать далее ></a>
        
                        </div>
                    </div>'


                    );

                    wpp_get_mostpopular($args);
                    ?>

                </div>
            </div>


        </div>
        <div class="sidebar-right">
            <img src="/wp-content/themes/woopress/images/main-img/right-sidebar.svg" alt="shop">
            <div class="block-doctor">
                <p>Проконсультируйся у нашего специалиста </p>
                <a href="http://www.veterinary.wiki/category/%d0%bd%d0%b0%d1%88%d0%b8-%d0%b2%d1%80%d0%b0%d1%87%d0%b8/">Консультация ></a>
            </div>
        </div>

    </div>
    <h4 >Рекомендованые статьи</h4>
    <div style="border: 1px solid #E5E5E5;"></div>
    <?php randomPosts(); ?>
</div >