<?php
	$sql="DELETE from food_topping where foodtopping_id='".$_POST["foodtopping_id"]."'";
	$result=$db->query($sql);
	if($result){?>
	<script>
	Swal.fire(
	'ลบแล้ว!',
	'',
	'success',
	)
</script>
<meta http-equiv="refresh" content="1;url=?page=food_topping"/>
<?php }
?>