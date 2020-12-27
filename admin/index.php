<?php include("config.php"); 
session_start();
if(!isset($_SESSION["username"]) || $_SESSION["password"] ==""){
	echo'<meta http-equiv="refresh" content="0;url=login.php">';
	exit(0);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css">
		<?php 
			$sqlimg="select restaurant_img from restaurant";
			$resultimg=$db->query($sqlimg);
			while($rowimg=$resultimg->fetch_array(MYSQLI_BOTH)){
			?>
		<link rel="icon" href="img/<?=$rowimg["restaurant_img"]?>">
			<?php }?>
		<!-- <link rel="stylesheet" href="fonts/Kamit.css" > -->
		<link rel="stylesheet" href="fonts/Mali.css">
		<link rel="stylesheet" href="fonts/font-awesome.min.css">
		<link rel="stylesheet" href="css/ionicons.min.css">
		<script src="js/sweetalert2@10.js"></script> <!--sweetalert2@10-->
		
		<script src="js/jquery-2.2.0.min.js"></script>
   <!-- <script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/data.js"></script> -->
		<script src="js/main.js"></script>

		<link rel="stylesheet" href="css/dataTables.main.css"/> <!-- Datatable -->

		<!-- สไลค์ดูภาพอุปกรณ์ -->
		<link rel="stylesheet" href="css/jquery.fancybox.min.css" media="screen">
		<script src="js/jquery.fancybox.min.js"></script>
		
	</head>
	<body>
		<div class="header">
			<div class="logo">
				<a href="index.php"><i class="fa fa-tachometer"></i> Admin</a>
			</div>
			<a href="#" class="nav-trigger"><span></span></a>
			<?php 
			$sql="select * from restaurant";
			$result=$db->query($sql);
			while($row=$result->fetch_array(MYSQLI_BOTH)){
			?>
			<div class="namestore"><?=$row["restaurant_name"]?></div>
			<?php 
			}
			?>
		</div>
		<div class="side-nav">
			<div class="logo">
			<i class="fa fa-tachometer">
				<a href="index.php"></i> Admin</a>
			</div>
			<nav>
				<ul>
				<?php if(!$_GET) $_GET['page']="main"?>
					<li <?php if($_GET['page']=="main") echo'class="active"'?>>
						<a href="index.php" title="ยอดขาย">
							<span><i class="fa fa-bar-chart"></i></span><!-- fa-pie-chart -->
							<span>ยอดขาย</span>
						</a>
					</li>
					<li <?php if($_GET['page']=="datatable") echo'class="active"'?>
						<?php if($_GET['page']=="datatable_edit") echo'class="active"'?>>
						<a href="?page=datatable" title="ข้อมูลโต๊ะอาหาร">
							<span><i class="fa fa-table"></i></span>
							<span>ข้อมูลโต๊ะอาหาร</span>
						</a>
					</li>
					<li <?php if($_GET['page']=="foodcategory") echo'class="active"'?>
					<?php if($_GET['page']=="foodcategory_new") echo'class="active"'?>
					<?php if($_GET['page']=="foodcategory_edit") echo'class="active"'?>>
						<a href="?page=foodcategory" title="หมวดหมู่อาหาร">
							<span><i class="fa fa-th-list"></i></span>
							<span>หมวดหมู่อาหาร</span>
						</a>
					</li>
					<li <?php if($_GET['page']=="foodinformation") echo'class="active"'?>
					<?php if($_GET['page']=="foodinformation_new") echo'class="active"'?>
					<?php if($_GET['page']=="foodinformation_edit") echo'class="active"'?>>
						<a href="?page=foodinformation" title="ข้อมูลอาหาร">
							<span><i class="fa fa-th"></i></span>
							<span>ข้อมูลอาหาร</span>
						</a>
					</li>
					<li <?php if($_GET['page']=="food_topping") echo'class="active"'?>
					<?php if($_GET['page']=="food_topping_new") echo'class="active"'?>
					<?php if($_GET['page']=="food_topping_edit") echo'class="active"'?>>
						<a href="?page=food_topping" title="ข้อมูลอาหาร">
							<span><i class="fa fa-fort-awesome"></i></span>
							<span>ข้อมูลท็อปปิ้ง</span>
						</a>
					</li>
					<li <?php if($_GET['page']=="restaurant") echo'class="active"'?>
					<?php if($_GET['page']=="restaurant_edit") echo'class="active"'?>>
						<a href="?page=restaurant" title="ข้อมูลร้านอาหาร">
							<span><i class="fa fa-cogs"></i></span>
							<span>ข้อมูลร้านอาหาร</span>
						</a>
					</li>
					<li <?php if($_GET['page']=="popularmenu") echo'class="active"'?>>
						<a href="?page=popularmenu" title="เมนูยอดนิยม">
							<span><i class="fa fa-thumbs-up"></i></span>
							<span>เมนูยอดนิยม</span>
						</a>
					</li>
					<li <?php if($_GET['page']=="price_category") echo'class="active"'?>
					<?php if($_GET['page']=="price_category_edit") echo'class="active"'?>>
						<a href="?page=price_category" title="ประเภทราคา">
							<span><i class="fa fa-star-half-o"></i></span>
							<span>ประเภทราคา</span>
						</a>
					</li>
					<li <?php if($_GET['page']=="report") echo'class="active"'?>>
						<a href="?page=report" title="รายงาน">
							<span><i class="fa fa-line-chart"></i></span>
							<span>รายงาน</span>
						</a>
					</li>
					<!-- <li <?php if($_GET['page']=="orders") echo'class="active"'?>>
						<a href="?page=orders" title="ออร์เดอร์">
							<span><i class="fa fa-sort"></i></span>
							<span>สถานะออร์เดอร์</span>
						</a>
					</li> -->
					<li>
						<a href="../admin_noodle/index.php" title="ออเดอร์ก๋วยเตี๋ยวฯ">
							<span><i class="fa fa-arrow-right"></i></span>
							<span>ออเดอร์ก๋วยเตี๋ยวฯ</span>
						</a>
					</li>
					<li>
						<a href="../admin_dessert_drink/index.php" title="ออเดอร์ของหวานฯ">
							<span><i class="fa fa-arrow-right"></i></span>
							<span>ออเดอร์ของหวานฯ</span>
						</a>
					</li>
					<li>
						<a href="../admin_hell/index.php" title="ออเดอร์เมนูนรก">
							<span><i class="fa fa-arrow-right"></i></span>
							<span>ออเดอร์เมนูนรก</span>
						</a>
					</li>
					<li>
						<a href="../admin_cashier/index.php" title="แผนกแคชเชียร์">
							<span><i class="fa fa-money"></i></span>
							<span>แผนกแคชเชียร์</span>
						</a>
					</li>
					<li <?php if($_GET['page']=="logout") echo'class="active"'?>>
						<a href="?page=logout" title="ออกจากระบบ">
							<span><i class="fa fa-sign-out"></i></span>
							<span style="color: tomato;">ออกจากระบบ</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="main-content">
		<?php
		if(@$_GET['fd'])
		$file=$_GET['fd']."/".$_GET['page'].".php";
		else
		$file=@$_GET['page'].".php";
		if(is_file($file)){
		require_once("$file");
		}
		else{
		require_once("main.php");
		}
		?>
		</div>
	</body>
  	<script src="js/jquery.dataTables.min.js"></script>
  	<script src="js/dataTables.bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
		//FANCYBOX เลื่อนรูป
		//https://github.com/fancyapps/fancyBox
		$(".fancybox").fancybox({
			openEffect: "none",
			closeEffect: "none"
		});
		});
	</script>
</html>