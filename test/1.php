<!-- เมนูเลื่อนตาม -->
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
body{margin-top:10px;}
.container{height:5000px;}
#sidebar{border:1px solid #ddd;}
</style>
</head>
<body>
<div class="container">
<div class="alert alert-warning alert-dismissible" role="alert" id="sidebar">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> Better check yourself, you're not looking too good.
</div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
var $sidebar   = $("#sidebar"), 
     $window    = $(window),
     offset     = $sidebar.offset(),
     topPadding = 50;

 $window.scroll(function() {
     if ($window.scrollTop() > offset.top) {
         $sidebar.stop().animate({
             marginTop: $window.scrollTop() - offset.top + topPadding
         });
     } else {
         $sidebar.stop().animate({
             marginTop: 0
         });
     }
 });

});

</script>
</body>
</html>