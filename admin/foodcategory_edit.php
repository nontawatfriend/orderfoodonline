<?php $foodtype_id = $_REQUEST["foodtype_id"]; ?> <!-- รับไอดีแล้วแปลงไอดี -->
<div class="title"><i class="fa fa-plus-circle" aria-hidden="true"></i> แก้ไขหมวดหมู่อาหาร</div><br>
<form id="frm" method="post" class="form-horizontal" action="?page=foodcategory_update" name="frm">
<input type="hidden" name="foodtype_id" value="<?php echo $foodtype_id; ?>" />
    <div class="form-group">
		<label class="col-sm-5 control-label">ชื่อหมวดหมู่</label>
		<div class="col-sm-3 type_name">
        <?php 
		$sql="select * from food_type inner join foodtype_status on food_type.foodtype_status=foodtype_status.foodtypestatus_id where foodtype_id=$foodtype_id";
		$result=$db->query($sql);
		while($row=$result->fetch_array(MYSQLI_BOTH)){
	    ?>
			<input type="text" class="form-control" name="type_name" id="type_name" required="required" onBlur="chktype_name();" value="<?=$row["foodtype_name"]?>"></input>
        </div>
       
    </div>
<!--     <div class="form-group">
		<label class="col-sm-5 control-label">สถานะหมวดหมู่</label>
		<div class="col-sm-3 foodtype_id">
			<select class="form-control" name="foodtypestatus_id" id="foodtypestatus_id" onBlur="chkfoodtype_id();">
				<?php
				$strDefault=$row["foodtype_status"];
				$sql="select * from foodtype_status ORDER BY foodtypestatus_id ASC";
				$result=$db->query($sql);
				while($row=$result->fetch_array(MYSQLI_ASSOC)){
					if($strDefault==$row["foodtypestatus_id"])
					{
						$sel = "selected";
					}
					else
					{
						$sel = "";
					}
				?>
				<option value="<?=$row['foodtypestatus_id']?>"<?=$sel?>><?=$row['foodtypestatus_name']?></option>
        		<?php
        		}
				?>
                <?php }?>
            </select>
        </div>
    </div> -->
		<div class="form-group" align="center">
            <button class="btn btn-primary" type="button" style="font-size:16px" title="บันทึก" onClick="confirmdata();"name="buttontext"><i class="fa fa-save" ></i> อัพเดทชื่อหมวดหมู่</button>
		</div>
  </form>
<script>
	function chktype_name(){
		if(document.getElementById('type_name').value == "")
		{
			$('#frm .type_name').addClass('has-error');
			$('#frm .type_name').removeClass('has-success');
			return false;
    	}else{
			$('#frm .type_name').addClass('has-success');
			$('#frm .type_name').removeClass('has-error');
		}
	}

	function confirmdata(){
	if(document.getElementById('type_name').value == "")
    {
        chktype_name();
		$('#type_name').focus();
		return false;
    }
		document.getElementById("frm").submit();
		$("#buttontext").html("ระบบกำลังทำการโปรดรอสักครู่.....");
		document.getElementById("buttontext").disabled = true;
		return true;
	}
</script>
