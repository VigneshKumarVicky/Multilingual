<!DOCTYPE html>
<html>
	<body bgcolor="#CCCCFF">
		<div align="center"><h1><i>Multilingual Information Guidance System</i></h1></div>
		<div align="center"><h2><i>Choose your Language</i></div>
		<br><br>
		<div align="center">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
			<input type="radio" name="lang" value="english"> ENGLISH <br><br>
			<input type="radio" name="lang" value="tamil"> TAMIL <br><br>
			<input type="radio" name="lang" value="hindi"> HINDI <br><br>
			<input type="radio" name="lang" value="german"> GERMAN <br><br>
			<input type="radio" name="lang" value="french"> FRENCH <br><br>
			<input type="radio" name="lang" value="spanish"> SPANISH <br><br><br>
			<input type="text" name="qr" id="qr"> <br><br>
			<input type="submit" value="SUBMIT">
		</form>
		</div>
		<?php
			$servername="127.0.0.1";
			$username="root";
			$password="";
			$dbname="MLIGS";
			$value1=$value2=$result=$row=$des="";
			$conn=new mysqli($servername,$username,$password,$dbname);
			if($conn->connect_error)
				die("Can't Connect : ".$conn->connect_error);
			if(isset($_POST["lang"]))
				$value1=$_POST["lang"];
			if(isset($_POST["qr"]))
				$value2=$_POST["qr"];
			$sql="Select DES from $value1 where ID='$value2'";
			$result=$conn->query($sql);
			if ($result!=NULL && $result->num_rows>0) 
			{
				$row = $result->fetch_array();
				$des=$row["DES"];
				echo '<div align="center"><textarea rows="20" cols="50">'.$des.'</textarea></div>';
			}
			$conn->close();
		?>
	</body>
</html>
