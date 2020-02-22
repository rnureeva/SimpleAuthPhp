<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/main_menu.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/functionCreator.php');
if(!isAuthUser() && (($_SERVER['REQUEST_URI']) != '/?login=yes')) {
    header('Location: /?login=yes');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>Project - ведение списков</title>
</head>

<body>

    <div class="header">
        <div class="logo"><img src="/i/logo.png" width="68" height="23" alt="Project"></div>
        <div class="clearfix"></div>
    </div>
    <ul class="link-type">
        <? if (!isAuthUser()): ?>
        <li><a href="/?login=yes">Авторизация</a></li>
        <? elseif (isAuthUser()): ?>
        <li><a href="/?chao" >Выйти</a></li>
     <? endif; ?>
    </ul>
    <div class="clear">
            <?php
            functionCreator($array, "main-menu", $sort = SORT_ASC);
            ?>
    </div>