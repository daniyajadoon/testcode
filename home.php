<?php session_start();
if( !isset($_SESSION['email']) )
{
	echo "<script language='javascript'>window.location.href='unauthorized.php';</script>";
}

echo "Welcome: " . $_SESSION['email'] . "<br>";
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/master1.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body background="3444739.jpg">
<!-- InstanceBeginEditable name="menu" -->
<nav class="navbar navbar-inverse" >
<div class="container-fluid">
<div class="navbar-header"> 
<!--- logo--->
<a href="home.php" class="navbar-brand"> TASK 12</a>
</div>
<!--- menu--->

        <div >
          <ul class="nav navbar-nav">
          <li><a href="home.php" class="active"> Home</a></li>
            <li><a href="insert.php">Insert New Record</a></li>
            <li><a href="search.php">Search Record</a></li>
          </ul>
      </div>
      
     
      
      <div><ul class="nav navbar-nav navbar-right"> 
       <li><a href="logout.php">Logout</a></li>
       </ul>
    </div>
  </div>

</nav>



<!-- InstanceEndEditable --><!-- InstanceBeginEditable name="main contents" -->

<p class="btn-group-vertical">
   <?php
	  include("db/opendb.php"); 
$pid = "";
	function check($pid, $eid){
	global $conn;
	 
	$count =0;
	$query = "select preferences from pref where preferences='".$pid."' and email = '".$eid."'";
     $stmt = $conn->prepare($query);	
				$stmt->execute();
				$count = $stmt->rowCount();
				
	if($count == 0)
      return false;
    else
      return true;	
				

}
	function checkweb($wid, $eid){
	global $conn;
	 
	$count =0;
	$query = "select websites from web where websites='".$wid."' and email = '".$eid."'";
     $stmt = $conn->prepare($query);	
				$stmt->execute();
				$count = $stmt->rowCount();
				
	if($count == 0)
      return false;
    else
      return true;	
				

	}
	 
	$query= "select table1.email, name, country,city,province, answer ,address from table1";
	$result = $conn -> query($query) or die("Query error");

?>
 
 <table width="80%" border="1" align="center" cellpadding="4" cellspacing="1" class="externalTable table-responsive table-hover text-center table-striped text-info" >
  <tr class=" h3">
<th colspan="2" ></th>
<th>Email</th>
<th><strong>Name</strong></th>
<th><strong>Country</strong></th>
<th><strong>City</strong></th>
<th><strong>Province</strong></th>
<th><strong>Address</strong></th>
<th><strong>Answer</strong></th>
<th><strong>Preferences</strong></th>
<th><strong>Website</strong></th>

</tr>

<?php
        foreach($result as $row)
	   	{
 	   ?>
        <tr>
        <td width="27"><a href="singleview.php?id=<?php echo $row ['email']; ?>" class="list-group-item-info">View </a></td>
        <td width="25"><a href="edit.php?id=<?php echo $row['email'];?>" class="list-group-item-warning">EDIT</a></td>
		<td> <?php echo $row ['email'];?>	</td>
		<td> <?php echo $row ['name'];  ?>	</td>
		<td> <?php echo $row ['country'];  ?>	</td>
		<td> <?php echo $row ['city'];  ?>	</td>
		<td> <?php echo $row ['province'];  ?>	</td>
		<td> <?php echo $row ['address'];  ?> </td>
		<td><?php
		if($row['answer'] == "red"){
			?>
          <input checked="checked" type="radio" value="Red" />
          Red<br />
          <?php
		}else{
			?>
          <input type="radio"  value="Red" />
          Red<br />
          <?php }
		
		if($row['answer'] == "blue"){
			?>
          <input checked="checked" type="radio"  value="Blue" />
          Blue<br />
          <?php
		}else{
			?>
          <input type="radio"  value="Blue" />
          Blue<br />
          <?php }
		if($row['answer'] == "gray"){
			?>
          <input checked="checked" type="radio"  value="Gray" />
          Gray<br />
          <?php
		}else{
			?>
          <input type="radio"  value="Gray" />
          Gray<br />
          <?php }
		?></td>
		<td> 
    <?php
			$query1="select preferences from preferences";
		
		try
			{
                $stmt = $conn->prepare($query1);	
				$stmt->execute();
				
				while($row1 = $stmt -> fetch())
				{
					$str = "";
					
					if( check($row1[0], $row ['email']) == TRUE)
					$str = "checked";
                     else
                    $str = "";						 
					?>
				<input <?php echo $str; ?> type="checkbox" name="chkpref[]" value="<?php echo $row1[0]; ?>" id="chkpref[]" > &nbsp; <?php echo $row1[0]; ?> <br>
				
					<?php
					
				}
			}
			catch(PDOException $e)
			{
				echo $e -> getMessage();
			}
	?>
        </td>
		<td><?php  
		$query2="select websites from websites";
		
		try
			{
                $stmt = $conn->prepare($query2);	
				$stmt->execute();?>
          <select name="mulselect[]" size="6" multiple="multiple" id="mulselect">
            <?php
				
				while($row1 = $stmt -> fetch())
				{
					$str = "";
					
					if( checkweb($row1[0], $row ['email']) == TRUE)
					$str = "selected";
                     else
                    $str = "";						 
					?>
              <option <?php echo $str; ?> value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option>
              <br>
            <?php
					
				}
				?>
          </select>
          <?php
			}
			catch(PDOException $e)
			{
				echo $e -> getMessage();
			}
		
		
		?></td>
        </tr>
		<?php } ?>
    </table>

	  <?php $conn = NULL; ?>







<!-- InstanceEndEditable -->



<div class="container-fluid">

<hr />
  <p class="bg-warning color" style="font-family:Verdana, Geneva, sans-serif; font-size:10px">Copyrights &copy;by Daniya Jadoon</p>
 <hr />
 </div>

</body>
<!-- InstanceEnd --></html>
