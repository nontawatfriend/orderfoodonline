<?php
if(!isset($_SESSION["username"]) || $_SESSION["username"] =="" || $_SESSION["password"] =="" and !isset($_COOKIE["yourusername"]) || $_COOKIE["yourusername"] =="" || $_COOKIE["yourpassword"] ==""){
	echo'<meta http-equiv="refresh" content="0;url=login.php">';
	exit(0);
} ?>
<div class="title">รายงาน</div>
			<div class="main">
				<div class="widget" style="text-align: center; flex-basis: 98%; height: 100px; padding: 0 10px 10px 10px; font-size: 1.1em">
					<div class="title-ad"> 
		            </div>
                    .....
					<br>
				</div>
				
				<div class="widget">
					<div class="title">รายการขายดี</div>
					<div class="chart"></div>
				</div>
				<div class="widget">
					<div class="title">รายการขายดี</div>
					<div class="chart"></div>
				</div>
				<div class="widget">
					<div class="title">รายการขายดี</div>
					<div class="chart"></div>
				</div>
			</div>
