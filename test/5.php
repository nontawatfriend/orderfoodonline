<?php
echo '
<div id="few-input-fields">
<input id="Name" size="20" value="' . $_SESSION['name'] . '" />
<br />
<input id="Lastname" size="20" value="' . $_SESSION['lastname'] . '" />
</div>
<span id="save">save</span>
</div>
';
?>
<script>
$("#formid").submit(function(){
   $.ajax({
      type: "POST",
      url: "someFileToUpdateTheSession.php",
      data: $(this).serialize(),
      success: function(){
          // Do what you want to do when the session has been updated
      }
   });

   return false;
});
</script>