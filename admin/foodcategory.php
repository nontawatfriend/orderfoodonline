<style>
th{
    color: #fff;
    text-align: center;
}
td{
    font-size: 18px;
    font-weight: bold; /* ตัวหนา */
}
.title a{
    float:right; /*ชิดขวา */
    text-decoration: none; /* underline  อันนี้คือมีขีดเส้นใต้*/
    text-align: right;
}
</style>
<div class="title">หมวดหมู่อาหาร <!-- <a href="?page=foodcategory_new" class="right"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มหมวดหมู่</a> --></div>
<table class="table table-hover table-bordered" id="example" width="100%">
    <thead style="background-color: #35475e">
    <tr>
        <th><h4>รหัสหมวดหมู่</h4></th>
        <th><h4>ชื่อหมวดหมู่</h4></th>
        <th><h4>สถานะ</h4></th>
        <th><h4>แก้ไข/ลบ</h4></th>
    </tr>
    </thead>
    <tbody align="center">
    <?php 
		$sql="select * from food_type inner join foodtype_status where food_type.foodtype_status=foodtype_status.foodtypestatus_id ORDER BY foodtype_id ASC";
		$result=$db->query($sql);
		while($row=$result->fetch_array(MYSQLI_BOTH)){
	?>
        <tr>
            <td><?=$row["foodtype_id"]?></td>
            <td><?=$row["foodtype_name"]?></td>
            <!-- <td><?=$row["foodtypestatus_name"]?></td> -->
            <?php
            if($row["foodtypestatus_id"] == "1"){
            echo "<td><span style='color:green'>$row[foodtypestatus_name]</span></td>";
            }else if($row["foodtypestatus_id"] == "2"){
            echo "<td><span style='color:red'>$row[foodtypestatus_name]</span></td>";
            }else{
            echo "<td><span style='color:red'>ข้อมูลไม่แน่ชัด</span></td>";
            }
            ?>
            <td>
            <form name="myForm"  method="POST" action="?page=foodcategory_delete">
            <a href="?page=foodcategory_edit&foodtype_id=<?=$row["foodtype_id"];?>" title="แก้ไข"><span class="btn btn-warning" id="change"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>
 <!--                <button type="submit" class="btn btn-warning" id="change" title="แก้ไข" value=""> <i class="fa fa-pencil-square-o"></i></button> -->
                <!-- <button onclick="" class="btn btn-danger" id="remove" title="ลบ"> <i class="fa fa-trash"></i></button> -->
                <input type="hidden" name="foodtype_id" id="foodtype_id" value="<?php echo $row['foodtype_id']; ?>">
                <!-- <button type="submit" onclick="deleteConfirmation()" class="btn btn-danger delete_data" title="ลบ" name="<?=$row["foodtype_id"];?>" id="remove"> <i class="fa fa-trash" aria-hidden="true"></i></button> -->
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
