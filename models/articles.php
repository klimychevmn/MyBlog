<?php
// working with articles
function articles_all($link)
{
    //Запрос
    $query = "SELECT * FROM articles ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if(!$result) { die(mysqli_error($link)); }

    //Извлечение из БД
    $n = mysqli_num_rows($result);
    $articles = array();

    for($i=0; $i<$n; $i++) {
        $row = mysqli_fetch_assoc($result);
        $articles[] = $row;
    }

    return $articles;

}

function articles_all_with_comments($link)
{
    //Запрос
    $query = "SELECT articles.*, count(comment.id) AS comments
              FROM articles
              LEFT JOIN comment ON articles.id = comment.entry_id
              GROUP BY articles.id
              ORDER BY date DESC";
    $result = mysqli_query($link, $query);

    if(!$result) { die(mysqli_error($link)); }

    //Извлечение из БД
    $n = mysqli_num_rows($result);
    $articles = array();

    for($i=0; $i<$n; $i++) {
        $row = mysqli_fetch_assoc($result);
        $articles[] = $row;
    }

    return $articles;

}


function articles_get($link, $id_article) {

    //Запрос
    $query = sprintf("SELECT * FROM articles WHERE id=%d", (int)$id_article);
    $result = mysqli_query($link, $query);

    if(!$result) { die(mysqli_error($link)); }

    $article = mysqli_fetch_assoc($result);

    return $article;
}

function articles_new($link, $title, $date, $content) {

    //Подготовка
    $title = trim($title);
    $content = trim($content);

    //Проверка
    if($title == "") { return false; }

    //Запрос
    $t = "INSERT INTO articles (title, date, content) VALUES ('%s', '%s', '%s')";

    $query = sprintf($t, mysqli_real_escape_string($link,$title), mysqli_real_escape_string($link, $date), mysqli_real_escape_string($link, $content));


    $result = mysqli_query($link, $query);

    if(!$result) { die(mysqli_error($link)); }

    return true;
}


function articles_edit($link, $id, $title, $date, $content, $author) {
    //Подготовка
    $title = trim($title);
    $content = trim($content);
    $date = trim($date);
    $author = trim($author);
    $id = (int)$id;

    //Проверка
    if($title == '') { return false; }

    //Запрос
    $sql = "UPDATE articles SET title='%s', content='%s', date='%s', author='%s' WHERE id='%d'";

    $query = sprintf($sql, mysqli_real_escape_string($link, $title), mysqli_real_escape_string($link, $content), mysqli_real_escape_string($link, $date),mysqli_real_escape_string($link, $author), $id);

    $result = mysqli_query($link, $query);
    if(!$result) { die(mysqli_error($link)); }

    return mysqli_affected_rows($link);

}

function articles_delete($link, $id) {

    //Подготовка
    $id = (int)$id;
    //Проверка
    if($id == 0) { return false; }

    //Запрос
    $query1 = sprintf("DELETE FROM articles WHERE id='%d'", $id);
    $query2 = sprintf("DELETE FROM comment WHERE entry_id='%d'", $id);
    $result1 = mysqli_query($link, $query1);
    $result2 = mysqli_query($link, $query2);

    if(!$result1) { die(mysqli_error($link)); }
    if(!$result2) { die(mysqli_error($link)); }

    return mysqli_affected_rows($link);
}

function articles_intro($text, $len) {

    $intro = (strlen($text)>=$len) ? mb_substr($text, 0, $len)."......" : mb_substr($text, 0, $len);
    return $intro;
}

// working with comments
function comments_all($link)
{
    //Запрос
    $query = "SELECT * FROM comment ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if(!$result) { die(mysqli_error($link)); }

    //Извлечение из БД
    $n = mysqli_num_rows($result);
    $articles = array();

    for($i=0; $i<$n; $i++) {
        $row = mysqli_fetch_assoc($result);
        $articles[] = $row;
    }

    return $articles;

}
function comment_delete($link, $id) {

    //Подготовка
    $id = (int)$id;
    //Проверка
    if($id == 0) { return false; }

    //Запрос
    $query = sprintf("DELETE FROM comment WHERE id='%d'", $id);
    $result = mysqli_query($link, $query);

    if(!$result) { die(mysqli_error($link)); }

    return mysqli_affected_rows($link);
}
function comment_new($link, $entry_id, $author, $content) {

    //Подготовка
    $author = trim($author);
    $entry_id = trim($entry_id);
    $content = trim($content);
    $date = date('Y-m-d H:i:s');

    //Запрос
    $t = "INSERT INTO comment (entry_id, date, author, content) VALUES ('%s', '%s', '%s', '%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $entry_id), mysqli_real_escape_string($link, $date), mysqli_real_escape_string($link, $author), mysqli_real_escape_string($link, $content));


    $result = mysqli_query($link, $query);

    if(!$result) { die(mysqli_error($link)); }

    return true;
}

//working with form
function forma_all($link)
{
    //Запрос
    $query = "SELECT * FROM form ORDER BY id DESC";
    $result = mysqli_query($link, $query);

    if(!$result) { die(mysqli_error($link)); }

    //Извлечение из БД
    $n = mysqli_num_rows($result);
    $articles = array();

    for($i=0; $i<$n; $i++) {
        $row = mysqli_fetch_assoc($result);
        $articles[] = $row;
    }

    return $articles;

}
function row_form_delete($link, $id) {

    //Подготовка
    $id = (int)$id;
    //Проверка
    if($id == 0) { return false; }

    //Запрос
    $query = sprintf("DELETE FROM form WHERE id='%d'", $id);
    $result = mysqli_query($link, $query);

    if(!$result) { die(mysqli_error($link)); }

    return mysqli_affected_rows($link);
}
function row_form_new($link, $lastname, $firstname, $phone, $email, $content) {

    //Подготовка
    $lastname = trim($lastname);
    $firstname = trim($firstname);
    $phone = (int)$phone;
    $email = trim($email);
    $content = trim($content);
    $date = date('Y-m-d H:i:s');

    //Запрос
    $t = "INSERT INTO form (date, lastname, firstname, phone, email, content) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')";

    $query = sprintf($t, mysqli_real_escape_string($link,$date),
                            mysqli_real_escape_string($link, $lastname),
                            mysqli_real_escape_string($link, $firstname),
                            mysqli_real_escape_string($link, $phone),
                            mysqli_real_escape_string($link, $email),
                            mysqli_real_escape_string($link, $content)
                    );


    $result = mysqli_query($link, $query);

    if(!$result) { die(mysqli_error($link)); }

    return true;
}