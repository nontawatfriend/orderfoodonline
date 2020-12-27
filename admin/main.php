<?php
date_default_timezone_set('Asia/Bangkok');
$today=date("Y-m-d");
$today2=date("d/m/Y");

?>
<style>
	td{
		text-align: center;
	}
	.widget {
	/* flex-basis: 300px; */
	flex-basis: 100%;
	flex-grow: 10;
	height: auto;
	margin: 15px;
	border-radius: 6px;
	background-color: #ffffff;
	position: relative;
}
</style>
			<div class="title">ยอดขาย</div>
			<div class="main">
				<div class="widget" style="text-align: center; flex-basis: 98%; height: 100px; padding: 0 10px 10px 10px; font-size: 1.1em">
					<div class="title-ad"> 
		            </div>
					<br>
					<b>ยอดขายวันนี้ <b id="showData2"></b> บาท (<?php echo $today2; ?>)</b>
					<br><br>
					<b>ยอดขายทั้งหมด  <b id="showData1"></b> บาท</b>
				</div>
				
				<div class="widget">
					<div class="title">ยอดขายต่อวัน</div>
					<div class="chart"><br>
						<table class="table table-hover table-bordered" id="example1" width="100%">
							<thead style="background-color: #35475e">
							<tr>
								<th>วันที่</th>
								<th>ยอดขายรวม (บาท)</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$sql="SELECT order_date,order_price,order_id, SUM(order_price) as order_price FROM orders GROUP BY order_date order by order_date DESC";
								$result=$db->query($sql);
        						while($row=$result->fetch_array(MYSQLI_BOTH)){ 
							?>
								<tr>
									<td><?php echo $row["order_date"];?></td>
									<td><?php echo number_format($row["order_price"]);?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="widget">
					<div class="title">ยอดขายต่อเดือน</div>
					<div class="chart"><br>
					<table class="table table-hover table-bordered" id="example2" width="100%">
						<thead style="background-color: #35475e">
							<tr>
								<th>เดือน</th>
								<th>ยอดขายรวม (บาท)</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$sql="SELECT order_date,order_price,order_id, MONTH(order_date) as order_datemonth, YEAR(order_date) as order_dateyear , SUM(order_price) as order_price FROM orders GROUP BY order_dateyear,order_datemonth order by order_date DESC";
								$result=$db->query($sql);
        						while($row=$result->fetch_array(MYSQLI_BOTH)){ 		
							?>
								<tr>
									<td><?php echo $row["order_dateyear"].'-'.$row["order_datemonth"];?></td>
									<td><?php echo number_format($row["order_price"]);?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="widget">
					<div class="title">ยอดขายต่อปี</div>
					<div class="chart"><br>
					<table class="table table-hover table-bordered" id="example3" width="100%">
						<thead style="background-color: #35475e">
							<tr>
								<th>ปี</th>
								<th>ยอดขายรวม (บาท)</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$sql="SELECT order_date,order_price,order_id, YEAR(order_date) as order_dateyear , SUM(order_price) as order_price FROM orders GROUP BY order_dateyear order by order_date DESC";
								$result=$db->query($sql);
        						while($row=$result->fetch_array(MYSQLI_BOTH)){ 		
							?>
								<tr>
									<td><?php echo $row["order_dateyear"];?></td>
									<td><?php echo number_format($row["order_price"]);?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
<script type="text/javascript">
$(function(){
    setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
        // 1 วินาที่ เท่า 1000
        // คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"gdata.php",
                data:"rev=1",
                async:false,
                success:function(getData){
                    $("b#showData1").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
    },1500);    
});
</script>
<script type="text/javascript">
$(function(){
    setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที
        // 1 วินาที่ เท่า 1000
        // คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที
        var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล
                url:"gdata.php",
                data:"rev=2",
                async:false,
                success:function(getData){
                    $("b#showData2").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
                }
        }).responseText;
    },1500);    
});
</script>
<script>
	$(document).ready(function() {
    //กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
		$('#example1').DataTable( {
			"order": [[ 0, "desc" ]], //ให้เรียงจากมากไปน้อย
			"lengthMenu": [[10, 25, 100, -1], [10, 25, 100, "All"]]
		} );
	} );
</script><script>
	$(document).ready(function() {
    //กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
		$('#example2').DataTable( {
			"order": [[ 0, "desc" ]], //ให้เรียงจากมากไปน้อย
			"lengthMenu": [[10, 25, 100, -1], [10, 25, 100, "All"]]
		} );
	} );
</script>
<script>
	$(document).ready(function() {
    //กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
		$('#example3').DataTable( {
			"order": [[ 0, "desc" ]], //ให้เรียงจากมากไปน้อย
			"lengthMenu": [[10, 25, 100, -1], [10, 25, 100, "All"]]
		} );
	} );
</script>