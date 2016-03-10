<?php
session_start();
header('Content-type: text/html; charset=UTF-8');
//подключаем БД
$mysqli = new mysqli('localhost', 'blog', 'blog' ) or die('Cannot connect to database');
$mysqli->select_db('myblog') or die('Cannot select database');
$mysqli->set_charset('utf8');
mb_internal_encoding('UTF-8');
//проверяем параметр 'act'
$act = isset($_GET['act']) ? $_GET['act'] : 'list';
//переменная для админа
define('IS_ADMIN', isset($_SESSION['IS_ADMIN']));
//switch для перекидывания по ссылкам
switch ($act) {
    case 'list':
        $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $records = array();
        $pages_result = $mysqli->query("SELECT COUNT(*) AS cnt FROM entry")->fetch_assoc();
        $pages = $pages_result['cnt'];
        $sel = $mysqli->query("SELECT entry.*, count(comment.id) AS comments
              FROM entry
              LEFT JOIN comment ON entry.id = comment.entry_id
              GROUP BY entry.id
              ORDER BY date DESC
              LIMIT $offset,$limit");
        while ($row = $sel->fetch_assoc()) {
            $row['date'] = date('Y-m-d H:i:s', $row['date']);
            if(mb_strlen($row['content']) > 100) {
                $row['content'] = mb_substr(strip_tags($row['content']),0,97) . '...';
            }
            $row['content'] = nl2br($row['content']);
            $row['header'] = htmlspecialchars($row['header']);
            $records[] = $row;
        }
        require('templates/list.php');
        break;
    case 'view-entry':
        if (!isset($_GET['id'])) die("Missing id parameter");
        $id = intval($_GET['id']);

        $ENTRY = $mysqli->query("SELECT * FROM entry where id = $id")->fetch_assoc();
        if(!$ENTRY) die("No such entry!");

        $ENTRY['date'] = date('Y-m-d H:i:s', $ENTRY['date']);
        $ENTRY['content'] = nl2br($ENTRY['content']);
        $ENTRY['header'] = htmlspecialchars($ENTRY['header']);

        $comments = array();
        $sel = $mysqli->query("SELECT * FROM comment where entry_id = $id ORDER BY date ");
        while ($row = $sel->fetch_assoc()) {
            $row['date'] = date('Y-m-d H:i:s', $row['date']);
            $row['content'] = nl2br(htmlspecialchars($row['content']));
            $row['author'] = htmlspecialchars($row['author']);
            $comments[] = $row;
        }

        require('templates/entry.php');
        break;
    case 'do-new-entry':
        if(!IS_ADMIN) die('You must be admin to add entry');
        $sel = $mysqli->prepare("INSERT INTO entry(author, date, header, content) VALUES(?, ?, ?, ?)");
        $time = time();
        $sel->bind_param('siss', $_POST['author'], $time, $_POST['header'], $_POST['content']);
        if($sel->execute()) {
            header('Location: .');
        } else {
            die("Cannot insert entry");
        }

        break;
    case 'do-new-comment':
        $sel = $mysqli->prepare("INSERT INTO comment(entry_id, author, date, content) VALUES(?, ?, ?, ?)");
        $time = time();
        $sel->bind_param('isis',$_POST['entry_id'], $_POST['author'], $time, $_POST['content']);
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
            $_SESSION['IS_ADMIN'] = true;
            header('Location: .');
        } else {
            header('Location: ?act=login');
        };
        break;
    case 'logout':
        unset($_SESSION['IS_ADMIN']);
        header('Location: .');
        break;
    default:
        die("No such action");
}
