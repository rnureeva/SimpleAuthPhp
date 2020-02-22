<?php
session_start();
$_SESSION['auth_user'] = false;
$error = false;
$success = false;
if (isset($_POST['send'])) {
    require_once ($_SERVER['DOCUMENT_ROOT'].'/login.php');
    require_once ($_SERVER['DOCUMENT_ROOT'].'/password.php');
    $index = array_search($_POST['login'],$login);
    if($index !== false && $password[$index] == $_POST['password']) {
        $success = true;
        $_SESSION['auth_user'] = true;
        $_SESSION['login '] = $_POST["login"];
        setcookie("login", $_POST["login"], time()+60*60*24*31, '/');
    } else {
        $error = true;
    }
if (isset($_GET['chao'])) {
session_unset();
session_destroy();
unset($_SESSION['auth_user']);
setcookie("login", $_POST["login"], time()-60, '/');
header('Location: /?login=yes');
}
}
require ($_SERVER['DOCUMENT_ROOT'].'/template/header.php');
?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">
            
                <h1>Возможности проекта —</h1>
                <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>
                
            
            </td>
            <td class="right-collum-index">
                
                <? if (isset($_GET['login']) == 'yes' || $error == true): ?>
                 <div class="project-folders-menu">
                    <ul class="project-folders-v">
                        <li class="project-folders-v-active"><a href="#">Авторизация</a></li>
                        <li><a href="#">Регистрация</a></li>
                        <li><a href="#">Забыли пароль?</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                
                <div class="index-auth">
                    <form action="/" method="post">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="iat" <?= (!isset($_COOKIE["login"])) ? '': 'hidden' ?>
                                    <label for="login_id">Ваш e-mail:</label>
                                    <input id="login_id" size="30" name="login" value="<?=$_COOKIE["login"] ?? ""?>" >
                                </td>
                            </tr>
                            <tr>
                                <td class="iat">
                                    <label for="password_id">Ваш пароль:</label>
                                    <input id="password_id" size="30" name="password" type="password" value="<?=$_POST['password'] ?? ""?>" >
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Войти" name="send"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            <? endif; ?>
            <?php if ($error) {
                require_once ($_SERVER['DOCUMENT_ROOT'].'/include/error.php');
            } elseif ($success) {
                require_once ($_SERVER['DOCUMENT_ROOT'].'/include/success.php');
            }
            ?>
            </td>
        </tr>
    </table>
    
<?php require ($_SERVER['DOCUMENT_ROOT'].'/template/footer.php'); ?>