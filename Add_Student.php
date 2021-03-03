<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'enrollment';

$link = mysqli_connect($host, $user, $password, $database);
if (!$link) {
    die('connection fail' . mysqli_error($link));
}
$smg = '';
if (isset($_POST['upload'])) {
    



    $sql = "INSERT INTO add_student (image) Values('$image')";
    mysqli_query($link, $sql);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $roll = $_POST['roll'];
    $image = $_FILES['file']['name'];
    $date_of_birth= $_POST['date_of_birth'];
    $gender= $_POST['gender'];
    $batch_no= $_POST['batch_no'];
    $s_gpa= $_POST['s_gpa'];
    $h_gpa= $_POST['h_gpa'];


    $sql = "INSERT INTO add_student (name, father_name, mother_name, address, phone, department, roll, image, date_of_birth, gender,batch_no, s_gpa, h_gpa) VALUES ('$name','$father_name','$mother_name','$address','$phone','$department','$roll','$image','$date_of_birth','$gender', '$batch_no','$s_gpa','$h_gpa')";
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
                <div class="col-3 header_height " style="background-color: #9a0404 ; border-color:#9a0404;">
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
                        <?php if($_SESSION['user_type']=='admin'){ ?>
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
                    <div class="col-9 content_height " style="background-color: #d6f8f8;">
                        <h2 style="text-align: center; margin-top: 10px;">Fill up This Form</h2>

                        <div style="width: 70%;  height: 90%; margin-top: 20px; float: left; overflow: auto;">
                            <table style="margin: 20px 20px; height: 90%; width: 90%; ">
                                <tr >
                                    <td><h3 style="margin-top: 10px;">Roll Id :</h3></td>
                                    <td><input style="margin: 20px; height: 40px; width: 300px;" type="text" name="roll"></td>
                                </tr >
                                <tr >
                                    <td><h3 style="margin-top: 10px;">Name :</h3></td>
                                    <td ><input style="margin: 20px; height: 40px; width: 300px;" type="text" name="name"></td>
                                </tr>
                                <tr>
                                    <td><h3 style="margin-top: 10px;">Date of Birth :</h3></td>
                                    <td><input style="margin: 20px; height: 40px; width: 300px;" type="date" name="date_of_birth"></td>
                                </tr>
                                <tr>
                                    <td><h3 style="margin-top: 10px;">Gender :</h3></td>
                                    <td><select name="gender" style="margin: 20px; height: 40px; width: 100px;"><option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h3 style="margin-top: 10px;">Father Name :</h3></td>
                                    <td><input style="margin: 20px; height: 40px; width: 300px;" type="text" name="father_name"></td>
                                </tr>
                                <tr>
                                    <td><h3 style="margin-top: 10px;">Mother Name :</h3></td>
                                    <td><input style="margin: 20px; height: 40px; width: 300px;" type="text" name="mother_name"></td>
                                </tr>
                                <tr>
                                    <td><h3 style="margin-top: 10px;">Address :</h3></td>
                                    <td><textarea name="address" style="margin: 20px; height: 50px; width: 300px;" cols="10" rows="5"></textarea></td>
                                </tr>
                                <tr>
                                    <td><h3 style="margin-top: 10px;">Phone No :</h3></td>
                                    <td><input style="margin: 20px; height: 40px; width: 300px;" style="margin-left: 20px; height: 30px; width: 300px;" type="text" name="phone"></td>
                                </tr>
                                <tr>
                                    <td><h3 style="margin-top: 10px;">S.S.C. GPA :</h3></td>
                                    <td><input style="margin: 20px; height: 40px; width: 300px;" type="text" name="s_gpa"></td>
                                </tr>
                                <tr>
                                    <td><h3 style="margin-top: 10px;">H.S.C GPA :</h3></td>
                                    <td><input style="margin: 20px; height: 40px; width: 300px;" type="text" name="h_gpa"></td>
                                </tr>
                                <tr>
                                    <td><h3 style="margin-top: 10px;">Department :</h3></td>
                                    <td>
                                        <select name="department" style="margin: 20px; height: 40px; width: 100px;">
                                            <option>CSE</option>
                                            <option>BBA</option>
                                            <option>ECE</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h3 style="margin-top: 10px;">Session :</h3></td>
                                    <td><input style="margin: 20px; height: 30px; width: 300px;" type="text" name="batch_no"></td>
                                </tr>
                            </table>
                        </div>
                        <div style="width: 30%; height: 100%; float: left;">
                            <div style="width: 90%; height: 50%;  margin-top: 20px; margin-left: 20px;">


                                <div>
                                    <input type="file" name="file" id="profile-img">
                                    <img src="" id="profile-img-tag" width="200px" height="220" />
                                    <script type="text/javascript">
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();

                                                reader.onload = function (e) {
                                                    $('#profile-img-tag').attr('src', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                        $("#profile-img").change(function () {
                                            readURL(this);
                                        });
                                    </script>
                                </div>

                                <div>

                                </div>

                            </div>
                            <div style="height: 30%; "></div>
                            <div>
                                <input  style="height: 40px; width: 100px; margin-left: 80px;" type="submit" name="submit" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>

                <div class="col-1 content_height " style="background-color: #9a0404; border-color:#9a0404; "></div>
            </div>

            <div class="row">
                <div class="col-12 footer_height " style="background-color:  #888888"></div>
            </div>
        </div>

    </body>
</html>
