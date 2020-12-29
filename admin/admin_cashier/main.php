<?php
include("../config.php");
if(!isset($_SESSION["username"]) || $_SESSION["username"] =="" || $_SESSION["password"] =="" and !isset($_COOKIE["yourusername"]) || $_COOKIE["yourusername"] =="" || $_COOKIE["yourpassword"] ==""){
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
<div class="title">ออร์เดอร์ทั้งหมด (แคชเชียร์)</div>
<script language="JavaScript">
	function bodyOnload()
	{
		doCallAjax('order_id')
		setTimeout("doLoop();",60000); /* 2000 เท่ากับ 2วิ 60000 เท่ากับ 60วิ*/
	}

	function doLoop()
	{
		bodyOnload();
	}
</script>
<span id="mySpan"></span>
