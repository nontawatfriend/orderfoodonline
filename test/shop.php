<?
/*
Author:      Jouni Juntunen
Date:        8/2005
Description: Shows contents of the shopping cart and hyperlinks to empty the cart or order the items.
*/
//You have to start session in every php-page where you handling session variables.
ini_set('session.use_trans_sid',false);
session_start();
header("Cache-control: private");
?>
<!--Start printing the HTML-page-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Shopping cart example</title>
</head>
<body>
<table width="100%">
<tr><td><H2>The shop</H2><td></tr><tr><td>
<p>Items in your shopping cart</p>
<?
//Read new item which user has just added to the cart
$newItem=$_POST['item'];

//Check if session already exists (in other words has user added any items to 
//the cart before)
if (!isset($_SESSION['items']))
{
//If user adds the first item we'll create new session variable. Items are stored into an array.
    $items=array();
    $_SESSION['items']=$items;    
}

//Read number of items and add new one to array. After that you'll update the session variable,
//so it holds all the items including the new one.
$items=$_SESSION['items'];
$numberOfItems=count($items);
$items[$numberOfItems]=$newItem;
$_SESSION['items']=$items;

//Print contents of the shopping cart
foreach ($items as $item)
{
    print "$item<br />";
}
$itemCount=$numberOfItems + 1;
print "<br />Number of items in your shopping cart is $itemCount<br /><br />";

//Print hyperlinks that user can use to go back to shop or discard items from shoppin cart.
print "<A href='shop.php'>Back to the shop</A><br /><br />";
print "<A href='order.php'>Order</A><br /><br />";
print "<A href='empty.php'>Empty shopping cart</A>";
?>
</td></tr>
</table>
</body>
</html>