<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<title></title>
</head>
<body>
<div class="container">
<table border="1" class="table table-striped" >
	<thead >
		<tr>
			<th>group_id</th>
			<th>forum_id</th>
			<th>auth_option_id</th>
			<th>auth_role_id</th>
			<th>auth_setting</th>
		</tr>
	</thead>
	<tbody id="mybody" align="center">
		
	</tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
			$.ajax({
				type:'POST',
				url:'ajaxgrid.php',
				cache: false,
				success:function(response){
				//alert(html);
				console.log(response);
				var obj = JSON.parse(response);
      					$.each(obj, function(key, val) {
				   		var tr = "<tr>";
				   		tr = tr + "<td>" + val['group_id'] + "</td>";
				   		tr = tr + "<td>" + val['forum_id'] + "</td>";
				   		tr = tr + "<td>" + val['auth_option_id'] + "</td>";
				   		tr = tr + "<td>" + val['auth_role_id'] + "</td>";
				   		tr = tr + "<td>" + val['auth_setting'] + "</td>";
				   		tr = tr + "</tr>";
				   		$('#mybody').append(tr);
			  	});
      					alert(tr);
			}
		});
</script>
</body>
</html>