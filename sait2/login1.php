<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Авторизация в ИС</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query    = "SELECT * FROM `admin` WHERE username='$username'
                     AND password='" . ($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            header("Location: dashboard1.php");
        } else {
            echo "<div class='form'>
                  <h3>Неравильный логин или пароль.</h3><br/>
                  <p class='link'>Нажмите здесь <a href='login1.php'>Логин</a> чтобы попробовать снова.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Авторизация в профиль "Администратор"</h1>
        <input type="text" class="login-input" name="username" placeholder="Логин" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Пароль"/>
        <input type="submit" value="Авторизация" name="submit" class="login-button"/>
        <p class="link">Авторизоваться как клиент <a href="login.php">Перейти</a></p>
  </form>
<?php
    }
?>
</body>
</html>
