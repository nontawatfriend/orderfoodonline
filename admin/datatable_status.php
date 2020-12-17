 <?php
if($_GET["tables_status"]=='1')	$tables_status=1;
if($_GET["tables_status"]=='2')	$tables_status=2;
if($tables_status==1){
    $sql="update tables set tables_status='2' where tables_id='$_GET[tables_id]'";
    $result=$db->query($sql);
}else if($tables_status==2){
    $sql="update tables set tables_status='1' where tables_id='$_GET[tables_id]'";
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
        title: 'เปลี่ยนสถานะ สำเร็จ',
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
    <meta http-equiv="refresh" content="2;url=?page=datatable"/>
    <?php }
?>
