<?php
    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$sdate = $_POST['sdate'];
	$edate = $_POST['edate'];
	$mail = $_POST['mail'];
	$zimmer = $_POST['zimmer'];
	
	$conn = new mysqli('localhost', 'root','','zimmer');{
		if($conn->connect_error){
			die('Connection Failed : '.$conn->connect_error);
		}else{
			$stmt = $conn->prepare("insert into vermieten(fname, lname, sdate, edate, mail, zimmer)
			values(?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("ssssss",$fname, $lname, $sdate, $edate, $mail, $zimmer);
			if($stmt == ""){
				alert('Feld noch leer');
			}elseif ($sdate == "TT.MM.JJJJ"){
				alert('Feld noch leer'); 	
			}elseif ($sdate == "TT.MM.JJJJ"){
				alert('Feld noch leer');}
			else{
			$stmt->execute();
			echo "Buchung erfolgreich...";
			$stmt->close();
			$conn->close();
			}
		}
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