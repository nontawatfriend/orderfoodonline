<?php
   session_start();
   $_SESSION["name"] = $_POST["name"];
   // Add the rest of the post-variables to session-variables in the same manner
?>