<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ИС - Окно администратора</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Привет, <?php echo $_SESSION['username']; ?>!</p>
        <p>Вы вошли в информационную систему под пользователем "Администратор".</p>
        <p><a href="database1.php">Открыть базу данных "Магазин"</a></p>
        <p><a href="logout.php">Выйти</a></p>
    </div>
</body>
</html>
