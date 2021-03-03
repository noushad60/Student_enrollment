<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'enrollment';

$link = mysqli_connect($host, $user, $password, $database);
if (!$link) {
    die('connection fail' . mysqli_error($link));
}
if(isset($_POST['btn-2'])){
    $name=$_POST['btn-2'];
    $sql ="SELECT * FROM add_student WHERE name='$name' or roll='$name'";
    $result= mysqli_query($link, $sql);
    
}




$sql = "SELECT * FROM add_student";
$result = mysqli_query($link, $sql);
if (isset($_POST['delete_all'])) {
    $delete_all = "TRUNCATE add_student";
    mysqli_query($link, $delete_all);
}
if (isset($_POST['search_engine'])) {
    $search = $_POST['search_engine_box'];
    
    $search_engine = "SELECT * FROM add_student WHERE name='$search' or department='$search' or roll='$search'";
    $result = mysqli_query($link, $search_engine);
}
if (isset($_POST['delete'])) {
    $delete = $_POST['delete_box'];


    $delete_item = "DELETE FROM add_student WHERE roll='$delete' or name='$delete' or department='$delete'";
    mysqli_query($link, $delete_item);
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
            <div class="col-3 header_height" style="background-color: #9a0404 ; border-color:#9a0404;">
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
                <div  class="col-4 footer_height" style="border: white; margin-left: 530px;">
                    <form action="" method="post">
                        <table>
                            <tr>
                                <td ><input style=" height: 30px;" type="text" name="search_engine_box" placeholder="search"></td>
                                <td ><input style="width: 80px; height: 30px;" type="submit" name="search_engine" value="Search"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div style="height: 400px;">
                    <form action="full_info.php" method="post">
                        <table  border="1px solid" style="align-content: center; width: 100%; overflow: auto; ">
                            <tr style="border: 1px solid;">
                                <th colspan="7" style="text-align: center; height: 50px;">All Student Information</th>
                            </tr>
                            <tr>
                                <th >Roll Number</th>
                                <th >Student Name</th>
                                <th >Department</th>
                                <th >Phone Number</th>


                            </tr>
                            <?php
                            

                            while ($rows = mysqli_fetch_assoc($result)) {
//                        $i++;
//                       if($i<=5){ 
                                ?>
                                <tr>
                                    <td ><input style="width: 100%; height: 100%; background-color: #d6f8f8; border: 0px;" type="submit" name="btn-2" value="<?php echo $rows['roll']; ?>"></td>
                                    <td ><input style="width: 100%; height: 100%; background-color: #d6f8f8; border: 0px;" type="submit" name="btn-2" value="<?php echo $rows['name']; ?>"></td>
                                    <td ><?php echo $rows['department']; ?></td>
                                    <td ><?php echo $rows['phone']; ?></td>


                                </tr>
                                <?php
//                       }
                            }
                            ?>
                        </table> 
                    </form>
                </div>
                <div   style="margin: 100px 100px;">
                    <form action="" method="post">
                        <table >
                            <tr>

                                <td><input style="height: 30px; width: 100px;" type="text" name="delete_box" placeholder="Delete Box"></td>
                                <td><input class="button" style="height: 30px; width: 100px;" type="submit" name="delete" value="DELETE"></td>
                                <td><input  class="button" style="height: 30px; width: 100px;" type="submit" name="delete_all" value="DELETE-ALL"></td>

                                
                            </tr>



                        </table>
                    </form>
                </div>
            </div>
            <div class="col-1 content_height " style="background-color: #9a0404; border-color:#9a0404; "></div>
        </div>

        <div class="row">
            <div class="col-12 footer_height" style="background-color:  #888888"></div>
        </div>
    </div>

</body>
</html>

