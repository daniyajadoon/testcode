  <?php
/// authentication code
 session_start();
if( !isset($_SESSION['email']) )
{
	echo "<script language='javascript'>window.location.href='unauthorized.php';</script>";
}

echo "Welcome: " . $_SESSION['email'] . "<br>";
?>


        <?php
include("db/opendb.php");
$query='';
$query1='';
$query2='';
$status=FALSE;
//print_r($_POST);
$txtemail="";
if( isset($_POST['btnsubmit']) )
	{
		
		$txtemail=$_POST['txtemail'];
		$txtname = $_POST['txtname'];
		$ddlcountry = $_POST['ddlcountry'];
		$ddlcity = $_POST['ddlcity'];
		$txtpro=$_POST['txtpro'];
		$color=$_POST['color'];
		$pref=$_POST['chkpref'];
		$web=$_POST['mulselect'];
		$txtaddress = $_POST['txtaddress'];
		
		$query = "insert into table1(email,name,country,city,province,answer,address) values(:email, :name, :country, :city, :province, :answer, :address)";
		try
		{
			$stmt  = $conn -> prepare($query);
			$stmt -> bindParam(':email', $txtemail);
			$stmt -> bindParam(':name', $txtname);
			$stmt -> bindParam(':country', $ddlcountry);
			$stmt -> bindParam(':city', $ddlcity);
			$stmt -> bindParam(':province', $txtpro);
		    $stmt -> bindParam(':answer', $color);
	        $stmt -> bindParam(':address', $txtaddress);
	        $stmt -> execute();
			
			$msg = "Record save successfully...";
			$status='true';
			
			
		}
		catch(PDOException $e)
		{
			echo $e -> getMessage();
			$status='false';
		}
		
		if($status==TRUE)
		{
	    
		foreach($pref as $key=> $value)
		{
			$query1="insert into pref(email,preferences) values (:email,:preferences)";
			//echo $pref[$key];
					try{
					$stmt1  = $conn -> prepare($query1);
					$stmt1 -> bindParam(':email', $txtemail);
					$stmt1 -> bindParam(':preferences', $value);
					$stmt1 -> execute();
				 }
					catch(PDOException $e)
				{
					echo $e -> getMessage();
				}
			}
				
		foreach($web as $key=>$value)
		{
			try{
			$query2="insert into web(email,websites) values (:email,:websites)";
			$stmt2  = $conn -> prepare($query2);
			$stmt2 -> bindParam(':email', $txtemail);
			$stmt2 -> bindParam(':websites', $value);
			$stmt2 -> execute();
			}
			catch(PDOException $e)
				{
					echo $e -> getMessage();
				}
		}
		}
		}
		
	$conn = NULL; 
		
echo "<script language=\"javascript\" type=\"text/javascript\">window.location.href=\"insert.php?msg=" . $msg . "\"; </script>";


?>