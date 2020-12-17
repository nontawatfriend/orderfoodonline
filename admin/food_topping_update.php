<?php
$foodtopping_id = $_REQUEST["foodtopping_id"]; //สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$sql=("SELECT foodtopping_name,foodtopping_id from food_topping where foodtopping_name='".$_POST["topping_name"]."' and foodtopping_id<>'$foodtopping_id'");
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
    html:  "เนื่องจากมีชื่อนี้แล้ว"+'<h1><a href="?page=food_topping_edit&foodtopping_id=<?php echo $foodtopping_id; ?>" class="btn btn-primary">ตกลง</a></h1>',
    showConfirmButton: false,
    //timer: 20000
    })
  </script>	
<?php
}else{
$sql="update food_topping set foodtopping_name='".$_POST["topping_name"]."',foodtopping_flag='".$_POST["foodflagstatus_id"]."' where foodtopping_id=$foodtopping_id";
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
<meta http-equiv="refresh" content="1;url=?page=food_topping"/>
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
<meta http-equiv="refresh" content="3;url=?page=food_topping"/>
<?php }}
?>

