<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'enrollment';

$link = mysqli_connect($host, $user, $password, $database);
if (!$link) {
    die('connection fail' . mysqli_error($link));
}
$sms='';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($link, $sql);
    $rows = mysqli_fetch_assoc($result);
    if ($rows['username']) {
        session_start();
        $_SESSION['username'] = $rows['username'];
        $_SESSION['id'] = $rows['id'];
        $_SESSION['user_type'] = $rows['user_type'];
        header('location: dashboard.php');
    } else {
        $sms="username and password invalid";
    }
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">


    </head>
    <body>
        <div style="background-color: #c4fdfd; height: 900px; width: 100%; border: 1px solid; ">
            <div style="background-color: #c4fdfd; height: 20%; width: 15%; margin-left: 500px; margin-top: 100px;">
                <img style="width: 100%; height: 100%;" src="images/IST.png">
            </div>
            <div style="background-color: #98c9f9; height: 40%; width: 40%; margin-left: 350px; border-radius: 80px;">
                
                <form method="post" action="">
                    <table>
                        
                        <tr>
                            <td><h2 style="text-align: center; margin-top: 20px; margin-left: 80px; color: #ff838e;"><?php echo $sms; ?></h2></td>
                        </tr>
                        <tr>
                            <td><input style="height: 40px; width: 250px; margin-left: 120px; margin-top: 80px; border-radius: 10px;" type="text" name="username" placeholder="Username"></td>
                        </tr>
                        <tr>
                            <td><input style="height: 40px; width: 250px; margin-left: 120px; margin-top: 20px; border-radius: 10px;" type="password" name="password" placeholder="Password"></td>
                        </tr>
                        <tr>
                            <td><input style="height: 40px; width: 100px; margin-left: 270px; margin-top: 20px; border-radius: 10px;" type="submit" name="login" value="LOGIN"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </body>
</html>
