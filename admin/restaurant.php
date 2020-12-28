<?php
if(!isset($_SESSION["username"]) || $_SESSION["username"] =="" || $_SESSION["password"] =="" and !isset($_COOKIE["yourusername"]) || $_COOKIE["yourusername"] =="" || $_COOKIE["yourpassword"] ==""){
	echo'<meta http-equiv="refresh" content="0;url=login.php">';
	exit(0);
} ?>
<div class="title">&#128203; จัดการข้อมูลร้านอาหาร</div><br>
<form id="frm" method="post" class="form-horizontal" action="?page=restaurant_edit" >
	<div class="form-group">
		<label class="col-sm-5 control-label">วันที่</label>
		<div class="col-sm-4" style="margin-top: 8px;">
    <div id="date"></div>
			<input type="hidden" name="date" id="date" class="form-control-static" value="<?php echo date("Y-m-d H:i:s");?>">
		</div>
	  <div class="col-md-3"></div>
	</div>
	<?php 
		$sql="select * from restaurant";
		$result=$db->query($sql);
		while($row=$result->fetch_array(MYSQLI_BOTH)){
	?>
    <div class="form-group">
		<label class="col-sm-5 control-label">ชื่อร้าน</label>
		<div class="col-sm-3 storename">
			<input type="text" class="form-control" name="storename" id="storename"  disabled  onBlur="chkstorename();" value="<?=$row["restaurant_name"]?>"></input>
		</div>
	</div>
    <div class="form-group">
		<label class="col-sm-5 control-label">ที่อยู่ </label>
		<div class="col-sm-3 address">
			<textarea type="text" class="form-control" name="address" id="address" disabled  onBlur="chkaddress();"><?=$row["restaurant_address"]?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 control-label">เบอร์โทร</label>
		<div class="col-sm-3 tel">
			<input type="text" class="form-control" name="tel" id="tel"  disabled  onBlur="chktel();" value="<?=$row["restaurant_tel"]?>"></input>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 control-label">โลโก้ร้าน</label>
		<div class="col-sm-3 tel">
			<a class="fancybox img-thumbnail" title="<?=$row['restaurant_name'];?>" rel="ligthbox" href="img/<?=$row['restaurant_img'];?>">
                <img class="img-responsive" alt="<?=$row['restaurant_name'];?>" src="img/<?=$row["restaurant_img"]?>" height="auto" width="300" name="restaurant_img"/>
            </a>
		<!-- <img src="img/<?=$row["restaurant_img"]?>" class="img-thumbnail" name="restaurant_img" width="300" height="auto"> -->
		</div>
	</div>
		<div class="form-group" align="center">
			<button class="btn btn-warning buttontext" type="button" style="font-size:16px" title="บันทึก" onClick="submit();"><i class="fa fa-wrench" ></i> แก้ไขข้อมูล</button>
		</div>
		<?php 
			}
		?>
  </form>


<script>
	function chkstorename(){
		if(document.getElementById('storename').value == "")
		{
			$('#frm .storename').addClass('has-error');
			$('#frm .storename').removeClass('has-success');
			return false;
    	}else{
			$('#frm .storename').addClass('has-success');
			$('#frm .storename').removeClass('has-error');
		}
	}
	function chkaddress(){
		if(document.getElementById('address').value == "")
		{
			$('#frm .address').addClass('has-error');
			$('#frm .address').removeClass('has-success');
			return false;
    	}else{
			$('#frm .address').addClass('has-success');
			$('#frm .address').removeClass('has-error');
		}
	}
	function chktel(){
		if(document.getElementById('tel').value == "")
		{
			$('#frm .tel').addClass('has-error');
			$('#frm .tel').removeClass('has-success');
			return false;
    	}else{
			$('#frm .tel').addClass('has-success');
			$('#frm .tel').removeClass('has-error');
		}
	}
	function submit(){
		document.getElementById("frm").submit();
		$("#buttontext").html("ระบบกำลังทำการโปรดรอสักครู่.....");
		document.getElementById("buttontext").disabled = true;
		return true;
	}
</script>
<script>
	var day = ["วันอาทิตย์","วันจันทร์","วันอังคาร","วันพุทธ","วันพฤหัสบดี","วันศุกร์","วันเสาร์"];
	var month = ["มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน",
	"กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤษจิกายน","ธันวาคม"];
	var d = new Date();
	document.getElementById("date").innerHTML=day[d.getDay()]+" ที่ "+(d.getDate())+" "+(month[d.getMonth()])+" พ.ศ. "+(d.getFullYear()+543)+" เวลา "+(d.getHours())+":"+(d.getMinutes()>9? d.getMinutes():'0'+d.getMinutes())+" น.";
</script>