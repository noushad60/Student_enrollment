<?php
if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    
   
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'enrollment';

    $link = mysqli_connect($host, $user, $password, $database);
    if (!$link) {
        die('connection fail' . mysqli_error($link));
    }

    $sql = "INSERT INTO add_member (name,designation,phone_number,address) VALUES ('$name','$designation','$phone_number','$address')";
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
            <div class="col-9 content_height  " style="background-color: #d6f8f8;">
                <h1 class="h1">Add New Staff</h1>
                <form action="" method="post" >
                    <div class="form">
                        <table style="margin-left: 100px;">
                            <tr>
                                <td class="form1">Full_Name</td>
                                <td><input class="form2 input " type="text" name="name"></td>
                            </tr>
                            <tr>
                                <td class="form1">Designation</td>
                                <td><input class="form2 input" type="text" name="designation"></td>
                            </tr>
                             
                            <tr>
                                <td class="form1">Phone_Number</td>
                                <td><input class="form2 input" type="text" name="phone_number"></td>
                            </tr>
                            <tr>
                                <td class="form1">Address</td>
                                <td><textarea class="form2" rows="3" cols="5" name="address"></textarea></td>
                            </tr>
                            
                            
                            <tr>
                                <td></td>
                                <td><input style="height: 40px; width: 100px; margin-left: 135px;" type="submit" name="btn" value="Submit"></td>
                            </tr>
                        </table>

                    </div>
                </form> 
            </div>
            <div class="col-1 content_height "style="background-color: #9a0404; border-color:#9a0404; " ></div>
        </div>

        <div class="row">
            <div class="col-12 footer_height " style="background-color:  #888888"></div>
        </div>
    </div>

</body>
</html>
