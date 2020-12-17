<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
     integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 
</head>
<body>
 
<br>
<br>
<div class="container">
        <!-- <form id="news-form" name="news-form" action="show.php" method="post"> -->
        <form id="news-form" name="news-form" action="" method="post">
          <div class="form-group">
            <label for="news-topic" class="control-label">Topic:</label>
            <input type="text" class="form-control" id="news-topic" name="topic">
          </div>
          <div class="form-group">
            <label for="news-message" class="control-label">Message:</label>
            <textarea class="form-control" id="news-message" name="message"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>          
        </form>
</div>
 
<div class="container">
        <form id="news-form" name="news-form" action="" method="post">
          <div class="form-group">
            <label for="news-topic" class="control-label">Topic:</label>
            <input type="text" class="form-control" id="news-topic" name="topic">
          </div>
          <div class="form-group">
            <label for="news-message" class="control-label">Message:</label>
            <textarea class="form-control" id="news-message" name="message"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>          
        </form>
        <br>
        <div id="place_ajax1" style="background-color:#FC9;">
         
        </div>
        <hr>
        <div id="place_ajax2" style="background-color:#FFC;">
         
        </div>
</div>
 
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
 integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
 crossorigin="anonymous"></script>
 <script type="text/javascript">
$(function(){
     
       // เมื่อฟอร์มที่มีไอดี news-form กำลังทำการส่งข้อมูล
       $("#news-form").on("submit",function(event){ // มีการส่ง event object
           console.log("test 1");
           event.preventDefault(); // ปิดค่าเริ่มต้น ในกรณีนี้คือไม่มีการรีเฟรชหรือเปลี่ยนหน้าเพจ
           // คำสังต่อจากบรรทัดนี้ทำงานได้ปกติ
           console.log("test 2");
           var dataSend = $(this).serialize();
           var dataSend2 = $(this).serializeArray();
           console.log(dataSend);
           console.log(dataSend2);
           $.post("show.php",dataSend,function(response){
                
           });
           $.post("show.php",dataSend2,function(response){
                
           });         
       });
     
});
</script>
</body>
</html>