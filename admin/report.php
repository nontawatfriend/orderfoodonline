<?php
if(!isset($_SESSION["username"]) || $_SESSION["username"] =="" || $_SESSION["password"] =="" and !isset($_COOKIE["yourusername"]) || $_COOKIE["yourusername"] =="" || $_COOKIE["yourpassword"] ==""){
	echo'<meta http-equiv="refresh" content="0;url=login.php">';
	exit(0);
} ?>
<div class="title">รายงาน</div>
<?php
require 'config.php';
?>
<?php
	$sqli = "SELECT *,SUM(order_unit) as order_unit FROM order_list inner join food on order_list.food_id=food.food_id where order_list.food_typeid=3 group by order_list.food_id";
	$resulti=$db->query($sqli);
	while($rowi=$resulti->fetch_array(MYSQLI_ASSOC)){
		if (mysqli_num_rows($resulti) > 0) {
				$labels[] = $rowi['food_name'];
				$data[] = $rowi['order_unit'];
		}
	}

	$sql = "SELECT *,SUM(order_unit) as order_unit FROM order_list inner join food on order_list.food_id=food.food_id where order_list.food_typeid=4 group by order_list.food_id";
	$result=$db->query($sql);
	while($row=$result->fetch_array(MYSQLI_ASSOC)){
		if (mysqli_num_rows($result) > 0) {
				$labels2[] = $row['food_name'];
				$data2[] = $row['order_unit'];
		}
	}

	$sqll = "SELECT *,SUM(order_unit) as order_unit FROM order_list inner join food on order_list.food_id=food.food_id where order_list.food_typeid=6 group by order_list.food_id";
	$resultl=$db->query($sqll);
	while($rowl=$resultl->fetch_array(MYSQLI_ASSOC)){
		if (mysqli_num_rows($resultl) > 0) {
				$labels3[] = $rowl['food_name'];
				$data3[] = $rowl['order_unit'];
		}
	}

    mysqli_close($db);
?>  
<script src="js/Chart.js"></script>

<div class="main">
	<div class="widget" style="text-align: center; flex-basis: 98%; height: auto; font-size: 1.1em">
		<div class="title">รายการขายดี/หมวดหมู่ก๋วยเตี๋ยว</div>
		<div class="chart">
		<canvas id="myChart" width="200px" height="100px"></canvas>
		</div>
	</div>
	<div class="widget" style="text-align: center;height: auto; font-size: 1.1em">
		<div class="title">รายการขายดี/หมวดหมู่ของหวาน</div>
		<div class="chart">
		<canvas id="myChart2" width="300px" height="200px"></canvas>
		</div>
	</div>
	<div class="widget" style="text-align: center;height: auto; font-size: 1.1em">
		<div class="title">รายการขายดี/เมนูนรก</div>
		<div class="chart">
		<canvas id="myChart3" width="300px" height="200px"></canvas>
		</div>
	</div>
</div>
<script>
	Chart.defaults.global.defaultFontFamily = 'Mali', 'cursive';
	Chart.defaults.global.defaultFontSize = 15;
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        //type: 'bar',
        //type: 'line',
        type: 'pie',
        data: {
            labels: <?php echo json_encode($labels)?>,
            datasets: [{
                label: 'Report',
                data: <?php echo json_encode($data, JSON_NUMERIC_CHECK);?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
					'rgba(99, 255, 222, 0.7)',
                    'rgba(255, 253, 99, 0.7)',
                    'rgba(99, 255, 128, 0.7)',
                    'rgba(156, 0, 127, 0.7)',
                    'rgba(144, 99, 255, 0.7)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
					'rgba(99, 255, 222, 1)',
					'rgba(255, 253, 99, 1)',
                    'rgba(99, 255, 128, 1)',
                    'rgba(156, 0, 127, 1)',
                    'rgba(144, 99, 255, 1)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
             responsive: true,
             title: {
                display: true,
                text: 'กราฟสรุปยอดขาย'
            }
        }
    });
</script>
<script>
    var ctx2 = document.getElementById("myChart2");
    var myChart2 = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($labels2)?>,
            datasets: [{
                label: 'Report',
                data: <?php echo json_encode($data2, JSON_NUMERIC_CHECK);?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
					'rgba(99, 255, 222, 0.7)',
                    'rgba(255, 253, 99, 0.7)',
                    'rgba(99, 255, 128, 0.7)',
                    'rgba(156, 0, 127, 0.7)',
                    'rgba(144, 99, 255, 0.7)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
					'rgba(99, 255, 222, 1)',
					'rgba(255, 253, 99, 1)',
                    'rgba(99, 255, 128, 1)',
                    'rgba(156, 0, 127, 1)',
                    'rgba(144, 99, 255, 1)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
             responsive: true,
             title: {
                display: true,
                text: 'กราฟสรุปยอดขาย'
            }
        }
    });
</script>
<script>
    var ctx3 = document.getElementById("myChart3");
    var myChart3 = new Chart(ctx3, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($labels3)?>,
            datasets: [{
                label: 'Report',
                data: <?php echo json_encode($data3, JSON_NUMERIC_CHECK);?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(99, 255, 222, 0.7)',
                    'rgba(255, 253, 99, 0.7)',
                    'rgba(99, 255, 128, 0.7)',
                    'rgba(156, 0, 127, 0.7)',
                    'rgba(144, 99, 255, 0.7)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
					'rgba(99, 255, 222, 1)',
					'rgba(255, 253, 99, 1)',
                    'rgba(99, 255, 128, 1)',
                    'rgba(156, 0, 127, 1)',
                    'rgba(144, 99, 255, 1)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
             responsive: true,
             title: {
                display: true,
                text: 'กราฟสรุปยอดขาย'
            }
        }
    });
</script>