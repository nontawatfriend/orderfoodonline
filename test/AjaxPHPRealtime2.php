<?php
/*** By Weerachai Nukitram ***/
/***  http://www.ThaiCreate.Com ***/

//echo "Load Time : ".date("Y-m-d H:i:s").'<br>'.'<br>';

$strSort = $_POST["mySort"];


$objConnect = mysqli_connect("localhost","root","", "orderfoodonline") ;//or die("Error Connect to Database")
//$objDB = mysqli_select_db("customer");

$sqli="SELECT * from orders inner join order_list on (orders.order_id=order_list.order_id) where orders.foodstatusid_dessert_drink='1' and (order_list.food_typeid='4' or order_list.food_typeid='5') GROUP BY order_list.order_id";
$resulti=$objConnect->query($sqli);
while($rowi=$resulti->fetch_array(MYSQLI_BOTH)){?>
    <h4 class="page-banner-sm"><b>โต๊ะที่ <?php echo $rowi["table_id"]?></b></h4>

<?php 
//exit(0);

//$strSQL = "SELECT * FROM customer ";//ORDER BY $strSort ASC
//$objQuery = $objConnect->query($strSQL);// or die ("Error Query [".$strSQL."]")
//$meQuery = $db->query($meSql);
$objConnect->query("set names 'utf8'");
?>
<table class="table table-hover table-bordered" id="example" width="100%">
    <thead style="background-color: #35475e">
        <!-- <tr>
            <th width="91"> <div align="center"><a href="JavaScript:doCallAjax('CustomerID')">CustomerID</a></div></th>
            <th width="98"> <div align="center"><a href="JavaScript:doCallAjax('Name')">Name</a> </div></th>
            <th width="198"> <div align="center"><a href="JavaScript:doCallAjax('Email')">Email</a> </div></th>
            <th width="97"> <div align="center"><a href="JavaScript:doCallAjax('CountryCode')">CountryCode</a> </div></th>
            <th width="59"> <div align="center"><a href="JavaScript:doCallAjax('Budget')">Budget</a> </div></th>
            <th width="71"> <div align="center"><a href="JavaScript:doCallAjax('Used')">Used</a> </div></th>
        </tr> -->
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
$strSQL="SELECT * from order_list inner join orders on (order_list.order_id=orders.order_id) inner join food on (order_list.food_id=food.food_id) where order_list.food_statusid='1' and orders.table_id='".$rowi["table_id"]."' and (order_list.food_typeid='4' or order_list.food_typeid='5')  ";
$objQuery=$objConnect->query($strSQL);
//while($row=$result->fetch_array(MYSQLI_BOTH)){
while($objResult=$objQuery->fetch_array(MYSQLI_BOTH))
{
?>
  <!-- <tr>
    <td><div align="center"><?php echo $objResult["CustomerID"];?></div></td>
    <td><?php echo $objResult["Name"];?></td>
    <td><?php echo $objResult["Email"];?></td>
    <td><div align="center"><?php echo $objResult["CountryCode"];?></div></td>
    <td align="right"><?php echo $objResult["Budget"];?></td>
    <td align="right"><?php echo $objResult["Used"];?></td>
  </tr> -->
                    <tr>
						<td scope="row" style="text-align: center;"><?php echo ++$i; ?></td>
						<td><?php echo $objResult["food_name"]?></td>
						<td style="text-align: center;"><?php echo $objResult["order_unit"]; ?></td>
						</tr>
						<?php  $total+=$objResult["order_unit"];?>
						<input type="hidden" name="order_id" value="<?php echo $objResult["order_id"]?>">
						<input type="hidden" name="food_id[]" value="<?php echo $objResult["food_id"]?>">
						<input type="hidden" name="table_id" value="<?php echo $rowi["table_id"]?>">
					<?php } ?>
					<tr>
						<td colspan="2" style="text-align: right;">รวมจำนวน</td>
						<td style="text-align: center;"><?php echo $total?></td>
					</tr>
					<tr>
						<td colspan="3" style="text-align: right;">
						<button class="btn btn-success" name="<?php echo $objResult["order_id"]; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i> ส่งออร์เดอร์</button>
						</td> <!-- ให้อัพเดทตาราง orders foodstatusid_dessert_drink=2 และ อัพเดทตาราง order_list=2 -->
                    </tr>
                    </form>
				</tbody>
			</table>
<?php
}
?>
<?php
mysqli_close($objConnect);

?>