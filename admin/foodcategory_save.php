<?php
$sql=("select foodtype_name from food_type where foodtype_name='".$_POST["type_name"]."'");
$result=$db->query($sql);
$num=mysqli_num_rows($result);
if($num>0){
  ?>
  <script type="text/javascript">
    Swal.fire({
    position: 'Top-center',
    icon: 'error',
    title: 'กรุณาทำรายการใหม่!',
    text: "เนื่องจากมีชื่อหมวดหมู่นี้แล้ว",
    html:  "เนื่องจากมีหมวดหมู่นี้แล้ว"+'<h1><a href="?page=foodcategory_new" class="btn btn-primary">ตกลง</a></h1>',
    showConfirmButton: false,
    //timer: 20000
    })
  </script>	
<?php
}
else{
    $sql="insert into food_type(foodtype_name,foodtype_status)values('$_POST[type_name]','1')";
    $result=$db->query($sql);
    if($result){?>
    <script type="text/javascript">
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'บันทึกหมวดหมู่เรียบร้อย',
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
}
?>

