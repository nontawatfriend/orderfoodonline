<?php
if(!isset($_SESSION["username"]) || $_SESSION["username"] =="" || $_SESSION["password"] =="" OR !isset($_COOKIE["yourusername"]) || $_COOKIE["yourusername"] =="" || $_COOKIE["yourpassword"] ==""){
	echo'<meta http-equiv="refresh" content="0;url=../admin/login.php">';
	exit(0);
}
?>
<style>
.title a{
    float:right; /*ชิดขวา */
    text-decoration: none; /* underline  อันนี้คือมีขีดเส้นใต้*/
    text-align: right;
}
</style>
<?php include("../admin/config.php"); ?>
<div class="title">ออร์เดอร์ทั้งหมด (แคชเชียร์)</div>
<script language="JavaScript">
	function bodyOnload()
	{
		doCallAjax('order_id')
		setTimeout("doLoop();",2000); /* 2วิ */
	}

	function doLoop()
	{
		bodyOnload();
	}
</script>
<span id="mySpan"></span>
