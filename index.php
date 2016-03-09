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
        $records = array();
        $sel = $mysqli->query('SELECT * FROM entry');
        while ($row = $sel->fetch_assoc()) {
            $row['date'] = date('Y-m-d H:i:s', $row['date']);
            if(mb_strlen($row['content']) > 100) {
                $row['content'] = mb_substr(strip_tags($row['content']),0,97) . '...';
            }
            $row['content'] = nl2br($row['content']);
            $records[] = $row;
        }
        require('templates/list.php');
        break;
    case 'view-entry':
        if (!isset($_GET['id'])) die("Missing id parameter");
        $id = intval($_GET['id']);

        $row = $mysqli->query("SELECT * FROM entry where id = $id")->fetch_assoc();
        if(!$row) die("No such entry!");

        $row['date'] = date('Y-m-d H:i:s', $row['date']);
        $row['content'] = nl2br($row['content']);
        $row['header'] = htmlspecialchars($row['header']);

        require('templates/entry.php');
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
