<?php
$sql=("select foodtopping_name from food_topping where foodtopping_name='".$_POST["foodtopping_name"]."'");
$result=$db->query($sql);
$num=mysqli_num_rows($result);
if($num>0){
  ?>
  <script type="text/javascript">
    Swal.fire({
    position: 'Top-center',
    icon: 'error',
    title: 'กรุณาทำรายการใหม่!',
    text: "เนื่องจากมีชื่อท็อปปิ้งนี้แล้ว",
    html:  "เนื่องจากมีท็อปปิ้งนี้แล้ว"+'<h1><a href="?page=food_topping_new" class="btn btn-primary">ตกลง</a></h1>',
    showConfirmButton: false,
    //timer: 20000
    })
  </script>	
<?php
}
else{
    $sql="insert into food_topping(foodtopping_name,foodtopping_flag)values('$_POST[foodtopping_name]','1')";
    $result=$db->query($sql);
    if($result){?>
    <script type="text/javascript">
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'บันทึกท็อปปิ้งเรียบร้อย',
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
    <meta http-equiv="refresh" content="5;url=?page=food_topping"/>
<?php }
}
?>

