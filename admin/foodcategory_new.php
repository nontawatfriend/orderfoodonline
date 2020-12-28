<?php
if(!isset($_SESSION["username"]) || $_SESSION["username"] =="" || $_SESSION["password"] =="" OR !isset($_COOKIE["yourusername"]) || $_COOKIE["yourusername"] =="" || $_COOKIE["yourpassword"] ==""){
	echo'<meta http-equiv="refresh" content="0;url=login.php">';
	exit(0);
} ?>
<div class="title"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มหมวดหมู่อาหาร</div><br>
<form id="frm" method="post" class="form-horizontal" action="?page=foodcategory_save" >
    <div class="form-group">
		<label class="col-sm-5 control-label">ชื่อหมวดหมู่</label>
		<div class="col-sm-3 type_name">
			<input type="text" class="form-control" name="type_name" id="type_name"  required="required" onBlur="chktype_name();" value="<?=$row["restaurant_name"]?>"></input>
		</div>
	</div>
		<div class="form-group" align="center">
			<button class="btn btn-primary" type="button" style="font-size:16px" title="บันทึก" onClick="confirmdata();"><i class="fa fa-save" ></i> บันทึกหมวดหมู่</button>
		</div>
  </form>


<script>
	function chktype_name(){
		if(document.getElementById('type_name').value == "")
		{
        //alert('กรุณากรอกวันที่คืนด้วย');
			//$('#type_name').focus();
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
