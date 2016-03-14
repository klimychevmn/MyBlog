<?php

require_once('../database.php');
require_once('../models/articles.php');

$link = db_connect();

$action = isset($_GET['action']) ? $_GET['action'] : '';


if($action == "add") {
    $article = [
        'title'=>'',
        'content'=>''
    ];
    if(!empty($_POST)){
        articles_new($link, $_POST['title'], $_POST['date'], $_POST['content']);
        header("Location: index.php");
    }
    include('../templates/admin/article_admin.php');
} elseif($action == "edit") {
    if(!isset($_GET['id'])){
        header('Location: index.php');
    }
    $id = (int)$_GET['id'];

    if(!empty($_POST) && $id > 0) {
        articles_edit($link, $id, $_POST['title'], $_POST['date'], $_POST['content'], $_POST['author']);
        header('Location: index.php');
    }

    $article = articles_get($link, $id);
    include('../templates/admin/article_admin.php');

} elseif($action == "delete") {
    $id = $_GET['id'];
    $article = articles_delete($link, $id);
    header('Location: index.php');

} else {
    $articles = articles_all($link);

    include('../templates/admin/articles_admin.php');
}


