<style>
.title a{
    float:right; /*ชิดขวา */
    text-decoration: none; /* underline  อันนี้คือมีขีดเส้นใต้*/
    text-align: right;
}
</style>
<?php include("../admin/config.php"); ?>
<div class="title">ออร์เดอร์ทั้งหมด</div>

<?php
	$sqli="SELECT * from orders inner join order_list on (orders.order_id=order_list.order_id)  where orders.food_statusid<>'3' and orders.foodstatusid_dessert_drink<>'3' and orders.foodstatusid_hell<>'3' GROUP BY order_list.order_id";// เท่านั้น GROUP BY คือตัดที่ซ้ำกันออก
	$resulti=$db->query($sqli);
	while($rowi=$resulti->fetch_array(MYSQLI_BOTH)){?>
			<h4 class="page-banner-sm"><b>โต๊ะที่ <?php echo $rowi["table_id"]?></b></h4>
				<table class="table table-hover table-bordered" id="example" width="100%">
					<thead style="background-color: #35475e">
					<tr>
					<th scope="col">ลำดับ</th>
					<th scope="col">รายการ</th>
					<th scope="col">จำนวน</th>
					<th scope="col">สถานะ</th>
					</tr>
					</thead>
				<tbody>
				<form action="?page=check_bill" method="POST">
						<?php
						$total=0;
						$i=0;
						$sql="SELECT * from order_list inner join orders on (order_list.order_id=orders.order_id) inner join food on (order_list.food_id=food.food_id) inner join food_status on (order_list.food_statusid=food_status.food_statusid) where order_list.food_typeid='3' and orders.table_id='".$rowi["table_id"]."' and orders.order_id='".$rowi["order_id"]."' and order_list.order_id='".$rowi["order_id"]."' order by order_list.list_id asc";
						$result=$db->query($sql);
						while($row=$result->fetch_array(MYSQLI_BOTH)){
						?>
							<tr>
								<td scope="row" style="text-align: center;"><?php echo ++$i; ?></td>
								<td><?php echo $row["food_name"].$row["food_topping"].','.$row["food_water"].',('.'<u>'.$row["price_categoryname"].'</u>'.')'."<span style='color:red'>".'*'.$row["order_note"]; "</span>"?></td>
								<td style="text-align: center;"><?php echo $row["order_unit"]; ?></td>
								<td style="text-align: center;">
								<?php 
								if($row["food_statusid"]=='1'){
									echo '<font color="#0000FF">'.$row["food_statusname"].'</font>';
								}else if($row["food_statusid"]=='2'){
									echo '<font color="#FFA500">'.$row["food_statusname"].'</font>';
								}else if($row["food_statusid"]=='3'){
									echo '<font color="green">'.$row["food_statusname"].'</font>';
								}else	
								?>
								</td>
							</tr>
							<?php  $total+=$row["order_unit"];?>
							<input type="hidden" name="order_id" value="<?php echo $row["order_id"]?>">
							<input type="hidden" name="food_id[]" value="<?php echo $row["food_id"]?>">
							<input type="hidden" name="table_id" value="<?php echo $rowi["table_id"]?>">
						<?php } ?>
						<?php
						//$sqlo="SELECT food_id, SUM(order_unit) as order_unit from order_list Group by food_id";	
						//food_id, SUM(order_unit)as order_unit

						/* $sql="SELECT order_list.order_id,orders.table_id,orders.food_statusid,order_list.food_typeid,order_list.order_unit,food.food_name,food_status.food_statusname,order_list.food_statusid,food.food_id from order_list inner join orders on (order_list.order_id=orders.order_id) inner join food on (order_list.food_id=food.food_id) inner join food_status on (order_list.food_statusid=food_status.food_statusid) where  order_list.food_typeid<>'3' and orders.table_id='".$rowi["table_id"]."' and orders.order_id='".$rowi["order_id"]."' order by order_list.food_typeid DESC"; *///คือรวมให้เป็นชื่อเดียวกันแล้ว
						$sql="SELECT order_list.order_id,orders.table_id,orders.food_statusid,order_list.food_typeid,order_list.order_unit,food.food_name,order_list.food_id,food_status.food_statusname,order_list.food_statusid, SUM(order_unit) as order_unit from order_list inner join orders on (order_list.order_id=orders.order_id) inner join food on (order_list.food_id=food.food_id) inner join food_status on (order_list.food_statusid=food_status.food_statusid) where order_list.food_typeid<>'3' and orders.table_id='".$rowi["table_id"]."' and orders.order_id='".$rowi["order_id"]."' and order_list.order_id='".$rowi["order_id"]."' Group by order_list.food_id,order_list.food_statusid order by order_list.food_id asc";//คือรวมให้เป็นชื่อเดียวกันแล้ว
						$result=$db->query($sql);
						while($row=$result->fetch_array(MYSQLI_BOTH)){
						?>
						<tr>
							<input type="hidden" name="food_id[]" value="<?php echo $row["food_id"];?>">
							<input type="hidden" name="order_id" value="<?php echo $row["order_id"]?>">
							<input type="hidden" name="table_id" value="<?php echo $rowi["table_id"]?>">
							<td scope="row" style="text-align: center;"><?php echo ++$i; ?></td>
							<td><?php echo $row["food_name"];?></td>
							<td style="text-align: center;"><?php echo $row["order_unit"]; ?></td>
							<td style="text-align: center;">
							<?php 
								if($row["food_statusid"]=='1'){
									echo '<font color="#0000FF">'.$row["food_statusname"].'</font>';
								}else if($row["food_statusid"]=='2'){
									echo '<font color="#FFA500">'.$row["food_statusname"].'</font>';
								}else if($row["food_statusid"]=='3'){
									echo '<font color="green">'.$row["food_statusname"].'</font>';
								}
							?>
							</td>
						</tr>
							<?php  $total+=$row["order_unit"];?>
						<?php } ?>
						<tr>
							<td colspan="4" style="text-align: right;">รวมจำนวน <?php echo $total?> รายการ</td>
<!-- 							<td style="text-align: center;"></td> -->
						</tr>
						<tr>
							<td colspan="4" style="text-align: right;">รวมราคาทั้งหมด <?php echo $rowi["order_price"];?> บาท</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: right;">
							<button class="btn btn-success" name="<?php echo $row["order_id"]; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i> ยืนยันการชำระเงิน</button>
							</td> <!-- ให้อัพเดทตาราง orders foodstatusid=3 และ อัพเดทตาราง order_list=3 -->
						</tr>
					</form>
				</tbody>
				</table>
<?php } ?>
