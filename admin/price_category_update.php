<?php
$price_category_id = $_REQUEST["price_category_id"]; //สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$sql="update price_category set pricecategory_price='".$_POST["price_category"]."' where pricecategory_id=$price_category_id";
$result=$db->query($sql);
if($result){?>
<script type="text/javascript">
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'อัพเดทราคาแล้ว',
    showConfirmButton: false, //show ปุ่มให้กด
    timer: 1500
  })
</script>
<meta http-equiv="refresh" content="1;url=?page=price_category"/>
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
<meta http-equiv="refresh" content="3;url=?page=price_category"/>
<?php }
?>

