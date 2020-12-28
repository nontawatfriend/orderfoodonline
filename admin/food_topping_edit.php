<?php
if(!isset($_SESSION["username"]) || $_SESSION["username"] =="" || $_SESSION["password"] =="" and !isset($_COOKIE["yourusername"]) || $_COOKIE["yourusername"] =="" || $_COOKIE["yourpassword"] ==""){
	echo'<meta http-equiv="refresh" content="0;url=login.php">';
	exit(0);
} ?>
<?php $foodtopping_id = $_REQUEST["foodtopping_id"]; ?> <!-- รับไอดีแล้วแปลงไอดี -->
<div class="title"><i class="fa fa-plus-circle" aria-hidden="true"></i> แก้ไขท็อปปิ้ง</div><br>
<form id="frm" method="post" class="form-horizontal" action="?page=food_topping_update" name="frm">
<input type="hidden" name="foodtopping_id" value="<?php echo $foodtopping_id; ?>" />
    <div class="form-group">
		<label class="col-sm-5 control-label">ชื่อท็อปปิ้ง</label>
		<div class="col-sm-3 topping">
        <?php 
		$sql="select * from food_topping inner join foodflag_status on (food_topping.foodtopping_flag=foodflag_status.foodflagstatus_id) where foodtopping_id=$foodtopping_id";
		$result=$db->query($sql);
		while($row=$result->fetch_array(MYSQLI_BOTH)){
	    ?>
			<input type="text" class="form-control" name="topping_name" id="topping" required="required" onBlur="chktopping();" value="<?=$row["foodtopping_name"]?>"></input>
        </div>
       
    </div>
    <div class="form-group">
		<label class="col-sm-5 control-label">สถานะท็อปปิ้ง</label>
		<div class="col-sm-3 foodtopping_id">
			<select class="form-control" name="foodflagstatus_id" id="foodflagstatus_id" onBlur="chkfoodtopping_id();">
				<?php
				$strDefault=$row["foodflagstatus_id"];
				$sqli="select * from foodflag_status";
				$resulti=$db->query($sqli);
				while($rowi=$resulti->fetch_array(MYSQLI_ASSOC)){
					if($strDefault==$rowi["foodflagstatus_id"])
					{
						$sel = "selected";
					}
					else
					{
						$sel = "";
					}
				?>
				<option value="<?=$rowi['foodflagstatus_id']?>"<?=$sel?>><?=$rowi['foodflagstatus_name']?></option>
        		<?php
        		}
				?>
                <?php }?>
            </select>
        </div>
    </div>
		<div class="form-group" align="center">
            <button class="btn btn-primary" type="button" style="font-size:16px" title="บันทึก" onClick="confirmdata();"name="buttontext"><i class="fa fa-save" ></i> อัพเดทท็อปปิ้ง</button>
		</div>
  </form>
<script>
	function chktopping(){
		if(document.getElementById('topping').value == "")
		{
			$('#frm .topping').addClass('has-error');
			$('#frm .topping').removeClass('has-success');
			return false;
    	}else{
			$('#frm .topping').addClass('has-success');
			$('#frm .topping').removeClass('has-error');
		}
	}

	function confirmdata(){
	if(document.getElementById('topping').value == "")
    {
        chktopping();
		$('#topping').focus();
		return false;
    }
		document.getElementById("frm").submit();
		$("#buttontext").html("ระบบกำลังทำการโปรดรอสักครู่.....");
		document.getElementById("buttontext").disabled = true;
		return true;
	}
</script>
