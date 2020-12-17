<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
 
<body>
 
<div style="margin:auto;">
<form id="form_checkbox1" name="form_checkbox1" method="post" action="">
<table width="600" border="0" align="center" cellpadding="0" cellspacing="2">
<thead>
  <tr>
    <th align="center" bgcolor="#CCFFCC">&nbsp;</th>
    <th bgcolor="#CCFFCC">Topic</th>
  </tr>
</thead>  
  <tr>
    <td width="50" align="center">
      <input name="data_item1" type="checkbox" class="css_data_item" id="data_item1" value="1" />
    </td>
    <td>Data1</td>
  </tr>
  <tr>
    <td width="50" align="center">
      <input name="data_item2" type="checkbox"  class="css_data_item" id="data_item2" value="2" />
    </td>
    <td>Data2</td>
  </tr>
  <tr>
    <td width="50" align="center">
      <input name="data_item3" type="checkbox" class="css_data_item"  id="data_item3" value="3" />
    </td>
    <td>Data3</td>
  </tr>
  <tr>
    <td width="50" align="center">
      <input name="data_item4" type="checkbox" class="css_data_item"  id="data_item4" value="4" />
    </td>
    <td>Data4</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Submit" /></td>
  </tr>      
</table>
 
</form>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
<script type="text/javascript">  
$(function(){        
       
    $(".css_data_item").click(function(){  // เมื่อคลิก checkbox  ใดๆ  
        if($(this).prop("checked")==false){ // ตรวจสอบ property  การ ของ   
            var indexObj=$(this).index(".css_data_item"); //   
            $(".css_data_item").not(":eq("+indexObj+")").prop( "checked", true ); // ยกเลิกการคลิก รายการอื่น  
        }  
    });  
 
    $("#form_checkbox1").submit(function(){ // เมื่อมีการส่งข้อมูลฟอร์ม  
        if($(".css_data_item:checked").length==0){ // ถ้าไม่มีการเลือก checkbox ใดๆ เลย  
            alert("NO");  
            return false;     
        }  
    });     
           
});  
</script>  
 
</body>
</html>
-----------------------------

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <title>Document</title> 
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@4.1.0/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body>
  
 <div class="container">
 <br>
<?php
$arr_language = array(
    "ไทย","อังกฤษ","จีน","ญี่ปุ่น","เกาหลี"
);
$arr_topup = array(
    100,200,500,1000,3000
);
$default_value = '';
$initial_value = NULL;
?>
<form id="myform1" name="form1" method="post" action="" class="needs-validation2" novalidate>
<div class="form-group row">
    <legend class="col-form-label col-sm-3 pt-0 text-left text-sm-right">เลือกภาษา</legend>
    <div class="col">   
        <div class="btn-group-toggle row mx-1" data-toggle="buttons">
          <?php 
          if(isset($arr_language)){ // BEGIN CHECK
              foreach($arr_language as $key_language=>$value_language){ // BEGIN LOOP
                    $active_state = (isset($default_value) && $default_value==$value_language)?" btn-info active":"btn-light";
                    $check_state = (isset($default_value) && $default_value==$value_language)?" checked":"";
                    if(isset($default_value) && $default_value==$value_language && is_null($initial_value)){
                        $initial_value = true;  
                    }
          ?>
          <label class="btn btn-sm col-4 mt-2 text-left shadow-sm btn-c-language <?=$active_state?>">
            <input type="checkbox" name="language[]" id="language_<?=$key_language?>" autocomplete="off"
            value="<?=$value_language?>" <?=$check_state?>> 
            <i class="far fa-square"></i>
            <?=$value_language?>
          </label>
          <?php
              } // END LOOP
          } // END CHECK
          ?>
        </div>       
        <input type="text" id="_language" class="form-control d-none" value="<?=$initial_value?>" required>
        <div class="invalid-feedback">
        กรุณาเลือกภาษา
        </div>                                   
    </div>
</div>
<div class="form-group row">
    <legend class="col-form-label col-sm-3 pt-0 text-left text-sm-right">จำนวนเงิน</legend>
    <div class="col">   
        <div class="btn-group-toggle row mx-1"  data-toggle="buttons">
          <?php 
          if(isset($arr_topup)){ // BEGIN CHECK
              foreach($arr_topup as $key_topup=>$value_topup){ // BEGIN LOOP
                    $active_state = (isset($default_value) && $default_value==$value_topup)?" btn-info active":"btn-light";
                    $check_state = (isset($default_value) && $default_value==$value_topup)?" checked":"";
                    if(isset($default_value) && $default_value==$value_topup && is_null($initial_value)){
                        $initial_value = true;  
                    }
          ?>
          <label class="btn btn-sm col-4 mt-2 shadow-sm btn-c-topup <?=$active_state?>">
            <input type="radio" name="topup" id="topup_<?=$key_topup?>" autocomplete="off"
            value="<?=$value_topup?>" required <?=$check_state?>> <?=number_format($value_topup,0)?>
          </label>
          <?php
              } // END LOOP
          } // END CHECK
          ?>
        </div>       
        <input type="text" id="_topup" class="form-control d-none" value="<?=$initial_value?>" required>
        <div class="invalid-feedback">
        กรุณายอดเงิน ที่ต้องการเติม
        </div>                                   
    </div>
