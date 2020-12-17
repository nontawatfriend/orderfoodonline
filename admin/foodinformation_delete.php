<?php
    $food_img=$_POST["food_img"];

	$sql_photo="SELECT food_img from food where food_id='".$_POST["food_id"]."'";
	$result_photo=$db->query($sql_photo);
    $record_photo=$result_photo->fetch_array(MYSQLI_BOTH);
    
/*     echo $food_img.'<br>';
    echo $record_photo["food_img"];exit(0); */
    if($food_img!=''){ //ชื่อรูปไม่เท่ากับช่องว่างในฐานข้อมูล
        unlink("img/".$record_photo["food_img"]);
        $sql="DELETE from food where food_id='".$_POST["food_id"]."'";
        $result=$db->query($sql);
    }
    $sql="DELETE from food where food_id='".$_POST["food_id"]."'";
    $result=$db->query($sql);

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
        title: 'ลบแล้ว',
        showConfirmButton: false, //show ปุ่มให้กด
      })
    </script>
<meta http-equiv="refresh" content="1;url=?page=foodinformation"/>
<?php }
?>