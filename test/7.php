<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>  -->
        <script src="http://malsup.github.com/jquery.form.js"></script> 
</head>
<body>
    <form id="myForm" action="8.php" method="post"> 
        Name: <input type="text" name="name" /> 
        Comment: <textarea name="comment"></textarea> 
        <input type="submit" value="Submit Comment" /> 
    </form>
    </body>
</html>
<script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            $('#myForm').ajaxForm(function() { 
                alert("Thank you for your comment!"); 
            }); 
        }); 
</script> 