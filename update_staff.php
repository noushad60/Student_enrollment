<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'enrollment';

$link = mysqli_connect($host, $user, $password, $database);
if (!$link) {
    die('connection fail' . mysqli_error($link));
}
$result = '';
if (isset($_POST['search'])) {
    $name = $_POST['search_box'];
   

   
        $sql = "SELECT * FROM add_member WHERE name='$name' ";
        $result = mysqli_query($link, $sql);
   
}
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
   
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];


    $sql = "UPDATE add_member SET designation='$designation', phone_number='$phone_number', address='$address WHERE name='$name'";
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
            <div class="col-9 content_height " style="background-color: #d6f8f8;">
                <div style="height: 450px;">
                    <form action="" method="post">
                        <table   style="align-content: center; width: 100%; margin-left: 20px; ">
                            <tr style="border: 1px solid;">
                                <th colspan="7" style="text-align: center; height: 50px; ">Update Staff Information</th>
                            </tr>

<?php
$i = 0;
if ($result != '') {
    while ($rows = mysqli_fetch_assoc($result)) {
//                        $i++;
//                       if($i<=5){ 
        ?>
                                    <tr>
                                        <td class="form1 ">Staff Name</td>
                                        <td><input class="form2 input" type="text" name="name" value="<?php echo $rows['name']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="form1">Designation</td>
                                        <td><input  class="form2 input " type="text" name="designation" value="<?php echo $rows['designation']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="form1">Phone Number</td>
                                        <td><input class="form2 input" type="text" name="phone_number" value="<?php echo $rows['phone_number']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="form1">Address</td>
                                        <td><input class="form2 input" type="text" name="address" value="<?php echo $rows['address']; ?>"></td>
                                    </tr>


                                    <tr>
                                        <td></td>
                                        <td><input class="button" style=" height: 30px; width: 100px; margin-left: 260px; margin-top: 10px;" type="submit" name="update" value="UPDATE"></td>
                                    </tr>




        <?php
//                       }
    }
}
?>
                            <tr>

                                <td><input style="height: 30px; width: 100px; margin-left:200px;" type="search" name="search_box" placeholder="Enter Name"></td>
                                <td><input class="button" style="height: 30px; width: 100px; margin-right: 400px;" type="submit" name="search" value="SEARCH"></td>

                            </tr>
                        </table> 
                    </form>
                </div>
                <div   style="margin: 100px 100px;">
                    <form action="" method="post">
                        <table >



                        </table>
                    </form>
                </div>
            </div>
            <div class="col-1 content_height "style="background-color: #9a0404; border-color:#9a0404; " ></div>
        </div>

        <div class="row">
            <div class="col-12 footer_height "style="background-color:  #888888"></div>
        </div>
    </div>

</body>
</html>

