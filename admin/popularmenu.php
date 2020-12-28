<?php
if(!isset($_SESSION["username"]) || $_SESSION["username"] =="" || $_SESSION["password"] =="" OR !isset($_COOKIE["yourusername"]) || $_COOKIE["yourusername"] =="" || $_COOKIE["yourpassword"] ==""){
	echo'<meta http-equiv="refresh" content="0;url=login.php">';
	exit(0);
} ?>
<link rel="stylesheet" href="css/main2.css">
<div class="title">เมนูยอดนิยม/ขายดี</div>
<?php
require 'config.php';
?>
<div class="product-cart">
<h4 class="page-banner-sm">ของหวาน</h4>
    <div class="wrapper">
        <div class="product-collection">
        <?php
        $sql="SELECT id.food_id from (select food_id, count(food_id) from order_list where food_typeid='4' group by food_id order by count(food_id) desc limit 1) as id";/* จำนวนแถวที่มากที่สุดคือเลขนี้ของประเภทไอดีเท่ากับ4 */
        $food_id=$db->query($sql);
        while ($rowid=$food_id->fetch_array(MYSQLI_BOTH)){
        ?>
            <?php
                $meSql = "SELECT * FROM food INNER JOIN order_list on food.food_id=order_list.food_id where order_list.food_typeid='4' and order_list.food_id='".$rowid["food_id"]."' GROUP BY order_list.food_typeid desc";
                $meQuery = $db->query($meSql);
                while ($row=$meQuery->fetch_array(MYSQLI_BOTH)){  
            ?>
            <div class="product-item">
                <form action="?page=popular_menu_session" method="post">
                <input type="hidden" name="food_name" value="<?=$row["food_name"]?>">
                <!-- <input type="hidden" name="food_price" value="<?=$row["food_price"]?>"> -->
                    <div class="product-product">
                        <a class="fancybox img-thumbnail" title="<?=$row['food_name'];?>" rel="ligthbox" href="img/<?=$row['food_img'];?>">
                            <img class="img-responsive" alt="<?=$row['food_name'];?>" src="img/<?=$row["food_img"]?>"/>
                        </a>
                        <div class="product-product-info">
                            <input type="hidden" name="food_id" value="<?php echo $row["food_id"];?>">
                            <input type="hidden" name="foodtype_id" value="<?php echo $row["foodtype_id"];?>">
                            <p class="product-product-name"><?php echo $row["food_name"];?></p>
                            <p class="product-price-sm">ราคา <?php echo $row["food_price"];?> บาท</p>
                            <input type="hidden" name="food_price" value="<?php echo $row["food_price"];?>">
                            <small>x 1</small>
                        </div>
                    </div>
                </form>
            </div>
            <?php }} ?>
        </div>
    </div>
</div>
<div class="product-cart">
<h4 class="page-banner-sm">เครื่องดื่ม</h4>
    <div class="wrapper">
        <div class="product-collection">
        <?php
        $sql2="SELECT id.food_id from (select food_id, count(food_id) from order_list where food_typeid='5' group by food_id order by count(food_id) desc limit 1) as id";/* จำนวนแถวที่มากที่สุดคือเลขนี้ของประเภทไอดีเท่ากับ5 */
        $food_id2=$db->query($sql2);
        while ($rowid2=$food_id2->fetch_array(MYSQLI_BOTH)){
        ?>
            <?php
                $meSql = "SELECT * FROM food INNER JOIN order_list on food.food_id=order_list.food_id where order_list.food_typeid='5' and order_list.food_id='".$rowid2["food_id"]."' GROUP BY order_list.food_typeid desc";
                $meQuery = $db->query($meSql);
                while ($row=$meQuery->fetch_array(MYSQLI_BOTH)){  
            ?>
            <div class="product-item">
                <form action="?page=popular_menu_session" method="post">
                <input type="hidden" name="food_name" value="<?=$row["food_name"]?>">
                    <div class="product-product">
                        <a class="fancybox img-thumbnail" title="<?=$row['food_name'];?>" rel="ligthbox" href="img/<?=$row['food_img'];?>">
                            <img class="img-responsive" alt="<?=$row['food_name'];?>" src="img/<?=$row["food_img"]?>"/>
                        </a>
                        <div class="product-product-info">
                            <input type="hidden" name="food_id" value="<?php echo $row["food_id"];?>">
                            <input type="hidden" name="foodtype_id" value="<?php echo $row["foodtype_id"];?>">
                            <p class="product-product-name"><?php echo $row["food_name"];?></p>
                            <p class="product-price-sm">ราคา <?php echo $row["food_price"];?> บาท</p>
                            <input type="hidden" name="food_price" value="<?php echo $row["food_price"];?>">
                            <small>x 1</small>
                        </div>
                    </div>
                </form>
            </div>
            <?php }} ?>
        </div>
    </div>
