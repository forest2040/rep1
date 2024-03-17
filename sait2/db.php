<?php
    $con = mysqli_connect("localhost","root","","LoginSystem");
    if (mysqli_connect_errno()){
        echo "Ошибка подключения к MySql: " . mysqli_connect_error();
    }
?>
