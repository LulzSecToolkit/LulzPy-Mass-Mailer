<?php 
if(isset($_POST['submit'])){
    $myArray = $_POST['email'];
    $send = explode(' ', $myArray);
    $subject = $_POST['sub'];
    $message = $_POST['message'];
    $headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; text/plain; charset=UTF-8' . "\r\n";
    $headers .= "From:" . $_POST['from'];
    
    foreach($send as $e){
    	mail($e,$subject,$message,$headers);
    	echo "Mail Sented to " . $e ." [DONE] <br/>";
    }
    
    }
?>

<!DOCTYPE html>
<head>
<title>Honker Mail</title>
<meta charset="UTF-8">
<link rel="shortcut icon" href="https://www.shareicon.net/download/2016/09/21/831583_education_512x512.png" type="image/png">


</head>
<body>

<form action="" method="post">
Subject: <input type="text" name="sub"><br>
Email: <input type="text" rows="5" cols="30" name="email"><br>
From: <input type="text" name="from"><br>
Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
<input type="submit" name="submit" value="Submit">
</form>
</body>
</html> 
