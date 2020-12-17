<?php include("config.php"); ?>
<?php
date_default_timezone_set('Asia/Bangkok');
$today=date("Y-m-d");
    if($_GET['rev']==1){
        $sqli="SELECT order_date, SUM(order_price) as order_price from orders";
        $resulti=$db->query($sqli);
        while($rowi=$resulti->fetch_array(MYSQLI_BOTH)){ 
        if($rowi["order_price"]==''){
            echo "0";
            exit;
            }else{
            echo number_format($rowi["order_price"]);
            //echo date("Y-m-d H:i:s");
            exit;
        }
    }
    }else if($_GET['rev']==2){
        $sql="SELECT order_date, SUM(order_price) as order_price from orders where order_date='$today'";
        $result=$db->query($sql);
        while($row=$result->fetch_array(MYSQLI_BOTH)){  
        if($_GET['rev']==2){
            if($row["order_price"]==''){
            echo "0";
            exit;
            }else{
            echo number_format($row["order_price"]);
            exit;
            }
        }
        }
    }
?>