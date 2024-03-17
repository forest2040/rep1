<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Records</title>
    <style>
        table{
            width: 70%;
            margin: auto;
            font-family: Arial, Helvetica, sans-serif;
        }
        table, tr, th, td{
            border: 1px solid #d4d4d4;
            border-collapse: collapse;
            padding: 12px;
        }
        th, td{
            text-align: left;
            vertical-align: top;
        }
        tr:nth-child(even){
            background-color: #e7e9eb;
        }
    </style>
<body>
      
<?php
    //storing database details in variables.
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "LoginSystem";

    //Создание подключения к базе данных
    $con = mysqli_connect($hostname, $username, $password, $dbname);
    //Проверка состояния подключения
    if(!$con)
    {
        die("При подключении произошла ошибка!" . mysqli_connect_error());
    }
    else 
    {
        echo "Вы успешно подключились! <br>";
    }
    //SELECT
    $sql = "SELECT id, username, email, password, create_datetime FROM users";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0)
    {
       echo '<table> <tr> <th> Id </th> <th> Name </th> <th> Email </th> <th> Password </th> <th> Datetime </th> </tr>';
       while($row = mysqli_fetch_assoc($result)){
           echo '<tr > <td>' . $row["id"] . '</td>
           <td>' . $row["username"] . '</td>
           <td> ' . $row["email"] . '</td>
           <td> ' . $row["password"] . '</td>
           <td>' . $row["create_datetime"] . '</td> </tr>';
       }
       echo '</table>';
    }
    else
    {
        echo "0 results";
    }
    // Закрытие подключения
    mysqli_close($con);

?>
 <div class="form">
		<p><a href="dashboard1.php">Вернуться в профиль "Администратор"</a></p>
        <p><a href="logout.php">Выйти</a></p>
    </div>
</body>
</html>