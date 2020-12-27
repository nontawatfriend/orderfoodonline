<?php include("config.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>เข้าสู่ระบบ</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/style_login.css">
<link rel="stylesheet" href="fonts/Mali.css">
<link rel="stylesheet" href="fonts/font-awesome.min.css">
<?php 
$sqlimg="SELECT restaurant_img from restaurant";
$resultimg=$db->query($sqlimg);
while($rowimg=$resultimg->fetch_array(MYSQLI_ASSOC)){
?>
<link rel="icon" href="img/<?=$rowimg["restaurant_img"]?>">

<script src="js/jquery-2.2.0.min.js"></script>
</head>
<body>
  <form id="register_form" method="post" action="logins.php" class="form-horizontal">
  <img src="img/<?=$rowimg["restaurant_img"]?>" alt="<?=$rowimg['restaurant_name'];?>" class="img-rounded" height="auto" width="240px">
<?php }?>
      <h1>ล็อกอิน</h1>
      <div class="username">
        <input class="widthlogin form-control" type="text" name="username" placeholder="Username" id="username" onBlur="chkusername();"><br>
      </div>
      <div class="password">
        <input class="widthlogin form-control" type="password" name="password" id="password" placeholder="Password" onBlur="chkpassword();" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" id="password"><br>
      </div>
      <div>
        <button type="button" name="login" id="login_btn" onClick="confirmlogin();"><i class="fa fa-sign-in" aria-hidden="true"></i> เข้าสู่ระบบ</button>
      </div>
  </form>
<script>
  function chkusername(){
		if(document.getElementById('username').value == "")
		{
			$('#register_form .username').addClass('has-error');
			$('#register_form .username').removeClass('has-success');
			return false;
    	}else{
			$('#register_form .username').addClass('has-success');
			$('#register_form .username').removeClass('has-error');
		}
	}
  function chkpassword(){
		if(document.getElementById('password').value == "")
		{
			$('#register_form .password').addClass('has-error');
			$('#register_form .password').removeClass('has-success');
			return false;
    	}else{
			$('#register_form .password').addClass('has-success');
			$('#register_form .password').removeClass('has-error');
		}
	}

function confirmlogin(){
  var elem = document.getElementById('password').value;
	if(document.getElementById('username').value == "")
    {
		$('#username').focus();
		return false;
    }
    if(document.getElementById('password').value == "")
    {
		$('#password').focus();
		return false;
    }
    if(!elem.match(/^([a-z0-9\_])+$/i)){
    $('#password').val(''); //ถ้าใส่เครื่องหมาย/^a-z0-9\_+$/i ใน pssword ให้ใส่ใหม่
    $('#password').focus();
    return false;
    }
    document.getElementById("register_form").submit();
		$("#login_btn").html("โปรดรอสักครู่...");
		document.getElementById("login_btn").disabled = true;
		return true;
  }
</script>
</body>
</html>