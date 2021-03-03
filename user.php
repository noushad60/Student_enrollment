<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'enrollment';

$link = mysqli_connect($host, $user, $password, $database);
if (!$link) {
    die('connection fail' . mysqli_error($link));
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = $_POST['user'];

    $sql = "INSERT INTO login (username,password,user_type) VALUES ('$username','$password','$user')";
    mysqli_query($link, $sql);
}
session_start();
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    </head>
    <body>
        <div style="width: 100%; height: 100%;">
            <div class="row">
                <div class="col-3 header_height "style="background-color: #9a0404 ; border-color:#9a0404;">
                    <a class="logo" href="dashboard.php"><img src="images/IST.png" width="70%" height="90%" alt="IST" /></a>

                </div>
                <div class="col-9 header_height " style="background-color: #9a0404; border-color:#9a0404; ">

                    <div style="margin-top: 10px; margin-left: 700px; float: left;"><h3 style=" color: white;"><?php echo $_SESSION['username']; ?></h3></div>
                    <div style=" margin-left:760px;  margin-top: 10px;"><a style=" text-decoration: none;font-style: initial; color: #5bb5af;font-size: 20px;" href="index.php"><b>| Logout</b></a></div>
                    <div style="font-size: 25px; margin-top:   15px;"><h1 style="color: #F68712;">Institute of Science and Technology</h1></div>
                </div>
            </div>
            <!--            <div class="row">
                            <div class="col-12 menu_height">
                                                </div>
                        </div>-->
            <div class="row">
                <div class="col-2 content_height background-2">
                    <ul>
                        <li class="li"><a class="a" href="dashboard.php">Dashboard</a></li>
                        <li class="li" ><a class="a" href="Add_Student.php" >Add Student</a></li>
                        <li class="li" ><a class="a" href="student_info.php">Student Information</a></li>
                        <?php if ($_SESSION['user_type'] == 'admin') { ?>
                            <li class="li" ><a class="a" href="#">Admission Department<span class="sub_arrow"></span> </a>
                                <ul>
                                    <li class="li1"><a class="a1" href="add_staff.php">Add Staff</a></li>
                                    <li class="li1"><a class="a1" href="staff_information.php">Staff Information</a></li>
                                    <li class="li1"><a class="a1" href="user.php">User</a></li>
                                </ul>
                            </li>
                        <?php } ?>

                    </ul>

                </div>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="col-9 content_height "style="background-color: #d6f8f8;">
                        <h2 style="text-align: center; margin-top: 50px;">Add New User</h2>
                        <table style="margin-left: 300px; margin-top: 100px;">
                            <tr>
                                <td><h3>username</h3></td>
                                <td><input style="margin-left: 30px; height: 40px; width: 200px;" type="text" name="username"></td>
                            </tr>
                            <tr>
                                <td><h3 style="margin-top: 10px;">Password</h3></td>
                                <td><input style="margin-left: 30px;margin-top: 10px; height: 40px; width: 200px;" type="text" name="password"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <select name="user" style="margin-left: 150px; width: 80px; height: 40px; margin-top: 10px;">
                                        <option>User</option>
                                        <option>admin</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input style="margin-top: 15px; margin-left: 130px; width: 100px; height: 40px;" type="submit" name="submit" value="Submit"></td>
                            </tr>
                        </table>

                    </div>
                </form>

                <div class="col-1 content_height" style="background-color: #9a0404; border-color:#9a0404; "></div>
            </div>

            <div class="row">
                <div class="col-12 footer_height "style="background-color:  #888888"></div>
            </div>
        </div>

    </body>
</html>
