<?
/*
Author:      Jouni Juntunen
Date:        8/2005
Description: Prints out the contents of the shopping cart and gives information about succesful ordering to client. 
         In real application you should store the order e.g. to database and ask information about client.
*/
ini_set('session.use_trans_sid',false);
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Shopping cart example</title>
</head>
<body>
<tabke width="100%">
<tr><td>
<h2>The Shop</h2>
</td></tr><tr><td>
<?

if (isset($_SESSION['items']))
{
    print "<p>Items in your shopping cart:</p>";
    $items=$_SESSION['items'];
//Print contents of the shopping cart
    foreach ($items as $item)
    {
        print "$item<br>";
    }

//Destroy session variables and session after processing order (which is in this case just printing out the order).
session_destroy();

//Print out notice to client. In real application you should ask the user information and after that
//store the necessary information to database and then empty session variable (=shopping cart).
    print "<br />Thank you for your order!";
    print "<br /><a href='../index.php'>Back to examples</a>";
}
else
{
    print "<p>You haven't added anything to your cart!</p>";
    print "<a href='shop.php'>Back to the shop</a>";
}

?>
</td></tr>
</table>
</body>
</html>