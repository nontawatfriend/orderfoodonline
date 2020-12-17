 <?php
if($_GET["food_recommend"]=='')	    $food_recommend='';
if($_GET["food_recommend"]=='1')	$food_recommend=1;
if($food_recommend==''){
    $sql="update food set food_recommend='1' where food_id='$_GET[food_id]'";
    $result=$db->query($sql);
}else if($food_recommend==1){
    $sql="update food set food_recommend='' where food_id='$_GET[food_id]'";
    $result=$db->query($sql);
}else{
    echo "ไม่สำเร็จ";
}
if($result){
    ?>
    <script type="text/javascript">
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'เปลี่ยนสถานะแล้ว',
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
    <meta http-equiv="refresh" content="2;url=?page=foodinformation"/>
    <?php }
?>
