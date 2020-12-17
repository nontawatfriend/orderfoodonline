<?php
    $food_img_name=$_FILES["food_img"]["name"];
    $food_img=$_GET["food_id"];
	$sql_photo="SELECT food_img from food where food_id='".$_GET["food_id"]."'";
    $result_photo=$db->query($sql_photo);
    $record_photo=$result_photo->fetch_array(MYSQLI_BOTH);

    //unlink("img/".$record_photo["food_img"]);//ลบรูปในโฟรเดอร์
    //$food_img_name="food.jpg";
    if($record_photo["food_img"]!=''){ //ชื่อในฐานข้อมูลไม่เท่ากับช่องว่างให้ทำการลบไฟล์ในโฟรเดอร์ออก
        unlink("img/".$record_photo["food_img"]);
        $sql="update food set food_img='' where food_id='".$_GET["food_id"]."'";
        $result=$db->query($sql);
    }//แต่ถ้าชื่อจากฐานข้อมูลมีชื่อให้ทำ
    
    $sql="update food set food_img='' where food_id='".$_GET["food_id"]."'";
    $result=$db->query($sql);

/*     $food_img=$_FILES["food_img"]["tmp_name"];
    $food_img_name=$_FILES["food_img"]["name"];
    $food_img_name="food.jpg"; */
	if($result){?>
<!-- 	<script>
        Swal.fire(
        'ลบแล้ว!',
        '',
        'success',
        )
    </script> -->
    <script type="text/javascript">
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'ลบรูปแล้ว',
        showConfirmButton: false, //show ปุ่มให้กด
      })
    </script>
<meta http-equiv="refresh" content="1;url=?page=foodinformation"/>
<?php }
?>