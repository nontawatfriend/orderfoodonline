<style>
th{
    color: #fff;
    text-align: center;
	font-size: 18px;
}
td{
    font-size: 18px;
	font-weight: bold;
}
.title a{
    float:right; /*ชิดขวา */
    text-decoration: none; /* underline  อันนี้คือมีขีดเส้นใต้*/
    text-align: right;
}
</style>
<?php include("../admin/config.php"); ?>
<div class="title">ออร์เดอร์(ของหวาน/เครื่องดื่ม)</div>

<?php
	$sqli="SELECT * from orders inner join order_list on (orders.order_id=order_list.order_id) where orders.foodstatusid_dessert_drink='1' and (order_list.food_typeid='4' or order_list.food_typeid='5') GROUP BY order_list.order_id";// order by order_list.food_typeid desc where order_list.foodtype_id=5 เท่านั้น GROUP BY คือตัดที่ซ้ำกันออก
	$resulti=$db->query($sqli);
	while($rowi=$resulti->fetch_array(MYSQLI_BOTH)){?>
			<h4 class="page-banner-sm"><b>โต๊ะที่ <?php echo $rowi["table_id"]?></b></h4>
				<table class="table table-hover table-bordered" id="example" width="100%">
					<thead style="background-color: #35475e">
					<tr>
					<th scope="col">ลำดับ</th>
					<th scope="col">รายการ</th>
					<th scope="col">จำนวน</th>
					</tr>
					</thead>
				<tbody>
				<form action="?page=send_order" method="POST">
					<?php
					$total=0;
					$i=0;
					$sql="SELECT * from order_list inner join orders on (order_list.order_id=orders.order_id) inner join food on (order_list.food_id=food.food_id) where order_list.food_statusid='1' and orders.table_id='".$rowi["table_id"]."' and (order_list.food_typeid='4' or order_list.food_typeid='5')  ";
					$result=$db->query($sql);
					while($row=$result->fetch_array(MYSQLI_BOTH)){
					?>
						<tr>
						<td scope="row" style="text-align: center;"><?php echo ++$i; ?></td>
						<td><?php echo $row["food_name"]?></td>
						<td style="text-align: center;"><?php echo $row["order_unit"]; ?></td>
						</tr>
						<?php  $total+=$row["order_unit"];?>
						<input type="hidden" name="order_id" value="<?php echo $row["order_id"]?>">
						<input type="hidden" name="food_id[]" value="<?php echo $row["food_id"]?>">
						<input type="hidden" name="table_id" value="<?php echo $rowi["table_id"]?>">
					<?php } ?>
					<tr>
						<td colspan="2" style="text-align: right;">รวมจำนวน</td>
						<td style="text-align: center;"><?php echo $total?></td>
					</tr>
					<tr>
						<td colspan="3" style="text-align: right;">
						<button class="btn btn-success" name="<?php echo $row["order_id"]; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i> ส่งออร์เดอร์</button>
						</td> <!-- ให้อัพเดทตาราง orders foodstatusid_dessert_drink=2 และ อัพเดทตาราง order_list=2 -->
					</tr>
				</form>
				</tbody>
				</table>
<?php } ?>
