<?php
  session_start();
  	header('location:startseite.html');
	
	$con = mysqli_connect('localhost', 'root', '');
	
	mysqli_select_db($con, 'zimmer');
	
	$username = $_POST['username'];
	$passwort = $_POST['passwort'];
	
	$sql = "SELECT * FROM login WHERE username='$username' AND passwort='$passwort'";
	$result = mysqli_query($con, $sql);
	
	if(mysqli_num_rows($result) > 0)
	{
		header('location:startseite.html');
	}else{
		header('location:index.html');
	}

   /*if (!empty($fname) || !empty($lname) || !empty($sdate) || !empty($edate)){
       $host = "localhost";
       $dbUsername = 'root';
       $dbPassword = "";
       $dbname = "zimmer";
       $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    //Database connection
    
       if (mysqli_connect_error()) {
           die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
       } else {
           $SELECT = "SELECT mail FROM zimmer Where mail = ? Limit 1";
           $INSERT = "INSERT Into zimmer (fname, lname, sdate, edate, mail) values(?, ?, ?, ?, ')";
   
   
           $stmt = $conn->prepare($SELECT);
           $stmt->bind_param("s", $mail);
           $stmt->execute();
           $stmt->bind_result($mail);
           $stmt->store_result();
           $rnum = $stmt->num_rows;
   
           if ($rnum==0) {
               $stmt->close();
   
               $stmt = $conn->prepare($INSERT);
               $stmt->bind_param("ssdds", $fname, $lname, $sdate, $edate, $mail);
               $stmt->execute();
               echo "New record inserted sucessfully";
           }else{
               echo "Someone already register using this mail";
           }
           $stmt->close();
           $conn->close();
       }
}else{
    echo "All field are required";
    die();
}*/
?>