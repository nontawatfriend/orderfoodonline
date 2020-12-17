<?php
$order_id=$_POST["order_id"];
$table_id=$_POST["table_id"];
/* ให้อัพเดทตาราง orders foodstatusid=3 และ อัพเดทตาราง order_list=3 */
$sql="UPDATE orders set food_statusid='3',foodstatusid_dessert_drink='3',foodstatusid_hell='3' where order_id='$order_id' and table_id='$table_id'";
$result=$db->query($sql);
foreach($_POST["food_id"] as $id){
$sqli="UPDATE order_list set food_statusid='3' where order_id='$order_id' and food_id='$id'";
$result=$db->query($sqli);
}
if($result){
    ?>
    <script type="text/javascript">
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'เช็คบิลแล้ว',
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
        title: 'เช็คบิลไม่สำเร็จ',
        text: 'ลองใหม่ครั้ง',
      })
    </script>
    <meta http-equiv="refresh" content="2;url=?page=main"/>
    <?php }
?>