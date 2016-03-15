<?php
require_once("database.php");
require_once("models/articles.php");
header('Content-type: text/html; charset=UTF-8');
//подключаем БД
$link = db_connect();

//проверяем параметр 'act'
$act = isset($_GET['act']) ? $_GET['act'] : 'list';
//switch для перекидывания по ссылкам
switch ($act) {
    case 'list':
        $articles = articles_all_with_comments($link);
        require('templates/list.php');
        break;

    case 'view-entry':
        if (!isset($_GET['id'])) die("Missing id parameter");
        $id = intval($_GET['id']);

        $ENTRY = mysqli_query($link,"SELECT COUNT(*) AS cnt FROM articles")->fetch_assoc();
        if(!$ENTRY) die("No such entry!");

        $articles = articles_get($link, $id);

        $comments = array();
        $sel = mysqli_query($link,"SELECT * FROM comment where entry_id = $id ORDER BY date ");
        while ($row = $sel->fetch_assoc()) {
            $row['content'] = nl2br(htmlspecialchars($row['content']));
            $row['author'] = htmlspecialchars($row['author']);
            $comments[] = $row;
        }
        require('templates/entry.php');
        break;

    case 'do-new-comment':
        if(!empty($_POST)){
            comment_new($link, $_POST['entry_id'], $_POST['author'], $_POST['content']);
            header("Location: index.php?act=view-entry&id=" . $_POST['entry_id']);
        } else {
            die("Cannot insert entry");
        }
        break;

    case 'forma':
        require('templates/form.php');
        break;

    case 'do-new-forma':
        if(!empty($_POST)){
            row_form_new($link, $_POST['lastname'], $_POST['firstname'], $_POST['phone'], $_POST['email'], $_POST['content']);
            header("Location: index.php");
        }
        include('templates/list.php');
        break;

    case 'login':
        require('templates/login.php');
        break;

    case 'do-login':
        if($_POST['login'] == 'login' && $_POST['password'] == 'password') {
            header('Location: admin');
        } else {
            header('Location: ?act=login');
        };
        break;

    case 'logout':
        header('Location: .');
        break;
    default:
        require('templates/404.php');
        break;
}