</div>
<div class="product-cart">
<h4 class="page-banner-sm">เมนูนรก</h4>
    <div class="wrapper">
        <div class="product-collection">
        <?php
        $sql2="SELECT id.food_id from (select food_id, count(food_id) from order_list where food_typeid='6' group by food_id order by count(food_id) desc limit 1) as id";/* จำนวนแถวที่มากที่สุดคือเลขนี้ของประเภทไอดีเท่ากับ6 */
        $food_id2=$db->query($sql2);
        while ($rowid2=$food_id2->fetch_array(MYSQLI_BOTH)){
        ?>
            <?php
                $meSql = "SELECT * FROM food INNER JOIN order_list on food.food_id=order_list.food_id where order_list.food_typeid='6' and order_list.food_id='".$rowid2["food_id"]."' GROUP BY order_list.food_typeid desc";
                $meQuery = $db->query($meSql);
                while ($row=$meQuery->fetch_array(MYSQLI_BOTH)){  
            ?>
            <div class="product-item">
                <form action="?page=popular_menu_session" method="post">
                <input type="hidden" name="food_name" value="<?=$row["food_name"]?>">
                    <div class="product-product">
                        <a class="fancybox img-thumbnail" title="<?=$row['food_name'];?>" rel="ligthbox" href="img/<?=$row['food_img'];?>">
                            <img class="img-responsive" alt="<?=$row['food_name'];?>" src="img/<?=$row["food_img"]?>"/>
                        </a>
                        <div class="product-product-info">
                            <input type="hidden" name="food_id" value="<?php echo $row["food_id"];?>">
                            <input type="hidden" name="foodtype_id" value="<?php echo $row["foodtype_id"];?>">
                            <p class="product-product-name"><?php echo $row["food_name"];?></p>
                            <p class="product-price-sm">ราคา <?php echo $row["food_price"];?> บาท</p>
                            <input type="hidden" name="food_price" value="<?php echo $row["food_price"];?>">
                            <small>x 1</small>
                        </div>
                    </div>
                </form>
            </div>
            <?php }} ?>
        </div>
    </div>
</div>
<div class="product-cart">
<h4 class="page-banner-sm">เกาเหลา</h4>
    <div class="wrapper">
        <div class="product-collection">
        <?php
        $sql2="SELECT id.food_id from (select food_id, count(food_id) from order_list where food_typeid='7' group by food_id order by count(food_id) desc limit 1) as id";/* จำนวนแถวที่มากที่สุดคือเลขนี้ของประเภทไอดีเท่ากับ7 */
        $food_id2=$db->query($sql2);
        while ($rowid2=$food_id2->fetch_array(MYSQLI_BOTH)){
        ?>
            <?php
                $meSql = "SELECT * FROM food INNER JOIN order_list on food.food_id=order_list.food_id where order_list.food_typeid='7' and order_list.food_id='".$rowid2["food_id"]."' GROUP BY order_list.food_typeid desc";
                $meQuery = $db->query($meSql);
                while ($row=$meQuery->fetch_array(MYSQLI_BOTH)){  
            ?>
            <div class="product-item">
                <form action="?page=popular_menu_session" method="post">
                <input type="hidden" name="food_name" value="<?=$row["food_name"]?>">
                    <div class="product-product">
                        <a class="fancybox img-thumbnail" title="<?=$row['food_name'];?>" rel="ligthbox" href="img/<?=$row['food_img'];?>">
                            <img class="img-responsive" alt="<?=$row['food_name'];?>" src="img/<?=$row["food_img"]?>"/>
                        </a>
                        <div class="product-product-info">
                            <input type="hidden" name="food_id" value="<?php echo $row["food_id"];?>">
                            <input type="hidden" name="foodtype_id" value="<?php echo $row["foodtype_id"];?>">
                            <p class="product-product-name"><?php echo $row["food_name"];?></p>
                            <p class="product-price-sm">ราคา <?php echo $row["food_price"];?> บาท</p>
                            <input type="hidden" name="food_price" value="<?php echo $row["food_price"];?>">
                            <small>x 1</small>
                        </div>
                    </div>
                </form>
            </div>
            <?php }} ?>
        </div>
    </div>
</div>