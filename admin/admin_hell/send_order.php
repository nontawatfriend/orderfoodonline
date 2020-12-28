<?php
$order_id=$_POST["order_id"];
$table_id=$_POST["table_id"];
$sql="UPDATE orders set foodstatusid_hell='2' where order_id='$order_id' and table_id='$table_id'";
$result=$db->query($sql);
foreach($_POST["food_id"] as $id){
$sqli="UPDATE order_list set food_statusid='2' where order_id='$order_id' and food_typeid='6' and food_id='$id'";
$result=$db->query($sqli);
}
if($result){
    ?>
    <script type="text/javascript">
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'ส่งออร์เดอร์แล้ว',
        showConfirmButton: false,
      })
    </script>
    <meta http-equiv="refresh" content="1;url=?page=main"/>
    <?php }else
    {?>
    <script type="text/javascript">
        Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'ส่งออร์เดอร์ไม่สำเร็จ',
        text: 'ลองใหม่ครั้ง',
      })
    </script>
    <meta http-equiv="refresh" content="2;url=?page=send_order"/>
    <?php }
?>