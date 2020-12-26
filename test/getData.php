<!-- <?php
$db_server="localhost";
$db_user="root";
$db_pass="";
$db_src="orderfoodonline";
$db=new mysqli($db_server,$db_user,$db_pass,$db_src);
if($db->connect_errno){
echo "ไม่สามารถติดต่อ MySQL ได้: ".$db->connect_error;
}
$db->query("set names 'utf8'");
?> -->
<?php

$db_server="localhost";
$db_user="root";
$db_pass="";
$db_src="customer";
$objConnect=new mysqli($db_server,$db_user,$db_pass,$db_src);
if($objConnect->connect_errno){
echo "ไม่สามารถติดต่อ MySQL ได้: ".$objConnect->connect_error;
}
$objConnect->query("set names 'utf8'");

	//$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	//$objConnect = new mysqli("localhost","root","") or die(mysql_error());
	$objDB = mysql_select_db("customer");
	$strSQL = "SELECT * FROM customer WHERE 1 ORDER BY CustomerID DESC ";
	$objQuery = mysql_query($strSQL) or die (mysql_error());
	$intNumField = mysql_num_fields($objQuery);
	$resultArray = array();
	while($obResult = mysql_fetch_array($objQuery))
	{
		$arrCol = array();
		for($i=0;$i<$intNumField;$i++)
		{
			$arrCol[mysql_field_name($objQuery,$i)] = $obResult[$i];
		}
		array_push($resultArray,$arrCol);
	}
	
	mysql_close($objConnect);
	
	echo json_encode($resultArray);
?>