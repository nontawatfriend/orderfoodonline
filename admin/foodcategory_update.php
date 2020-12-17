<?php
$foodtype_id = $_REQUEST["foodtype_id"]; //สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
/* $sql="update food_type set foodtype_name='".$_POST["type_name"]."',foodtype_status='".$_POST["foodtypestatus_id"]."' where foodtype_id=$foodtype_id";
$result=$db->query($sql); เดิมแก้ไขสถานะได้*/
$sql="update food_type set foodtype_name='".$_POST["type_name"]."' where foodtype_id=$foodtype_id";
$result=$db->query($sql);
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
<meta http-equiv="refresh" content="1;url=?page=foodcategory"/>
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
<meta http-equiv="refresh" content="5;url=?page=foodcategory"/>
<?php }
?>

