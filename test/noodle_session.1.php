<?php
session_start();
echo 'เส้น : '.$_SESSION["food_type"].'<br>';
    //$_SESSION["food_topping"] = $_POST['food_topping'];
    foreach ($_SESSION["food_topping"] as $food_toppings=>$value) {
         /* echo "ท็อปปิ้ง : ".$value."<br />"; */
    echo 'ท็อปปิ้ง : '.$value.'<br>'.'<br>';
}
echo 'ประเภทน้ำ : '.$_SESSION["food_water"].'<br>';
echo 'จำนวน : '.$_SESSION["food_unit"].'<br>';
echo 'หมายเหตุ : '.$_SESSION["food_note"].'<br>';
?>