<?php require 'components/db.php'; ?>
<?php $article = get_article_by_id($_GET['id']); ?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $article["title"]; ?></title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="news">
            <div class="header">
                <div class="header_title">
                    <h1 class="header_title2"><?php echo $article["title"]; ?></h1>
                </div>
                <div class="line">
                    <hr class="line_dashed">
                </div>
            </div>
            <div class="main for_main">
                <div class="main_text"><?php echo $article["content"]; ?>
                </div>
            </div>
            <div class="for_footer">
                <div class="line">
                    <hr class="line_dashed">
                </div>
                <div class="footer_back">
                    <a class="footer_link" href="index.php">Все новости >> </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>