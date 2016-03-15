<?php

require_once('../database.php');
require_once('../models/articles.php');

$link = db_connect();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action) {
    case 'add':
        $article = [
            'title'=>'',
            'content'=>''
        ];
        if(!empty($_POST)){
            articles_new($link, $_POST['title'], $_POST['date'], $_POST['content']);
            header("Location: index.php");
        }
        include('../templates/admin/article_admin.php');
        break;
    case 'edit':
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
        break;
    case 'delete':
        $id = $_GET['id'];
        $article = articles_delete($link, $id);
        header('Location: index.php');
        break;
    case 'forma':
        $articles = forma_all($link);
        include('../templates/admin/form_admin.php');
        break;
    case 'form_delete':
        $id = (int)$_GET['id'];
        $articles = row_form_delete($link,$id);
        header('Location: index.php?action=forma');
        break;
    case 'comments':
        $articles = comments_all($link);

        include('../templates/admin/comment_admin.php');
        break;
    case 'comment_delete':
        $id = (int)$_GET['id'];
        $articles = comment_delete($link,$id);
        header('Location: index.php?action=comments');
        break;
    default:
        $articles = articles_all($link);

        include('../templates/admin/articles_admin.php');
        break;
}
