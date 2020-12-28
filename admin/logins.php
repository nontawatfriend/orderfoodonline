<!DOCTYPE html>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="fonts/Mali.css">
        <link rel="stylesheet" href="fonts/font-awesome.min.css">
        <link rel="stylesheet" href="css/style_login.css">
        <script src="js/sweetalert2@10.js"></script> <!--sweetalert2@10-->
    </head>
</html>
<?php 
session_start();
include("config.php");
$username = $_POST['username'];
$password = $_POST['password'];
if(isset($username)){
    $sql="SELECT * FROM tb_admin where username='".$username."' and password='".$password."'";
    $results = mysqli_query($db, $sql);
    $row=$results->fetch_array(MYSQLI_ASSOC);
    if (mysqli_num_rows($results) > 0) {
    $_SESSION["username"] = $row["username"];
    $_SESSION["password"] = $row["password"];
        ?>
        <script type="text/javascript">
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'เข้าสู่ระบบแอดมิน',
            showConfirmButton: false, //show ปุ่มให้กด
            timer: 1500
            })
        </script>
    <meta http-equiv="refresh" content="1;url=../admin"/>
<?php
    } else {
        ?>
        <script type="text/javascript">
            Swal.fire({
            position: 'Top-center',
            icon: 'error',
            title: 'Username หรือ Password ไม่ถูกต้อง',
            showConfirmButton: false, //show ปุ่มให้กด
            timer: 1500
            })
        </script>
    <meta http-equiv="refresh" content="2;url=login.php">
    <?php
    }
    exit(0);
}
?>