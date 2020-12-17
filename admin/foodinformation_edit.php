<style>
/* .input-group-btn{
	z-index: 2048;
} */
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
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
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
<?php $food_id = $_REQUEST["food_id"]; ?>
<div class="title"><i class="fa fa-plus-circle" aria-hidden="true"></i> แก้ไขข้อมูลอาหาร</div><br>
<form id="frm" method="post" class="form-horizontal" action="?page=foodinformation_update" enctype="multipart/form-data" accept-charset="UTF-8">
    <div class="form-group">
		<label class="col-sm-5 control-label">แก้ไขชื่ออาหาร</label>
		<div class="col-sm-3 food_name">
        <?php 
		$sqld="select * from food inner join food_type on (food.foodtype_id=food_type.foodtype_id) inner join foodflag_status on (foodflag_status.foodflagstatus_id=food.food_flag) where food_id=$food_id";
		$resultd=$db->query($sqld);
		while($rowd=$resultd->fetch_array(MYSQLI_BOTH)){
	    ?>
			<input type="text" class="form-control" name="food_name" id="food_name"  required="required" onBlur="chkfood_name();" value="<?=$rowd["food_name"]?>"></input>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 control-label">เลือกหมวดหมู่อาหาร</label>
		<div class="col-sm-3 foodtype_id">
			<select class="form-control" name="foodtype_id" id="foodtype_id" onBlur="chkfoodtype_id();">
				<?php
				$foodtype_id=$rowd["foodtype_id"];
				$sqli="select * from food_type";
				$resulti=$db->query($sqli);
				while($rowi=$resulti->fetch_array(MYSQLI_ASSOC)){
					if($foodtype_id==$rowi["foodtype_id"])
					{
						$sel = "selected";
					}
					else
					{
						$sel = "";
					}
				?>
				<option value="<?=$rowi['foodtype_id']?>"<?=$sel?>><?=$rowi['foodtype_name']?></option>
        		<?php
        		}
				?>
				<input type="hidden" name="<?=$rowi['foodtype_id']?>" value="<?=$rowi['foodtype_id']?>" />
        </select>
        </div>
	</div>
	<div class="form-group">
		<label class="col-sm-5 control-label">ราคาอาหาร</label>
		<div class="col-sm-3 food_price">
			<input type="text" class="form-control" OnKeyPress="return chkNumber(this)" name="food_price" id="food_price"  required="required" onBlur="chkfood_price();" value="<?=$rowd["food_price"]?>"></input>
		</div>
	</div>
    <div class="form-group">
		<label class="col-sm-5 control-label">สถานะอาหาร</label>
		<div class="col-sm-3 foodflag_status">
			<select class="form-control" name="foodflag_status" id="foodflag_status" onBlur="chkfoodtype_id();">
				<?php
				$sql="select * from foodflag_status";
				$result=$db->query($sql);
				$foodflagstatus_id=$rowd["foodflagstatus_id"];
				while($row=$result->fetch_array(MYSQLI_ASSOC)){
					if($foodflagstatus_id==$row["foodflagstatus_id"])
					{
						$sel = "selected";
					}
					else
					{
						$sel = "";
					}
				?>
				<option value="<?=$row['foodflagstatus_id']?>"<?=$sel?>><?=$row['foodflagstatus_name']?></option>
        		<?php
        		}
				?>
				<input type="hidden" name="<?=$row['foodflagstatus_id']?>" value="<?=$row['foodflagstatus_id']?>" />
        </select>
        </div>
	</div>
	<!-- --------------------เริ่มพรีวิวเลือกรูป ------------------ -->  
		<div class="form-group">
			<label class="col-sm-5 control-label">เลือกรูป</label>
			<div class="col-sm-3">
				<div class="input-group image-preview">
				<!-- <div class="input-group image-preview">เดิม -->
					<input type="text" class="form-control image-preview-filename" value="<?=$rowd['food_img']?>" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
					<span class="input-group-btn">
						<!-- image-preview-clear button -->
						<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
							<span class="glyphicon glyphicon-remove"></span> Clear
						</button>
						<!-- image-preview-input -->
						<div class="btn btn-default image-preview-input">
							<span class="glyphicon glyphicon-folder-open"></span>
							<span class="image-preview-input-title">Browse</span>
							<input type="file" accept="image/png, image/jpeg, image/gif, image/jpg " name="food_img" id="food_img"/> <!-- rename it ตรงname เอา input-file-preview ออก -->
							<input type="hidden" name="food_imga" value="<?=$rowd['food_img']?>"/> <!-- ส่งรูปเก่าไป -->
						</div>
					</span>
				</div><!-- /input-group image-preview [TO HERE]--> 
			</div>
			<a href="?page=foodinformation_deleteimg&food_id=<?=$rowd["food_id"];?>" class="removeimg" style="text-decoration:none">*ลบรูป</a>
		</div>
<!-- --------------------จบพรีวิวเลือกรูป ------------------ -->
<input type="hidden" name="food_id" value="<?=$rowd['food_id']?>"/>	
    <?php }?>
		<div class="form-group" align="center">
			<button class="btn btn-primary" type="button" style="font-size:16px" title="บันทึก" onClick="confirmdata();"><i class="fa fa-save" ></i> อัพเดทข้อมูลอาหาร</button>
		</div>
  </form>


<script>
	function chkfood_name(){
		if(document.getElementById('food_name').value == "")
		{
			$('#frm .food_name').addClass('has-error');
			$('#frm .food_name').removeClass('has-success');
			return false;
    	}else{
			$('#frm .food_name').addClass('has-success');
			$('#frm .food_name').removeClass('has-error');
		}
	}
	function chkfoodtype_id(){
		if(document.getElementById('foodtype_id').value == "")
		{
			$('#frm .foodtype_id').addClass('has-error');
			$('#frm .foodtype_id').removeClass('has-success');
			return false;
    	}else{
			$('#frm .foodtype_id').addClass('has-success');
			$('#frm .foodtype_id').removeClass('has-error');
		}
	}
	function chkfood_price(){
		if(document.getElementById('food_price').value == "")
		{
			$('#frm .food_price').addClass('has-error');
			$('#frm .food_price').removeClass('has-success');
			return false;
    	}else{
			$('#frm .food_price').addClass('has-success');
			$('#frm .food_price').removeClass('has-error');
		}
	}

	function confirmdata(){
	if(document.getElementById('food_name').value == "")
    {
        chkfood_name();
		$('#food_name').focus();
		return false;
    }
	if(document.getElementById('foodtype_id').value == "")
    {
        chkfoodtype_id();
		$('#foodtype_id').focus();
		return false;
    }
		document.getElementById("frm").submit();
		$("#buttontext").html("ระบบกำลังทำการโปรดรอสักครู่.....");
		document.getElementById("buttontext").disabled = true;
		return true;
	}
</script>
<script language="JavaScript">
	function chkNumber(ele)
	{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.') && (vchar != '-')) return false;
	ele.onKeyPress=vchar;
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