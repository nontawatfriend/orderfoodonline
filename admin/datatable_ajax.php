<?php
include "config.php";

$userid = 0;
if(isset($_POST['userid'])){
   $userid = mysqli_real_escape_string($db,$_POST['userid']);
}
$sql = "select * from tables where tables_id=".$userid;
$result = mysqli_query($db,$sql);
while( $row = mysqli_fetch_array($result) ){
 $id = $row['tables_id'];
 $link=$row['tables_link'];
echo '<div align="center">'.'<b>'.'โต๊ะที่ '.$id.' ลิ้ง => ';
echo $link.'</b>'.'</div>'.'<br>';
/* echo '<a href="https://www.w3schools.com" target="_blank">ไปลิ้ง</a>'; */
echo '<div align="center">'.'<a href="'.$link.'" target="_blank" class="btn btn-primary">คลิกไปลิ้ง</a>'.'</div>';
}
exit(0);