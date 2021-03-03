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
$result = '';
if (isset($_POST['btn-2'])) {
    $name = $_POST['btn-2'];
    $sql = "SELECT * FROM add_student WHERE name='$name' OR roll='$name'";
    $result = mysqli_query($link, $sql);
}
if (isset($_POST['update'])) {
   
    $name = $_POST['name'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $roll = $_POST['roll'];
    
    $date_of_birth= $_POST['date_of_birth'];
    $gender= $_POST['gender'];
    $batch_no= $_POST['batch_no'];
    $s_gpa= $_POST['s_gpa'];
    $h_gpa= $_POST['h_gpa'];


    $sql = "UPDATE add_student SET name='$name',father_name='$father_name', mother_name='$mother_name', address='$address', phone='$phone', department='$department', gender='$gender', date_of_birth='$date_of_birth', batch_no='$batch_no',s_gpa='$s_gpa', h_gpa='$h_gpa' WHERE roll='$roll'";
    $sms= mysqli_query($link, $sql);
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
            
                <div class="col-9 content_height " style=" overflow: auto; background-color: #d6f8f8;">
                    <div style="width: 100%; height: 50px; float: left; text-align: center;"><h1>Information</h1></div>

                    <?php
                    $i = 0;
                    if ($result != '') {
                        while ($rows = mysqli_fetch_assoc($result)) {
//                        $i++;
//                       if($i<=5){ 
                            ?>
                    <form method="post" action="">
                            <div style="width: 70%; height:500px; float: left;">
                                <table style="margin-left: 50px;">
                                    <tr>
                                        <td class="form1 ">Roll_number</td>
                                        <td><input class="form2 input" type="text" name="roll" value="<?php echo $rows['roll']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="form1">Student_Name</td>
                                        <td><input  class="form2 input " type="text" name="name" value="<?php echo $rows['name']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="form1">Father name</td>
                                        <td><input class="form2 input" type="text" name="father_name" value="<?php echo $rows['father_name']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="form1">Mother name</td>
                                        <td><input class="form2 input" type="text" name="mother_name" value="<?php echo $rows['mother_name']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="form1">Address</td>
                                        <td><input class="form2 input" type="text" name="address" value="<?php echo $rows['address']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="form1">Phone_Number</td>
                                        <td><input class="form2 input" type="text" name="phone" value="<?php echo $rows['phone']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="form1">Department</td>
                                        <td><input class="form2 input" type="text" name="department"  value="<?php echo $rows['department']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="form1">Date Of Birth</td>
                                        <td><input class="form2 input" type="date" name="date_of_birth"  value="<?php echo $rows['date_of_birth']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="form1">Gender</td>
                                        <td><input class="form2 input" type="text" name="gender"  value="<?php echo $rows['gender']; ?>">
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="form1">Session</td>
                                        <td><input class="form2 input" type="text" name="batch_no"  value="<?php echo $rows['batch_no']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="form1">S.S.C GPA</td>
                                        <td><input class="form2 input" type="text" name="s_gpa"  value="<?php echo $rows['s_gpa']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="form1">H.S.C GPA</td>
                                        <td><input class="form2 input" type="text" name="h_gpa"  value="<?php echo $rows['h_gpa']; ?>"></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td><input class="button" style=" height: 30px; width: 100px; margin-left: 260px; margin-top: 10px;" type="submit" name="update" value="UPDATE"></td>
                                    </tr>



                                </table>
                            </div>
                            <div style="width: 30%;  height: auto; float: left; position: relative;">

                                <?php
                                $image_show = $rows['image'];
                                echo "<img src='images/$image_show' style= 'width: 200px; height: 220px;'>"
                                ?>
                            </div>

                            <div style="width: 100%;  height: 30px; float: left;">
                                

                                   
                               
                            </div>


                    </form>


                            <?php
//                       }
                        }
                    }
                    if($sms !=''){
                        echo "Update Successfull"; 
                    }
                    ?>


                </div>
           
            <div class="col-1 content_height  "style="background-color: #9a0404; border-color:#9a0404; ">

            </div>
        </div>

        <div class="row">
            <div class="col-12 footer_height " style="background-color:  #888888"></div>
        </div>
    </div>

</body>
</html>
