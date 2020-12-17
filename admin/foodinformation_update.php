<?php
$food_id=$_POST["food_id"];
$sql=("SELECT food_name,food_id from food where food_name='".$_POST["food_name"]."' and food_id<>'$food_id'");
$result=$db->query($sql);
$num=mysqli_num_rows($result);
if($num>0){
  ?>
  <script type="text/javascript">
    Swal.fire({
    position: 'Top-center',
    icon: 'error',
    title: 'กรุณาทำรายการใหม่!',
    text: "เนื่องจากมีชื่อนี้แล้ว",
    html:  "เนื่องจากมีชื่อนี้แล้ว"+'<h1><a href="?page=foodinformation_edit&food_id=<?php echo $food_id; ?>" class="btn btn-primary">ตกลง</a></h1>',
    showConfirmButton: false,
    //timer: 20000
    })
  </script>	
<?php
}else{
$food_img=$_FILES["food_img"]["tmp_name"];
$food_img_name=$_FILES["food_img"]["name"];
$array_lastname=explode(".",$food_img_name);//ค่าใหม่รูปใหม่
$c=count($array_lastname)-1;
$lastname=strtolower($array_lastname[$c]);//แปลงนามสกุลตัวเล็ก
/* echo 'รูปใหม่ '.$food_img_name.'<br>';
echo 'รูปเก่า '.$_POST["food_imga"]; */
if(!$food_img_name){ //กรณีเมื่อไม่เลือกรูป
    $sql="update food set food_name='".$_POST["food_name"]."',foodtype_id='".$_POST["foodtype_id"]."',food_price='".$_POST["food_price"]."',food_flag='".$_POST["foodflag_status"]."' where food_id='".$_POST["food_id"]."'";
    $result=$db->query($sql);
}else{ //กรณีมีรูปภาพใหม่เข้ามา
    if($lastname=='jpg' or $lastname=='gif' or $lastname=='png' or $lastname=='jpeg'){
        $food_img_name="food_".time().".".$lastname;
        copy($food_img,"img/".$food_img_name);
        unlink($food_img);
        @unlink("img/".$_POST["food_imga"]);
    }
        $sql="update food set food_name='".$_POST["food_name"]."',foodtype_id='".$_POST["foodtype_id"]."',food_price='".$_POST["food_price"]."',food_flag='".$_POST["foodflag_status"]."',food_img='$food_img_name' where food_id='".$_POST["food_id"]."'";
        $result=$db->query($sql);
        
}
if($result){?>
    <script type="text/javascript">
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'อัพเดทข้อมูลแล้ว',
        showConfirmButton: false, //show ปุ่มให้กด
        timer: 1500
    })
    </script>
    <meta http-equiv="refresh" content="1;url=?page=foodinformation"/>
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
    <meta http-equiv="refresh" content="5;url=?page=foodinformation"/>
<?php }}
?>
        

