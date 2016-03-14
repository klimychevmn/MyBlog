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
        $sel = mysqli_prepare($link,"INSERT INTO comment(entry_id, author, date, content) VALUES(?, ?, ?, ?)");
        $date = date('Y-m-d H:i:s');
        $sel->bind_param('isss',$_POST['entry_id'], $_POST['author'], $date, $_POST['content']);
        if($sel->execute()) {
            header('Location: ?act=view-entry&id=' . intval($_POST['entry_id']));
        } else {
            die("Cannot insert entry");
        }
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
