<?php
session_start();
?>
<div class="product-cart">
    <hr>
    <h4 class="page-banner-sm" align="center">ตะกร้า (โต๊ะ <?php echo $_SESSION["id_table"]; ?>)</h4>
    <hr>
    <?php
?>
    <div class="wrapper">
        <div class="cart-collection">
            <div class="cart-header">
                <p>รายการ</p>
                <p style="margin-right:30px;">จำนวน</p>
                <p>ราคาต่อหน่วย</p>
                <p>ราคารวม</p>
                <p>ลบรายการ</p>
            </div>
            <?php
            $total_price=0;
            for($i=0;$i<=(int)$_SESSION["intLine"];$i++){
	            if($_SESSION["strProductID"][$i] != ""){
                $total_price = $total_price + ($_SESSION["strType2"][$i] * $_SESSION["strQty"][$i]);
            ?>
            <div class="cart-item">
                <form action="" method="post" name="form">
                    <div class="cart-product">
                        <div class="cart-image" style="background-image:url(admin/img/food.jpg)"></div>
                        <div class="cart-product-info">
                            <p class="cart-product-name"><?php echo $_SESSION["strProductID"][$i];$teste=$_SESSION["strFlavors"][$i]; foreach ($teste as $key => $id){ echo '/'.$id;} echo ','.$_SESSION["strType"][$i].',('.$_SESSION["strType2"][$i].') *'.$_SESSION["strDetail"][$i] ?></p>
                            <!-- <p class="cart-price-sm">1520</p> -->
                            <!-- <small>x 1</small> -->
                        </div>
                    </div>
                    <div class="cart-quantity-md">
                        <div class="cart-quantity-controls">
                            <button type="button" class="dec button">-</button>
                                <!-- <input type="number" value="1" min="1"> -->
                                <input type="number" name="" value="<?php echo $_SESSION["strQty"][$i] ?>">
                                <!--  class="form-control" style="width: 60px;text-align: center;" -->
                                <input type="hidden" name="" value="">
                            <button type="button" class="inc button">+</button> 
                        </div>
                    </div>
                    <div class="cart-unit-price">
                        <h4><?php echo $_SESSION["strType2"][$i] ?></h4>
                    </div>
                    <div class="cart-product-total">
                        <h4><?php echo $_SESSION["strType2"][$i]*$_SESSION["strQty"][$i] ?></h4>
                    </div>
                    <div class="cart-controls-sm">
                         <!-- มือถือ -->
                        <div class="cart-quantity-controls-sm">
                            <button type="button" class="dec button">-</button>
                                <!-- <input type="number" value="1" min="1"> -->
                                <input type="number" name="" value="<?php echo $_SESSION["strQty"][$i] ?>">
                                <!--  class="form-control" style="width: 60px;text-align: center;" -->
                                <input type="hidden" name="" value="">
                            <button type="button" class="inc button">+</button> 
                        </div> 
                        <div class="remove">
                            <!-- <a href=""><span class="fa fa-trash"></span>  Remove</a> -->
                            <a class="btn btn-danger" href="?page=cart&itemId=<?php echo $i;?>" role="button"><span class="fa fa-trash"></span> ลบทิ้ง</a>
                        </div>
                    </div>
                </form>
                </div>
                <?php
                    	}
                    }
                ?>
            
                <div class="cart-total-holder">
                    <div class="cart-total">
                        <p>Total: </p>
                        <p><?php echo ($total_price); ?></p>
                    </div>
                    <div class="cart-action-button">
                        <!-- <a href="index.php">สั่งรายการต่อ</a> -->
                        <button class="" id="submit" type="submit" onClick="submit();">คำนวณราคาอาหารใหม่</button>
                        <a href="" class="btn-main">ยืนยันรายการ</a>
                </div>
            </div>
        </div>
    </div>

</div>