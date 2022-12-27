<?php
$dbhost = "localhost";
$dbname = "news1";
$username = "root";
$password = "";
$db = new PDO("mysql:host=$dbhost; dbname=$dbname", $username, $password);

/*ф-ция, получающая таблицу из БД*/
function get_news_all()
{
    global $db;
    $news = $db->query("SELECT * FROM news ORDER BY `idate` DESC");
    return $news;
}

/*ф-ция, получающая статью по её id*/
function get_article_by_id($id)
{
    global $db;
    if (!$id) {
        $id = 1;
    }
    $articles = $db->query("SELECT * FROM news WHERE id = $id");
    foreach ($articles as $article) {
        return $article;
    }
}

/*Функция, получающая часть таблицы */
$number_of_articles_on_page = 5; //число статей на странице
$jump_over_why_numbers_of_articles = 0; //кол-во пропускаемых статей в БД
$page = 1; //номер 1й страницы
if (!is_numeric($page)) $page = 1;
if ($page < 1) $page = 1;

$sth = $db->query("SELECT SQL_CALC_FOUND_ROWS * FROM `news` ORDER BY `id`"); //всего статей
$sth = $db->prepare('SELECT FOUND_ROWS()');
$sth->execute();
$number_of_articles = $sth->fetch(PDO::FETCH_COLUMN);

$number_of_articles_all = ceil($number_of_articles / $number_of_articles_on_page);

function get_news_part()
{
    global $db;
    global $number_of_articles_on_page;
    global $jump_over_why_numbers_of_articles;
    $news = $db->query("SELECT * FROM news ORDER BY `idate` DESC LIMIT $jump_over_why_numbers_of_articles,$number_of_articles_on_page ");
    return $news;
}
