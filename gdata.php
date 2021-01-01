<?php include("admin/config.php"); 
session_start();?>
<?php
//$_SESSION["sumcart"]
    if($_GET['rev']==1){
        if($_SESSION["sumcart"]==''){
            echo "0";
            exit;
            }else{
            echo $_SESSION["sumcart"];
            exit;
        }
    }
?>