</div>
<div class="form-group row">
    <legend class="col-form-label col-sm-3 pt-0 text-left text-sm-right">เงื่อนไขและข้อตกลง</legend>
    <div class="col">   
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-sm btn-light btn_accept">
            <input type="checkbox" name="accept_policy" id="accept_policy" value="1" autocomplete="off">
            <i class="far fa-square"></i>
             ยอมรับ
          </label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col col-sm-4 offset-sm-3 text-right pt-3">
         <button type="submit" name="btn_submit" id="btn_submit" value="1" class="btn btn-primary btn-block py-2">เติมเงิน</button>
    </div>
</div> 
</form> 
  
 </div>
  
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
function validCheckbox(obj,target_obj){
    setTimeout(function(){
        var check_val = $(obj).parent(".btn-group-toggle").find(":checkbox:checked").length;    
        check_val = (check_val>0)?1:'';
        $("#"+target_obj).val(check_val);           
    },100);
}
function validRadio(obj,target_obj){
    var check_val = $(obj).parent(".btn-group-toggle").find(":radio:checked").length;   
    $("#"+target_obj).val(check_val);   
}
$(function(){
     
    $(".btn_accept").click(function(){
            var obj = $(this);
            var check_status = obj.find(":checkbox:checked").length;
            var state_active = "btn-info";
            var state_inactive = "btn-light";
            obj.toggleClass(state_active+' '+state_inactive);           
            obj.find("i").toggleClass("far fas fa-square fa-check-square");
    }); 
     
    $(".btn-c-language").on("click",function(){
        var obj = $(this);
        validCheckbox(obj[0],'_language')
        var check_status = obj.find(":checkbox:checked").length;
        var state_active = "btn-danger";
        var state_inactive = "btn-light";
        obj.toggleClass(state_active+' '+state_inactive);   
        obj.find("i").toggleClass("far fas fa-square fa-check-square");
    });
         
    $(".btn-c-topup").on("click",function(){
        var obj = $(this);
        validRadio(obj[0],'_topup')
        var check_status = obj.find(":radio:checked").length;
        var state_active = "btn-info";
        var state_inactive = "btn-light";
        if(check_status==0){
            obj.addClass(state_active).removeClass(state_inactive);
            obj.siblings("label."+state_active).addClass(state_inactive).removeClass(state_active);
        }
    });
     
     $("#myform1").on("submit",function(){
         var form = $(this)[0];
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');         
     });
});
</script>
</body>
</html>
<div>
  <form action="#" onSubmit="return false;">
    <div>
      <label>Item 1
        <input type="checkbox"  class="css_chk" name="ch1" value=""  />
      </label>
      <br />
      <label>Item 2
        <input type="checkbox" class="css_chk"  name="ch2"  value=""  />
      </label>
      <br>
      <label>Item 3
        <input type="checkbox" class="css_chk"  name="ch3" value=""  />
      </label>
      <label><br>
        Item 4
        <input type="checkbox" class="css_chk"  name="ch4"  value=""  />
      </label>
    </div>
  </form>
</div>
  
  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>      
<script type="text/javascript">
$(function(){
    // ถ้าตัวที่มี class ชื่อ css_chk ตัวที่ 4 (base เริ่มต้นที่ 0) ถูกคลิก
   $(".css_chk:eq(3)").on("click",function(e){
       var i_check=$(this).prop("checked"); // เก็บค่าที่ถูกคลิกเป็น true หรือ false
       // แล้วให้ค่าที่มี class ชื่อ css_chk ตัวที่ไม่ใช่ตัวที่ 4 ก็คือ น้อยกว่า 3 ให้ disabled ตามค่าตัวแปร
       $(".css_chk:lt(3)").prop("disabled",i_check); // ถ้าเลือกก็ true หรือก็คือ disabled 
   });
});  

/* 
$(document).ready(function(){
    $('.check:button').toggle(function(){
        $('input:checkbox').attr('checked','checked');
        $(this).val('uncheck all');
    },function(){
        $('input:checkbox').removeAttr('checked');
        $(this).val('check all');        
    })
}) */
</script>