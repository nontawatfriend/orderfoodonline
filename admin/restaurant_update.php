<?php
$restaurant_img=$_FILES["restaurant_img"]["tmp_name"];
$restaurant_img_name=$_FILES["restaurant_img"]["name"];//ไฟล์รูปใหม่
$restaurant_imga=$_POST["restaurant_imga"];//ชื่อรูปเก่า
/* $array_lastname=explode(".",$restaurant_img_name);//ค่าใหม่รูปใหม่
$c=count($array_lastname)-1;
$lastname=strtolower($array_lastname[$c]);//แปลงนามสกุลตัวเล็ก
$restaurant_img_name="restaurant_".time().".".$lastname; //ตั้งชื่อร้านตามเวลา
copy($restaurant_img,"img/".$restaurant_img_name); //ตั้งชื่อร้านตามเวลา */
/* echo $restaurant_img_name.'<br>';
echo $restaurant_imga;exit(0); */
if($restaurant_img_name==$restaurant_imga){ //กรณีมีชื่อไฟล์รูปเหมือนกัน มีชื่อซ้ำกันให้ทำif
  copy($restaurant_img,"img/".$restaurant_img_name);
  unlink($restaurant_img);
  $sql="update restaurant set restaurant_name='".$_POST["storename"]."',restaurant_address='".$_POST["address"]."',restaurant_tel='".$_POST["tel"]."',restaurant_img='$restaurant_img_name' ";
  $result=$db->query($sql);
}else if($restaurant_img_name!='' || $restaurant_img_name==$restaurant_imga){ //ไฟล์ที่เพิ่มเข้ามาใหม่ 
  copy($restaurant_img,"img/".$restaurant_img_name);
  unlink($restaurant_img);
  @unlink("img/".$restaurant_imga); //ลบรูปเก่า
  $sql="update restaurant set restaurant_name='".$_POST["storename"]."',restaurant_address='".$_POST["address"]."',restaurant_tel='".$_POST["tel"]."',restaurant_img='$restaurant_img_name' ";
  $result=$db->query($sql);
} 
else
{ //ไฟล์ที่ไม่ได้เพิ่มเข้ามาใหม่
  $sql="update restaurant set restaurant_name='".$_POST["storename"]."',restaurant_address='".$_POST["address"]."',restaurant_tel='".$_POST["tel"]."'";
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
<meta http-equiv="refresh" content="1;url=?page=restaurant"/>
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
<meta http-equiv="refresh" content="5;url=?page=restaurant_edit"/>
<?php }
?>

