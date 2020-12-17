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
<div>
    <div class="title">แก้ไขข้อมูลโต๊ะอาหาร โต๊ะ(<?php echo $_GET["table_id"] ?>)</div><br>
    
        <?php 
            $sql="select * from tables where tables_id='".$_GET["table_id"]."'";
            $result=$db->query($sql);
            while($row=$result->fetch_array(MYSQLI_BOTH)){
        ?>
        <div class="form-group">
            <label class="col-sm-5 control-label" align="right">QR CODE</label>
            <div class="col-sm-3 tel">
                <a class="fancybox img-thumbnail" title="<?=$row['tables_images'];?>" rel="ligthbox" href="table_img/<?=$row['tables_images'];?>">
                    <img class="img-responsive" alt="<?=$row['tables_images'];?>" src="table_img/<?=$row["tables_images"]?>" height="auto" width="300" name="tables_images"/>
                </a>
            </div>
        </div>
        <form method="post" class="form-horizontal" action="?page=datatable_update" enctype="multipart/form-data" accept-charset="UTF-8">
        <div class="form-group">
                <label class="col-sm-5 control-label">แก้ไข QR CODE</label>
                <div class="col-sm-3">
                    <div class="input-group image-preview">
                    <!-- <div class="input-group image-preview">เดิม -->
                        <input type="text" class="form-control image-preview-filename" value="<?=$row["tables_images"]?>" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                        <span class="input-group-btn">
                            <!-- image-preview-clear button -->
                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                <span class="glyphicon glyphicon-remove"></span> Clear
                            </button>
                            <!-- image-preview-input -->
                            <div class="btn btn-default image-preview-input">
                                <span class="glyphicon glyphicon-folder-open"></span>
                                <span class="image-preview-input-title">Browse</span>
                                <input type="file" accept="image/png, image/jpeg, image/gif, image/jpg " name="tables_images" id="tables_images"/> <!-- rename it ตรงname เอา input-file-preview ออก -->
                                <input type="hidden" name="tables_image" value="<?=$row['tables_images']?>"/> <!-- ส่งรูปเก่าไป -->
                                <input type="hidden" name="tables_id" value="<?=$row['tables_id']?>">
                            </div>
                        </span>
                    </div><!-- /input-group image-preview [TO HERE]--> 
                </div>
            </div>
            <div class="form-group">
		        <label class="col-sm-5 control-label">ลิ้งโต๊ะอาหาร </label>
		        <div class="col-sm-3">
			    <textarea type="text" class="form-control" name="tables_link" id="tables_link" required="required" ><?=$row["tables_link"]?></textarea>
		        </div>
	        </div>
            <div class="form-group" align="center">
                <button class="btn btn-warning buttontext" type="submit" style="font-size:16px" title="อัพเดท"><i class="fa fa-save" ></i> อัพเดทข้อมูล</button>
            </div>
            <?php 
                }
            ?>
    </form>
</div>
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