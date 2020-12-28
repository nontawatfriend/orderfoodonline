<?php
session_start();
if(isset($_SESSION["username"])){
    session_destroy();
}
else if(isset($_COOKIE["yourusername"])){
    setcookie ("yourusername","",time()-3600 );
    setcookie ("yourpassword","",time()-3600 );
}
echo '<meta http-equiv="refresh"content="0;url=login.php">'; 
?>
