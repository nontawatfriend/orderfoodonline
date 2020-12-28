<?php
if(!isset($_SESSION["username"]) || $_SESSION["username"] =="" || $_SESSION["password"] =="" OR !isset($_COOKIE["yourusername"]) || $_COOKIE["yourusername"] =="" || $_COOKIE["yourpassword"] ==""){
	echo'<meta http-equiv="refresh" content="0;url=login.php">';
	exit(0);
} ?>
<div class="title"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มท็อปปิ้ง</div><br>
<form id="frm" method="post" class="form-horizontal" action="?page=food_topping_save" >
    <div class="form-group">
		<label class="col-sm-5 control-label">ชื่อท็อปปิ้ง</label>
		<div class="col-sm-3 foodtopping_name">
			<input type="text" class="form-control" name="foodtopping_name" id="foodtopping_name"  required="required" onBlur="chkfoodtopping_name();" value="<?=$row["restaurant_name"]?>"></input>
		</div>
	</div>
		<div class="form-group" align="center">
			<button class="btn btn-primary" type="button" style="font-size:16px" title="บันทึก" onClick="confirmdata();"><i class="fa fa-save" ></i> บันทึกท็อปปิ้ง</button>
		</div>
  </form>


<script>
	function chkfoodtopping_name(){
		if(document.getElementById('foodtopping_name').value == "")
		{
        //alert('กรุณากรอกวันที่คืนด้วย');
			//$('#foodtopping_name').focus();
			$('#frm .foodtopping_name').addClass('has-error');
			$('#frm .foodtopping_name').removeClass('has-success');
			return false;
    	}else{
			$('#frm .foodtopping_name').addClass('has-success');
			$('#frm .foodtopping_name').removeClass('has-error');
		}
	}

	function confirmdata(){
	if(document.getElementById('foodtopping_name').value == "")
    {
        chkfoodtopping_name();
		$('#foodtopping_name').focus();
		return false;
    }
		document.getElementById("frm").submit();
		$("#buttontext").html("ระบบกำลังทำการโปรดรอสักครู่.....");
		document.getElementById("buttontext").disabled = true;
		return true;
	}
</script>
