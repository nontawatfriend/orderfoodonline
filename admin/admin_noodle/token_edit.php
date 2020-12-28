<div class="title">&#128203; แก้ไข token</div><br>
<form id="frm" method="post" class="form-horizontal" action="?page=token_update"  enctype="multipart/form-data" accept-charset="UTF-8">
	<?php 
		$sql="select * from restaurant";
		$result=$db->query($sql);
		while($row=$result->fetch_array(MYSQLI_BOTH)){
	?>
    <div class="form-group">
		<label class="col-sm-5 control-label">ToKen </label>
		<div class="col-sm-4">
			<textarea type="text" class="form-control" name="token" id="token"><?=$row["restaurant_address"]?></textarea>
		</div>
	</div>
		<div class="form-group" align="center">
			<button class="btn btn-primary" type="submit" style="font-size:16px" title="บันทึก"><i class="fa fa-save" ></i> บันทึกข้อมูล</button>
		</div>
		<?php 
			}
		?>
</form>