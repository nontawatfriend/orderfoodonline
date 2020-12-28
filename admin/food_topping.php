<?php
if(!isset($_SESSION["username"]) || $_SESSION["username"] =="" || $_SESSION["password"] =="" and !isset($_COOKIE["yourusername"]) || $_COOKIE["yourusername"] =="" || $_COOKIE["yourpassword"] ==""){
	echo'<meta http-equiv="refresh" content="0;url=login.php">';
	exit(0);
} ?>
<style>
th{
    color: #fff;
    text-align: center;
}
td{
    font-size: 18px;
    font-weight: bold;
}
.title a{
    float:right; /*ชิดขวา */
    text-decoration: none; /* underline  อันนี้คือมีขีดเส้นใต้*/
    text-align: right;
}
</style>
<div class="title">ท็อปปิ้ง <a href="?page=food_topping_new" class="right"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มท็อปปิ้ง</a></div>
<table class="table table-hover table-bordered" id="example" width="100%">
    <thead style="background-color: #35475e">
    <tr>
        <th><h4>รหัสท็อปปิ้ง</h4></th>
        <th><h4>ชื่อท็อปปิ้ง</h4></th>
        <th><h4>สถานะ</h4></th>
        <th><h4>แก้ไข/ลบ</h4></th>
    </tr>
    </thead>
    <tbody align="center">
    <?php 
		$sql="select * from food_topping inner join foodflag_status on (food_topping.foodtopping_flag=foodflag_status.foodflagstatus_id) ORDER BY foodtopping_id ASC";
		$result=$db->query($sql);
		while($row=$result->fetch_array(MYSQLI_BOTH)){
	?>
        <tr>
            <td><?=$row["foodtopping_id"]?></td>
            <td><?=$row["foodtopping_name"]?></td>
            <?php
            if($row["foodflagstatus_id"] == "1"){
            echo "<td><span style='color:green'>$row[foodflagstatus_name]</span></td>";
            }else if($row["foodflagstatus_id"] == "2"){
            echo "<td><span style='color:red'>$row[foodflagstatus_name]</span></td>";
            }else{
            echo "<td><span style='color:black'>ปิดใช้งาน</span></td>";
            }
            ?>
            <td>
            <form name="myForm" method="POST" action="?page=food_topping_delete">
            <a href="?page=food_topping_edit&foodtopping_id=<?=$row["foodtopping_id"];?>" title="แก้ไข"><span class="btn btn-warning" id="change"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>
 <!--                <button type="submit" class="btn btn-warning" id="change" title="แก้ไข" value=""> <i class="fa fa-pencil-square-o"></i></button> -->
                <!-- <button onclick="" class="btn btn-danger" id="remove" title="ลบ"> <i class="fa fa-trash"></i></button> -->
                <input type="hidden" name="foodtopping_id" id="foodtopping_id" value="<?php echo $row['foodtopping_id']; ?>">
                
                <button type="submit" onclick="deleteConfirmation()" class="btn btn-danger delete_data" title="ลบ" name="<?=$row["foodtopping_id"];?>" id="remove"> <i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </td>
        </tr>
        <?php 
			}
		?>
    </tbody>
</table>
<script>
function deleteConfirmation(){
    event.preventDefault(); // prevent form submit
    var form = event.target.form; // storing the form
  Swal.fire({
  title: 'ยืนยัน',
  text: '',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'ยกเลิก',
  confirmButtonText: 'ตกลง',
}).then((result) => {
  if (result.isConfirmed) {
    form.submit();
    /* Swal.fire(
      'ลบแล้ว!',
      '',
      'success',
    ) */
  }
})
}
</script>
