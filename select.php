<?php session_start();
if( !isset($_SESSION['email']) )
{
	echo "<script language='javascript'>window.location.href='unauthorized.php';</script>";
}

echo "Welcome: " . $_SESSION['email'] . "<br>";
?><link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<?php

$nm=$_GET['onm'];
if($nm=="")
{
	echo "NO RESULT FOUND";
}
else
{

mysql_connect("localhost","root","");
mysql_select_db("assignment1");
$res =mysql_query("  select * from table1 where email like ('$nm%')");

echo "<table center  border=0  >";
echo"<table border='1' align='center' class='table-striped table-responsive'>";
while($row = mysql_fetch_array($res))
{
echo 	"<tr>";
echo 	"<td>";
echo $row["email"];
echo 	"</td>";
echo 	"<td>";
echo $row["name"];
echo 	"</td>";
echo 	"<td>";
echo $row["country"];
echo 	"</td>";
echo 	"<td>";
echo $row["city"];
echo 	"</td>";
echo 	"<td>";
echo $row["province"];
echo 	"</td>";
echo 	"<td>";
echo $row["answer"];
echo 	"</td>";
echo 	"<td>";

echo $row["address"];
echo 	"</td>";
echo 	"</tr>";

	
}





echo"<table>";
echo "</center>";
}
?>
<html>
<link rel="stylesheet" type="text/css" href="../css/stylesheet.css"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>