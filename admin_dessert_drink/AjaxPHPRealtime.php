<?php
	/* function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute:$strSeconds";
	}
  date_default_timezone_set('Asia/Bangkok');
	$strDate = date("Y-m-d H:i:s");
  echo '<b>'."วันที่ : ".DateThai($strDate).'<b>'; */
  
/*** By Weerachai Nukitram ***/
/***  http://www.ThaiCreate.Com ***/
//date_default_timezone_set('Asia/Bangkok');
//echo '<br>'.'<b>'."วันที่ : ".date("Y-m-d H:i:s").'</b>'.'<br>';
/* $db = mysqli_connect("localhost","root","", "orderfoodonline") or die("Error Connect to Database");
$db->query("set names 'utf8'"); */
include("../admin/config.php");
$sqli="SELECT * from orders inner join order_list on (orders.order_id=order_list.order_id) where orders.foodstatusid_dessert_drink='1' and (order_list.food_typeid='4' or order_list.food_typeid='5') GROUP BY order_list.order_id";
$resulti=$db->query($sqli);
while($rowi=$resulti->fetch_array(MYSQLI_ASSOC)){?>
    <h4 class="page-banner-sm"><b>โต๊ะที่ <?php echo $rowi["table_id"]?></b></h4>
    <form action="?page=send_order" method="POST">
      <table class="table table-hover table-bordered" id="example" width="100%">
        <thead style="background-color: #35475e">
          <tr>
            <th scope="col">ลำดับ</th>
            <th scope="col">รายการ</th>
            <th scope="col">จำนวน</th>
		      </tr>
        </thead>
          <tbody>
              <?php
              $total=0;
              $i=0;
              $strSQL="SELECT * from order_list inner join orders on (order_list.order_id=orders.order_id) inner join food on (order_list.food_id=food.food_id) where order_list.food_statusid='1' and orders.table_id='".$rowi["table_id"]."' and (order_list.food_typeid='4' or order_list.food_typeid='5')  ";
              $objQuery=$db->query($strSQL);
              while($objResult=$objQuery->fetch_array(MYSQLI_ASSOC))
              {
              ?>
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
				  </tbody>
      </table>
    </form>
<?php
}
/* mysqli_close($db); */
?>
