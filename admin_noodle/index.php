<?php include("../admin/config.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin_noodle</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css">
		<?php 
			$sqlimg="select restaurant_img from restaurant";
			$resultimg=$db->query($sqlimg);
			while($rowimg=$resultimg->fetch_array(MYSQLI_BOTH)){
			?>
		<link rel="icon" href="../admin/img/<?=$rowimg["restaurant_img"]?>">
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
		<!-- เรียกใช้งาน ajax -->
		<script language="JavaScript">
	   	var HttPRequest = false;
		function doCallAjax(Sort) {
			HttPRequest = false;
			if (window.XMLHttpRequest) { // Mozilla, Safari,...
				HttPRequest = new XMLHttpRequest();
				if (HttPRequest.overrideMimeType) {
					HttPRequest.overrideMimeType('text/html');
				}
			} else if (window.ActiveXObject) { // IE
				try {
					HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
				} catch (e) {
					try {
					HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
					} catch (e) {}
				}
			} 
			if (!HttPRequest) {
				alert('Cannot create XMLHTTP instance');
				return false;
			}
				var url = 'AjaxPHPRealtime.php';
				var pmeters = 'mySort='+Sort;
				HttPRequest.open('POST',url,true);

				HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				HttPRequest.setRequestHeader("Content-length", pmeters.length);
				HttPRequest.setRequestHeader("Connection", "close");
				HttPRequest.send(pmeters);
				
				HttPRequest.onreadystatechange = function()
				{
					if(HttPRequest.readyState == 3)  // Loading Request
					{
					document.getElementById("mySpan").innerHTML = "Now is Loading...";
					}

					if(HttPRequest.readyState == 4) // Return Request
					{
					document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
					}
				}
		}
	</script>
		
	</head>
	<body Onload="bodyOnload();">
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
				<a href="index.php"></i> Admin_noodle</a>
			</div>
			<nav>
				<ul>
				<?php if(!$_GET) $_GET['page']="main"?>
					<li <?php if($_GET['page']=="main") echo'class="active"'?>>
						<a href="index.php" title="order">
							<span><i class="fa fa-sort" aria-hidden="true"></i></span>
							<span>order</span>
						</a>
					</li>
					<li <?php if($_GET['page']=="token") echo'class="active"'?>
					<?php if($_GET['page']=="token_edit") echo'class="active"'?>>
						<a href="?page=token" title="token แจ้งเตือน">
							<span><i class="fa fa-bell"></i></span>
							<span>token แจ้งเตือน</span>
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