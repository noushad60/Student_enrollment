<?php
session_start();

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'enrollment';

$link = mysqli_connect($host, $user, $password, $database);
if (!$link) {
    die('connection fail' . mysqli_error($link));
}
$sql ="SELECT * FROM add_student ";
    $result= mysqli_query($link, $sql);
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

    </script>
</head>
<body>
    <div style="width: 100%;">
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
            <div class="col-2 content_height background-2" style="border-color:  #333333;">
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
            <div class="col-9 content_height " style="background-color: #d6f8f8;">
                <div style="background-color:   #e2cf89; border: 1px solid; height: 200px; width: 400px; float: left;  margin-left:  50px;  margin-top: 100px; border-radius: 20px;">
                    <div style="margin-left: 20px; margin-top: 10px; position: relative;"><h1 style="color: red;">Total Course</h1></div>  
                    <div style="margin-left: 20px; float: left;">
                        <h1>CSE</h1>
                        <h1>ECE</h1>
                        <h1>BBA</h1>
                    </div>  
                    <div>
                        <img src="images/book-reviews-web.png" style="height: 150px; width: 150px; margin-left: 100px;">
                    </div>  
                </div>
                <div style="border: 1px solid;background-color: #e2cf89; height: 200px; width: 400px; float: left; margin-left: 50px; margin-top: 100px; border-radius: 20px;">
                    <a href="Add_Student.php" style="text-decoration: none;">
                        <div style="margin-left: 20px; margin-top: 10px;"><h1 style="color: red;">Add New Student</h1></div>
                        <div><img src="images/add_student.png" style="height: 150px; width: 150px; margin-left: 150px;"></div>
                    </a>
                </div>
                
                <div style="border: 1px solid;background-color: #e2cf89; height: 200px; width: 400px; float: left; margin-left: 260px; margin-top: 50px; border-radius: 20px;">
                    <a href="student_info.php" style="text-decoration: none;">
                    <div style="margin-left:  20px;margin-top:  20px;"><h1 style="color: red;">Total Student</h1></div>
                    <div style="margin: 20px 50px; float: left;">
                        <?php
                    $i=0;
                    while($rows= mysqli_fetch_assoc($result)){
                        $i++;
                    }
                    
                    ?>
                        <h1 style="color: black;"><?php echo $i;?></h1>
                    </div>
                    <div>
                        <img src="images/student.png" style="height: 150px; width: 150px; margin-left: 50px;">
                    </div>
                    
                    </a>
                </div>
            </div>
            <div class="col-1 content_height " style="background-color: #333333; border-color:  #333333; "></div>
        </div>

        <div class="row">
            <div class="col-12 footer_height " style="background-color:  #888888; border-color: #888888;"></div>
        </div>
    </div>

</body>
</html>
