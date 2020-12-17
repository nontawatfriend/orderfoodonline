<?php
session_start();
require 'admin/config.php';
?>

<hr>
<h3 align="center"><b>หมวดหมู่ก๋วยเตี๋ยว</b></h3>
<hr>
<div align="center">

<form action="?page=noodle_session" method="POST" id="formsession">
    <h4 style="font-weight: bold;">เส้น</h4>
    <?php 
		$sql="select * from food where foodtype_id=3 and food_flag=1 order by food_id ASC";
		$result=$db->query($sql);
		while($row=$result->fetch_array(MYSQLI_BOTH)){
	?>
    <div class="radio-inline">
        <label>
            <input type="radio" name="food_id" value="<?php echo $row["food_id"];?>" checked><?=$row['food_name']?>
            <input type="hidden" name="foodtype_id" value="<?php echo $row["foodtype_id"];?>">
        </label>
    </div>
   
    <?php
        }
    ?>
    <?php 
		$sql="select * from food where foodtype_id=3 and food_flag=2";
		$result=$db->query($sql);
		while($row=$result->fetch_array(MYSQLI_BOTH)){
	?>
    <div class="radio-inline disabled">
        <label><input type="radio" name="" value="" disabled><?=$row['food_name']?> (หมด)</label>
    </div>
    <?php
        }
    ?>
    <h4 style="font-weight: bold;">ท็อปปิ้ง</h4>
    <div class="">
    <?php 
		$sql="select * from food_topping where foodtopping_flag=1";
		$result=$db->query($sql);
		while($row=$result->fetch_array(MYSQLI_BOTH)){
	?>
        <div class="checkbox-inline">
            <label>
                <input type="checkbox" name="foodtopping_name[]" checked value="<?=$row['foodtopping_name']?>"><?=$row['foodtopping_name']?>
                <input type="hidden" name="foodtopping_id[]" value="<?php echo $row["foodtopping_id"];?>">
            </label>
        </div>
    <?php
        }
    ?>
    <?php 
		$sql="select * from food_topping where foodtopping_flag=2";
		$result=$db->query($sql);
		while($row=$result->fetch_array(MYSQLI_BOTH)){
	?>
        <div class="checkbox-inline disabled">
            <label><input type="checkbox" value="" disabled><?=$row['foodtopping_name']?> (หมด)</label>
        </div>
    <?php
        }
    ?>

    </div>

    <!-- <h1>เลือก</h1> -->
    <br>
    <div>
        <div class="radio-inline">
            <label><input type="radio" name="food_water" value="น้ำ" checked>น้ำ</label>
        </div>
        <div class="radio-inline">
            <label><input type="radio" name="food_water"  value="แห้ง">แห้ง</label>
        </div>  
    </div>
    <br>
    <div>
    <?php 
		$sql="select * from price_category";/*  order by pricecategory_id ASC */
		$result=$db->query($sql);
		while($row=$result->fetch_array(MYSQLI_BOTH)){
	?>
        <div class="radio-inline">
            <label>
           <input type="radio" name="food_price" value="<?=$row['pricecategory_price']?>" <?php if($row['pricecategory_id']=='1'){ echo "checked=checked";}  ?>><?=$row['pricecategory_name']?>(<?=$row['pricecategory_price']?>)
            </label>
        </div>
    <?php
        }
    ?>
    </div>
    <br>
    <div class="cart-quantity-md-noodle">
        <div class="cart-quantity-controls"> 
        <label>จำนวน :</label>
        <button type="button" class="dec button">-</button>
                <!-- <input type="number" value="1" min="1"> -->
                <input type="number" name="food_unit" value="1" min="1"><!--  class="form-control" style="width: 60px;text-align: center;" -->
            <button type="button" class="inc button">+</button> 
        </div> 
    </div>
    <br>
    <div class="col-md-12">
        <label for="" class="col-md-5 col-xs-4" align="right" style="margin: 5px; padding:0;">หมายเหตุ: </label>
        <div class="col-md-3 col-xs-6" >
            <input type="text" style="caret-color: red;" name="food_note" class="form-control" placeholder="หมายเหตุ">
        </div>
    </div>
    <br>
    <br>
    <br>
    <button type="button" class="btn btn-primary" onClick="Submit();" id="buttontext" >เพิ่มลงตะกร้า</button>
</form>
</div>
<script>
    function Submit(){
		document.getElementById("formsession").submit();
		$("#buttontext").html("ระบบกำลังทำการโปรดรอสักครู่.....");
		document.getElementById("buttontext").disabled=true;
		return true;
	}
</script>