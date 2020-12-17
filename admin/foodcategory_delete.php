<?php
	$sql="DELETE from food_type where foodtype_id='".$_POST["foodtype_id"]."'";
	$result=$db->query($sql);
	if($result){?>
	<script>
	Swal.fire(
	'ลบแล้ว!',
	'',
	'success',
	)
</script>
<meta http-equiv="refresh" content="1;url=?page=foodcategory"/>
<?php }
?>