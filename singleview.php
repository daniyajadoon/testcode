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
<a href="home.php" class="navbar-brand color"> TASK 12</a>
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

<?php 
   function checkweb($wid, $eid){
	global $conn;
	 
	$count =0;
	$query = "select websites from  web where websites='".$wid."' and email = '".$eid."'";
     $stmt = $conn->prepare($query);	
				$stmt->execute();
				$count = $stmt->rowCount();
				
	if($count == 0)
      return false;
    else
      return true;	
				

	}
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
	include("db/opendb.php"); 
	
	$id="";
	if( isset($_GET['id']) == TRUE )
	$id = $_GET['id'];
	$query="select *  from  table1 where  email='" . $id . "'";
	
	
	$result = $conn -> query($query) or die("sql error");
	?>
      <table width="55%" align="center" class="externalTable table-responsive table-striped text-info">
      <tr>
        <td class="h2">E-mail</td>
        <td colspan="2" class="color"><?php echo $id; ?></td>
      </tr>
       <?php
		foreach($result as $row)
		{
		?>
      <tr>
        <td class="h2">Name</td>
        <td colspan="2" class="color"><?php echo $row['name']; ?></td>
      </tr>
      <tr>
        <td class="h2">Country</td>
        <td colspan="2" class="color"><?php echo $row['country']; ?></td>
        </tr>
      <tr>
        <td class="h2">City</td>
        <td colspan="2" class="color"><?php echo $row['city']; ?></td>
        </tr>
      <tr>
        <td class="h2">Province</td>
        <td colspan="2" class="color"><?php echo $row['province']; ?></td>
      </tr>
      <tr>
        <td class="h2">Answer</td>
        <td colspan="2" class="color"><?php
		if($row['answer'] == "red"){
		echo "Red";	?>
          <br />
          <?php
		}else{
			echo "";
			?>
          <?php }
		
		if($row['answer'] == "blue"){
			echo "Blue";
			?>
          <?php
		}else{
		echo "";	?>
          <br />
          <?php }
		if($row['answer'] == "gray"){
			echo  "Gray";?>
          <?php
		}else{
			echo "";
			?>
          <br />
          <?php }
		?></td>
      </tr>
      <tr>
        <td class="h2">Preference</td>
          <td class="color"><?php
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
            <input <?php echo $str; ?> type="checkbox" name="chkpref[]" value="<?php echo $row1[0]; ?>" id="chkpref[]" />
&nbsp; <?php echo $row1[0]; ?> <br />
<?php
					
				}
			}
			catch(PDOException $e)
			{
				echo $e -> getMessage();
			}
	?></td>
        </tr>
        <tr>
          <td><h2 class="h2">Website</h2></td>
          <td class="color"><?php  
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
        <tr>
          <td><h2 class="h2">Address</h2></td>
          <td class="color"><?php echo $row['address']; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><input name="btnback" type="button" class="btn-success" id="btnback" onclick="window.history.back();" value="Back" /></td>
        </tr>
         <?php
		}
		?>
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
