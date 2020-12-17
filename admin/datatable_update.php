<?php
$tables_images=$_FILES["tables_images"]["tmp_name"];
$tables_images_name=$_FILES["tables_images"]["name"];//ไฟล์รูปใหม่
$tables_image=$_POST["tables_image"];//ชื่อรูปเก่า
if($tables_images_name==$tables_image){ //กรณีมีชื่อไฟล์รูปเหมือนกัน มีชื่อซ้ำกันให้ทำif
  copy($tables_images,"table_img/".$tables_images_name);
  unlink($tables_images);
  $sql="update tables set tables_images='$tables_images_name',tables_link='".$_POST["tables_link"]."' where tables_id='".$_POST["tables_id"]."'";
  $result=$db->query($sql);
}else if($tables_images_name!='' || $tables_images_name==$tables_image){ //ไฟล์ที่เพิ่มเข้ามาใหม่ 
  copy($tables_images,"table_img/".$tables_images_name);
  unlink($tables_images);
  @unlink("table_img/".$tables_image); //ลบรูปเก่า
  $sql="update tables set tables_images='$tables_images_name',tables_link='".$_POST["tables_link"]."' where tables_id='".$_POST["tables_id"]."'";
  $result=$db->query($sql);
} 
else
{
  $sql="update tables set tables_link='".$_POST["tables_link"]."' where tables_id='".$_POST["tables_id"]."'";
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
<meta http-equiv="refresh" content="1;url=?page=datatable"/>
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
<meta http-equiv="refresh" content="5;url=?page=datatable"/>
<?php }
?>

