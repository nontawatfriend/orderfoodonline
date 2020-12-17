<?
/*
Author:      Jouni Juntunen
Date:        8/2005
Description: Empties the shopping cart.
*/
//Start session
ini_set('session.use_trans_sid',false);
session_start();
header("Cache-control: private");
//Destroy all session variables.
session_unset();
//Destroy this session.
session_destroy();
?>
<!--Print hyperlink, so user can go back to shop.-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<body>
<?
print "<h2>Shopping cart deleted</h2>";
print "<a href='shop.php'>Back to the shop</a>";
?>
</body>
</head>
</html>