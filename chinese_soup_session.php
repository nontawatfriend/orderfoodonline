<?php
session_start();
if(!isset($_SESSION["intLine"])){ //ยังไม่มีข้อมูล
    $_SESSION["intLine"] = 0;
    $_SESSION["strfoodid"][0] = $_POST['food_id']; //ไอดีรายการ
    $_SESSION["strfoodname"][0] = $_POST['food_name']; //ชื่อรายการ
    $_SESSION["strfoodunit"][0] = $_POST['food_unit']; //จำนวนรายการ
    $_SESSION["strfoodprice"][0] = $_POST['food_price']; //ราคารายการ
    $_SESSION["strtypeID"][0] = $_POST['foodtype_id']; //ไอดีประเภทอาหาร
    $_SESSION["sumcart"]=$_SESSION["sumcart"]+$_POST['food_unit']; //ทำการบวกกับตระกร้าเข้าไป เท่ากับ ผลลัพธ์ทั้งหมดในตะกร้า
    //$message = "เพิ่มรายการแล้ว";
    //echo "<script type='text/javascript'>alert('$message');</script>";
    //echo '<meta http-equiv="refresh"content="0;url=?page=chinese_soup">';
}else {
    $key = array_search($_POST["food_name"], $_SESSION["strfoodname"]); //ค้นหา คำที่เหมือน ใน array
    if((string)$key == ""){
        //ไม่มีค่า ทำการเพิ่มรายการใหม่ใน session
        $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
        $intNewLine  = $_SESSION["intLine"];
        //ใส่ code ด้านบนตามรูป แล้วเปลี่ยน [0] เป็น [$intNewLine]
        $_SESSION["strfoodid"][$intNewLine] = $_POST['food_id']; //ไอดีรายการ
        $_SESSION["strfoodname"][$intNewLine] = $_POST['food_name']; //ชื่อรายการ
        $_SESSION["strfoodunit"][$intNewLine] = $_POST['food_unit']; //จำนวนรายการ
        $_SESSION["strfoodprice"][$intNewLine] = $_POST['food_price']; //ราคารายการ
        $_SESSION["strtypeID"][$intNewLine] = $_POST['foodtype_id']; //ไอดีประเภทอาหาร
        $_SESSION["sumcart"]=$_SESSION["sumcart"]+$_POST['food_unit']; //ทำการบวกกับตระกร้าเข้าไป เท่ากับ ผลลัพธ์ทั้งหมดในตะกร้า
        //$message = "เพิ่มรายการแล้ว";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        //echo '<meta http-equiv="refresh"content="0;url=?page=chinese_soup">';        
    }else{
        //มีค่าเดิม ทำการบวกจำนวนเพิ่มใน session
        $_SESSION["strfoodunit"][$key] = $_POST['food_unit'] + $_SESSION["strfoodunit"][$key];
        $_SESSION["sumcart"]=$_SESSION["sumcart"]+$_POST['food_unit']; //ทำการบวกกับตระกร้าเข้าไป เท่ากับ ผลลัพธ์ทั้งหมดในตะกร้า
        //$message = "เพิ่มจำนวนแล้ว";
        //echo "<script type='text/javascript'>alert('$message');</script>";
        //echo '<meta http-equiv="refresh"content="0;url=?page=chinese_soup">';          
    }    
}



?>
