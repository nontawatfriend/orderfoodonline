<?php
session_start();
require 'admin/config.php';
date_default_timezone_set('Asia/Bangkok');
$today=date("Y-m-d");
$food_statusid=1;
//echo 'สถานะเสตตัสของออร์เดอร์ '.$food_statusid.'<br>';
//foreach($_POST["food_id"] as $food_id ) {
    //echo 'ไอดีอาหาร '.$food_id.' จำนวน '.$_POST['unit_food_'.$food_id].' ประเภทไอดีอาหาร '.$_POST['foodtype_id_'.$food_id].' ประเภทน้ำ/แห้ง-> '.$_POST['food_water_'.$food_id].' ชื่อประเภทราคาอาหาร '.$_POST['food_price_'.$food_id].' โน๊ด '.$_POST['food_note_'.$food_id].' ท็อปปิ้ง '.$_POST['food_topping_'.$food_id].'<br>';
//}
//echo 'ราคาทั้งหมด '.$_POST["food_total"].' บาท'.'<br>';
//echo 'หมายเลขโต๊ะ '.$_POST["id_table"].'<br>';
$sqlSelect="SELECT * from orders where table_id='".$_POST["id_table"]."'  order by order_id desc";/*  */
$resultSelect=$db->query($sqlSelect);
$rowSelect=$resultSelect->fetch_array(MYSQLI_ASSOC);
$orderID=$rowSelect["order_id"];
//echo 'ไอดีออร์เดอร์'.$orderID.'<br>';
//echo 'โต๊ะ'.$rowSelect["table_id"].'<br>';
//echo 'ราคารวม'.$rowSelect["order_price"].'<br>';
$totaladd=$rowSelect["order_price"]+$_POST["food_total"]; //บวกราคาออร์เดอร์ที่เข้ามาใหม่+ฐานข้อมูล
//echo 'ราคารวม'.$totaladd.'<br>';
//echo 'ไอดีสถานะออร์เดอร์'.$rowSelect["food_statusid"].'<br>';

