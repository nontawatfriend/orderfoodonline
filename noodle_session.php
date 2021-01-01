
<?php
session_start();
/* เช็ค */
$sqlSelect="SELECT * from food where food_id='".$_POST['food_id']."'";
$resultSelect=$db->query($sqlSelect);
$rowSelect=$resultSelect->fetch_array(MYSQLI_ASSOC);
$foodname=$rowSelect["food_name"];
/* เช็ค */
$sqlSelectprice="SELECT * from price_category where pricecategory_price='".$_POST['food_price']."'";
$resultSelectprice=$db->query($sqlSelectprice);
$rowSelectprice=$resultSelectprice->fetch_array(MYSQLI_ASSOC);
$foodpricename=$rowSelectprice["pricecategory_name"];
if(!isset($_SESSION["intLine"])){ //ยังไม่มีข้อมูล
    $_SESSION["intLine"] = 0;
    $_SESSION["strfoodid"][0] = $_POST['food_id']; //ไอดีรายการ
    $_SESSION["strProductID"][0] = $foodname; //ชื่อประเภทเส้น
    $_SESSION["strtypeID"][0] = $_POST['foodtype_id']; //ไอดีประเภทอาหาร

    $teste = $_POST['foodtopping_name'];    //เก็บชื่อท็อปปิ้ง
    $x = 0;
    foreach ($teste as $key => $id){
        $_SESSION['strFlavors'][0][$x] = $id;
    $x++;
    }
    $_SESSION["strType"][0] = $_POST['food_water']; // ประเภทน้ำหรือแห้ง
    $_SESSION["strType2"][0] = $_POST['food_price']; // ราคาพิเศษหรือธรรมดา
    $_SESSION["strType2_name"][0] = $foodpricename; // ชื่อพิเศษหรือธรรมดา
    $_SESSION["strfoodunit"][0] = $_POST['food_unit']; //จำนวนที่สั่ง
    $_SESSION["strDetail"][0] = $_POST['food_note']; // รายละเอียดที่กรอก
    $_SESSION["sumcart"]=$_SESSION["sumcart"]+$_POST['food_unit']; //ทำการบวกกับตระกร้าเข้าไป เท่ากับ ผลลัพธ์ทั้งหมดในตะกร้า
    //$message = "เพิ่มรายการแล้ว";
    //echo "<script type='text/javascript'>alert('$message');</script>";
    //echo '<meta http-equiv="refresh"content="0;url=?page=noodle">';
}else {
    $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
    $intNewLine  = $_SESSION["intLine"];
    //ใส่ code ด้านบนตามรูป แล้วเปลี่ยน [0] เป็น [$intNewLine]
    $_SESSION["strfoodid"][$intNewLine] = $_POST['food_id']; //ไอดีรายการ
    $_SESSION["strProductID"][$intNewLine] = $foodname;//ชื่อประเภทเส้น
    $_SESSION["strtypeID"][$intNewLine] = $_POST['foodtype_id']; //ไอดีประเภทอาหาร

    $teste = $_POST['foodtopping_name'];
    $x = 0;
    foreach ($teste as $key => $id){
        $_SESSION['strFlavors'][$intNewLine][$x] = $id;
    $x++;
    }

    $_SESSION["strType"][$intNewLine] = $_POST['food_water']; // ประเภทน้ำหรือแห้ง
    $_SESSION["strType2"][$intNewLine] = $_POST['food_price']; // ราคาพิเศษหรือธรรมดา
    $_SESSION["strType2_name"][$intNewLine] = $foodpricename; // ชื่อพิเศษหรือธรรมดา
    $_SESSION["strfoodunit"][$intNewLine] = $_POST['food_unit']; //จำนวนที่สั่ง
    $_SESSION["strDetail"][$intNewLine] = $_POST['food_note']; // รายละเอียดที่กรอก
    $_SESSION["sumcart"]=$_SESSION["sumcart"]+$_POST['food_unit']; //ทำการบวกกับตระกร้าเข้าไป เท่ากับ ผลลัพธ์ทั้งหมดในตะกร้า
    //$message = "เพิ่มรายการแล้ว";
    //echo "<script type='text/javascript'>alert('$message');</script>";
    //echo '<meta http-equiv="refresh"content="0;url=?page=noodle">';
}
?>