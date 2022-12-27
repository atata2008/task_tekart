<?php require 'components/db.php'; ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">
        <div class="news">
            <div class="header">
                <div class="header_title">
                    <h1>Новости</h1>
                </div>
                <div class="line">
                    <hr class="line_dashed">
                </div>
            </div>
            <div class="main">
                <?php
                if (!isset($_GET['page'])) $page = 1;
                else $page = $_GET['page'];
                if ($page > 1) $jump_over_why_numbers_of_articles = ($page - 1) * $number_of_articles_on_page;
                $articles = get_news_part();
                foreach ($articles as $article) : ?>
                    <div class="news_piece">
                        <div class="news_piece-data"><?php echo date('d/m/Y', $article["idate"]); ?></div>
                        <div class="news_piece-title">
                            <a class="news_piece-link" href="one-news.php?id=<?php echo $article["id"]; ?>"><?php echo $article["title"]; ?></a>
                        </div>
                        <div class="news_announce"><?php echo $article["announce"]; ?></div>
                    </div>
                <?php endforeach ?>
            </div>

            <div class="footer">
                <div class="line">
                    <hr class="line_dashed">
                </div>
                <div class="footer_title">
                    <p class="footer_title-name">Страницы:</p>
                </div>
                <div class="footer_news-pages">
                    <?php $articles = get_news_all();
                    $page = 1;
                    while ($page <= $number_of_articles_all) : ?>
                        <div class="news_pages__number"><a class="news_piece-link" href="index.php?page=<?php echo $page; ?>"><?php echo $page; ?></a></div>
                    <?php
                        $page++;
                    endwhile ?>
                </div>
                <div>
                    <p class="fio">&copy; Av 2022</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>