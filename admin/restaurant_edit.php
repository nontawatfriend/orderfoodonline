<?php
if(!isset($_SESSION["username"]) || $_SESSION["username"] =="" || $_SESSION["password"] =="" and !isset($_COOKIE["yourusername"]) || $_COOKIE["yourusername"] =="" || $_COOKIE["yourpassword"] ==""){
	echo'<meta http-equiv="refresh" content="0;url=login.php">';
	exit(0);
} ?>
<style>
	.main-content {
	padding: 40px;
	margin-top: 0;
	padding: 0;
	padding-top: 44px;
	height: 100%;
	overflow: visible;
}
.image-preview-input {
    position: relative;
	overflow: hidden;
	margin: 0px;    
    color: #333;
    background-color: #fff;
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
.removeimg{
	color: red;
	text-decoration: none;
}
.removeimg:hover{
	color: red;
	text-decoration: none;
}
</style>
<script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
    </script>
<div class="title">&#128203; จัดการข้อมูลร้านอาหาร</div><br>
<form id="frm" method="post" class="form-horizontal" action="?page=restaurant_update"  enctype="multipart/form-data" accept-charset="UTF-8">
	<div class="form-group">
		<label class="col-sm-5 control-label">วันที่</label>
		<div class="col-sm-4" style="margin-top: 8px;">
    <div id="date"></div>
			<input type="hidden" name="date" id="date" class="form-control-static" value="<?=date("Y-m-d H:i:s");?>">
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
			<input type="text" class="form-control" name="storename" id="storename"  required="required" onBlur="chkstorename();" value="<?=$row["restaurant_name"]?>"></input>
		</div>
	</div>
    <div class="form-group">
		<label class="col-sm-5 control-label">ที่อยู่ </label>
		<div class="col-sm-3 address">
			<textarea type="text" class="form-control" name="address" id="address" required="required" onBlur="chkaddress();"><?=$row["restaurant_address"]?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 control-label">เบอร์โทร</label>
		<div class="col-sm-3 tel">
			<input type="text" class="form-control" name="tel" id="tel" required="required" onBlur="chktel();" value="<?=$row["restaurant_tel"]?>"></input>
		</div>
	</div>
		<div class="form-group">
			<label class="col-sm-5 control-label">โลโก้ร้าน</label>
			<div class="col-sm-3">
				<div class="input-group image-preview">
				<!-- <div class="input-group image-preview">เดิม -->
					<input type="text" class="form-control image-preview-filename" value="<?=$row["restaurant_img"]?>" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
					<span class="input-group-btn">
						<!-- image-preview-clear button -->
						<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
							<span class="glyphicon glyphicon-remove"></span> Clear
						</button>
						<!-- image-preview-input -->
						<div class="btn btn-default image-preview-input">
							<span class="glyphicon glyphicon-folder-open"></span>
							<span class="image-preview-input-title">Browse</span>
							<input type="file" accept="image/png, image/jpeg, image/gif, image/jpg " name="restaurant_img" id="restaurant_img"/> <!-- rename it ตรงname เอา input-file-preview ออก -->
							<input type="hidden" name="restaurant_imga" value="<?=$row['restaurant_img']?>"/> <!-- ส่งรูปเก่าไป -->
						</div>
					</span>
				</div><!-- /input-group image-preview [TO HERE]--> 
			</div>
		</div>
		<div class="form-group" align="center">
			<button class="btn btn-primary" type="button" style="font-size:16px" title="บันทึก" onClick="confirmdata();"><i class="fa fa-save" ></i> บันทึกข้อมูล</button>
		</div>
		<?php 
			}
		?>
  </form>


<script>
	function chkstorename(){
		if(document.getElementById('storename').value == "")
		{
        //alert('กรุณากรอกวันที่คืนด้วย');
			//$('#storename').focus();
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
        //alert('กรุณากรอกวันที่คืนด้วย');
			//$('#address').focus();
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
        //alert('กรุณากรอกวันที่คืนด้วย');
			//$('#tel').focus();
			$('#frm .tel').addClass('has-error');
			$('#frm .tel').removeClass('has-success');
			return false;
    	}else{
			$('#frm .tel').addClass('has-success');
			$('#frm .tel').removeClass('has-error');
		}
	}

	function confirmdata(){
	if(document.getElementById('storename').value == "")
    {
        chkstorename();
		$('#storename').focus();
		return false;
    }
	if(document.getElementById('address').value == "")
    {
        chkaddress();
		$('#address').focus();
		return false;
    }
	if(document.getElementById('tel').value == "")
    {
        chktel();
		$('#tel').focus();
		return false;
    }
	
		document.getElementById("frm").submit();
		$("#buttontext").html("ระบบกำลังทำการโปรดรอสักครู่.....");
		document.getElementById("buttontext").disabled = true;
		return true;
	}
</script>
<!-- --------------------เริ่มพรีวิวเลือกรูป ------------------ -->
<script type="text/javascript">
	$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:'auto'
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});	</script>
<!-- --------------------end พรีวิวเลือกรูป ------------------ -->
<script>
var day = ["วันอาทิตย์","วันจันทร์","วันอังคาร","วันพุทธ","วันพฤหัสบดี","วันศุกร์","วันเสาร์"];
var month = ["มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน",
"กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤษจิกายน","ธันวาคม"];
var d = new Date();
document.getElementById("date").innerHTML=day[d.getDay()]+" ที่ "+(d.getDate())+" "+(month[d.getMonth()])+" พ.ศ. "+(d.getFullYear()+543)+" เวลา "+(d.getHours())+":"+(d.getMinutes()>9? d.getMinutes():'0'+d.getMinutes())+" น.";
</script>