if($_POST["id_table"]==$rowSelect["table_id"] and $rowSelect["food_statusid"]=='1' or $rowSelect["food_statusid"]=='2' or $rowSelect["foodstatusid_dessert_drink"]=='1' or $rowSelect["foodstatusid_dessert_drink"]=='2' or $rowSelect["foodstatusid_hell"]=='1' or $rowSelect["foodstatusid_hell"]=='2'){ //ถ้าไอดีโต๊ะ...สถานะคือ 1 คือรับออร์เดอร์แล้วให้ไปเพิ่มรายการ
/*     $sql="UPDATE orders set table_id='".$_POST["id_table"]."', food_statusid='1',foodstatusid_dessert_drink='1',foodstatusid_hell='1', order_price='$totaladd' where order_id='$orderID'";
    $result=$db->query($sql); */
    foreach($_POST["food_id"] as $food_id ) {
      if($_POST['foodtype_id_'.$food_id]=='3' or $_POST['foodtype_id_'.$food_id]=='6' or $_POST['foodtype_id_'.$food_id]=='7'){ //ถ้าประเภทไอดีเท่ากับ หมวดเมนูก๋วยเตี๋ยว3,เมนูนรก6,เกาเหลา7 ให้อัพเดท
        $sqli="UPDATE orders set table_id='".$_POST["id_table"]."',food_statusid='1',order_price='$totaladd' where order_id='$orderID'";
        $resulti=$db->query($sqli);
      }else if($_POST['foodtype_id_'.$food_id]=='4'){//ถ้าประเภทไอดีเท่ากับของหวาน4 ให้อัพเดท
        $sqli="UPDATE orders set table_id='".$_POST["id_table"]."',foodstatusid_dessert_drink='1',order_price='$totaladd' where order_id='$orderID'";
        $resulti=$db->query($sqli);
      }else if($_POST['foodtype_id_'.$food_id]=='5'){//ถ้าประเภทไอดีเท่ากับเครื่องดื่ม5 ให้อัพเดท
        $sqli="UPDATE orders set table_id='".$_POST["id_table"]."',foodstatusid_hell='1',order_price='$totaladd' where order_id='$orderID'";
        $resulti=$db->query($sqli);
      }
        $sql="INSERT INTO order_list (order_id,food_id,order_unit,food_statusid,order_note,food_topping,food_water,price_categoryname,food_typeid) VALUES ('$orderID','$food_id','".$_POST['unit_food_'.$food_id]."','1','".$_POST['food_note_'.$food_id]."','".$_POST['food_topping_'.$food_id]."','".$_POST['food_water_'.$food_id]."','".$_POST['food_price_'.$food_id]."','".$_POST['foodtype_id_'.$food_id]."')"; 
        $result=$db->query($sql);
    }
    if($result){
        //unset ตะกร้า
        unset($_SESSION["intLine"]);
        unset($_SESSION["strfoodid"]);
        unset($_SESSION["strProductID"]);
        unset($_SESSION['strFlavors']);
        unset($_SESSION["strType"]);
        unset($_SESSION["strType2"]);
        unset($_SESSION["strType2_name"]);
        unset($_SESSION["strfoodunit"]);
        unset($_SESSION["strDetail"]);
        unset( $_SESSION["strfoodname"]);
        unset( $_SESSION["strfoodprice"]);
        unset( $_SESSION["strtypeID"]);
        $_SESSION["sumcart"]=0;

        $sqlSelectq="SELECT food_statusid from orders where food_statusid='1'";/* ตรวจสถานะที่เท่ากับ 1 คือยังไม่ได้รับอาหาร */
        $result=$db->query($sqlSelectq);
        $recordQ=mysqli_num_rows($result);
        $Q=$recordQ-1;
        ?>
        <script type="text/javascript">
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'ออร์เดอร์ถูกเพิ่มแล้ว',
            footer: '<b style="font-size: 18px;">'+'เหลืออีก '+ <?php echo $Q ?> +' คิว'+'</b>',
            html:  '<h1><a href="?page=recommended_menu" class="btn btn-primary">ตกลง</a></h1>',
            showConfirmButton: false,
          })
        </script>
        <?php }else
        {?>
        <script type="text/javascript">
            Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'ไม่สำเร็จ',
            text: 'ลองใหม่ครั้ง',
          })
        </script>
        <meta http-equiv="refresh" content="2;url=?page=cart"/>
        <?php }
}else{ //เพิ่มรายการใหม่/เปิดโต๊ะใหม่เข้าไปเลย
    $sql="INSERT INTO orders (order_date,table_id,food_statusid,foodstatusid_dessert_drink,foodstatusid_hell,order_price) VALUES ('$today', '".$_POST["id_table"]."', '1', '1', '1', '".$_POST["food_total"]."')";
    $result=$db->query($sql);

    $sqlSelect="SELECT order_id from orders order by order_id desc";
    $resultSelect=$db->query($sqlSelect);
    $rowSelect=$resultSelect->fetch_array(MYSQLI_ASSOC);
    $lastID=$rowSelect["order_id"];

    foreach($_POST["food_id"] as $food_id ) {
    $sql="INSERT INTO order_list (order_id,food_id,order_unit,food_statusid,order_note,food_topping,food_water,price_categoryname,food_typeid) VALUES ('$lastID','$food_id','".$_POST['unit_food_'.$food_id]."','1','".$_POST['food_note_'.$food_id]."','".$_POST['food_topping_'.$food_id]."','".$_POST['food_water_'.$food_id]."','".$_POST['food_price_'.$food_id]."','".$_POST['foodtype_id_'.$food_id]."')"; 
    $result=$db->query($sql);
    }

    if($result){
        //unset ตะกร้า
        unset($_SESSION["intLine"]);
        unset($_SESSION["strfoodid"]);
        unset($_SESSION["strProductID"]);
        unset($_SESSION['strFlavors']);
        unset($_SESSION["strType"]);
        unset($_SESSION["strType2"]);
        unset($_SESSION["strType2_name"]);
        unset($_SESSION["strfoodunit"]);
        unset($_SESSION["strDetail"]);
        unset( $_SESSION["strfoodname"]);
        unset( $_SESSION["strfoodprice"]);
        unset( $_SESSION["strtypeID"]);
        $_SESSION["sumcart"]=0;
        $sqlSelectq="SELECT food_statusid from orders where food_statusid='1'";/* ตรวจสถานะที่เท่ากับ 1 คือยังไม่ได้รับอาหาร */
        $result=$db->query($sqlSelectq);
        $recordQ=mysqli_num_rows($result);
        $Q=$recordQ-1;
        ?>
        <script type="text/javascript">
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'ออร์เดอร์ถูกส่งแล้ว',
            footer: '<b style="font-size: 18px;">'+'เหลืออีก '+ <?php echo $Q ?> +' คิว'+'</b>',
            html:  '<h1><a href="?page=recommended_menu" class="btn btn-primary">ตกลง</a></h1>',
            showConfirmButton: false,
            /* showConfirmButton: true, */ //show ปุ่มให้กด
            //timer: 1500
          })
        </script>
        <?php }else
        {?>
        <script type="text/javascript">
            Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'ไม่สำเร็จ',
            text: 'ลองใหม่ครั้ง',
          })
        </script>
        <meta http-equiv="refresh" content="2;url=?page=cart"/>
        <?php }
    ?>
<?php 
} 
?>




