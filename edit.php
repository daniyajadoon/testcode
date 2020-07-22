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
<a href="home.php" class="navbar-brand  color"> TASK 12</a>
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
	include("db/opendb.php"); 
$query='';
$query1='';
$query2='';
$status=FALSE;
$txtemail="";
	$msg ="";
	$id="";
	$status="false";
	if( isset($_GET['id']) == TRUE )
	$id = $_GET['id'];
		
		$txtemail=isset($_POST['txtemail']) == TRUE ? trim($_POST['txtemail']) : "";
		$txtname = isset($_POST['txtname']) == TRUE ? trim($_POST['txtname']) : "";
		$ddlcountry = isset($_POST['ddlcountry']) == TRUE ? trim($_POST['ddlcountry']) : "";
		$ddlcity = isset($_POST['ddlcity']) == TRUE ? trim($_POST['ddlcity']) : "";
		$txtpro=isset($_POST['txtpro']) == TRUE ? trim($_POST['txtpro']) : "";
		$color=isset($_POST['color']) == TRUE ? trim($_POST['color']) : "";
		$pref=isset($_POST['pref']) == TRUE ? trim($_POST['pref']) : "";
		$web=isset($_POST['web']) == TRUE ? trim($_POST['web']) : "";
		$txtaddress =isset($_POST['txtaddress']) == TRUE ? trim($_POST['txtaddress']) : "";
		$pid = "";
		global $row;
	function check($pid, $id){
	global $conn;
	 
	$count =0;
	$query = "select preferences from pref where preferences='".$pid."' and email = '".$id."'";
     $stmt = $conn->prepare($query);	
				$stmt->execute();
				$count = $stmt->rowCount();
				
	if($count == 0)
      return false;
    else
      return true;	
				

}
	function checkweb($wid, $id){
	global $conn;
	 
	$count =0;
	$query = "select websites from web where websites='".$wid."' and email = '".$id."'";
     $stmt = $conn->prepare($query);	
				$stmt->execute();
				$count = $stmt->rowCount();
				
	if($count == 0)
      return false;
    else
      return true;	
	}
	  


$query = "update  table1 set  name=:name,country=:country,city=:city,province=:province,answer=:answer,address=:address   where  email='" . $id . "'";
 
 if( isset($_POST['btnsubmit']) )
	{
		$pref=$_POST['chkpref'];
		$web=$_POST['mulselect'];
		try
		{
			$stmt  = $conn -> prepare($query);
			
			$stmt -> bindParam(':name', $txtname);
			$stmt -> bindParam(':country', $ddlcountry);
			$stmt -> bindParam(':city', $ddlcity);
			$stmt -> bindParam(':province', $txtpro);
		    $stmt -> bindParam(':answer', $color);
	        $stmt -> bindParam(':address', $txtaddress);
		    $stmt -> execute();
			$msg = "Record updated successfully...";
			$status='true';
			
			
		}
		catch(PDOException $e)
		{
			echo $e -> getMessage();
			$status='false';
			
		}
		
		
		if($status==TRUE)
		{
	    $query4 = " delete from  pref  WHERE email = '".$id."' ";
		$stmt3  = $conn -> prepare($query4);
		$stmt3 -> execute();
		$query5 = " delete from  web WHERE email = '".$id."' ";
		$stmt4  = $conn -> prepare($query5);
	    $stmt4 -> execute();
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
		if( isset($_POST['btndelete']) )
	{
		$query = "delete from  table1 where email ='" . $id . "'";
		$conn -> query($query) or die("delete error");
		$query1 = "delete from  pref where email ='" . $id . "'";
		$conn -> query($query1) or die("delete error");
		$query2= "delete from  web where email ='" . $id . "'";
		$conn -> query($query2) or die("delete error");
		
		echo "<script language = \"javascript\" type = \"text/javascript\"> window.location.href=\"home.php\"; </script>";		
	}

		
$query="select *  from  table1,pref,web where table1.email='" . $id . "'
 and pref.email='" . $id . "' and web.email='" . $id . "'";
	
	
	$result = $conn -> query($query) or die("sql error");
	foreach($result as $row)
	{
		
	$txtemail=$row['email'];
	$txtname = $row['name'];
	$ddlcountry = $row['country'];
	$ddlcity = $row['city'];
	$txtpro=$row['province'];
	$color=$row['answer'];
	$txtaddress = $row['address'];
	}
	?>
		
     <form id="form1" name="form1" method="post" action="">
      <table width="60%" border="1" align="center" class="table-striped table-responsive text-center text-info externalTable">
            <tr>
              <td class="h2">E-mail</td>
              <td>
                <input name="txtemail" type="text" id="txtemail" class="inputboxes" value="<?php echo $id;?>" />
                
				</td>
            </tr>
            <tr>
              <td class="h2">Name</td>
              <td>
                <input type="text" name="txtname" id="txtname" class="inputboxes"  value=" <?php echo $txtname;?>"/>
                
				</td>
            </tr>
            <tr>
              <td class="h2">Country</td>
              <td><select name="ddlcountry" id="ddlcountry" class="inputboxes color">
                <option value=" <?php echo $ddlcountry;?>"> <?php echo $ddlcountry;?></option>
			    <option value="Pakistan">Pakistan</option>
				 <option value="Saudi Arabia">Saudi Arabia</option>
				<option value="Dubai">Dubai</option>
				<option value="USA">USA</option>
               </select>
			  </td>
              </tr>
              <tr>
              <td class="h2">City</td>
              <td><select name="ddlcity" id="ddlcity" class="inputboxes color">
                <option  value="<?php echo $ddlcity;?>"> <?php echo $ddlcity;?></option>
				<option value="Karachi">Karachi</option>
				<option value="Riyadh">Riyadh</option>
				<option value="Islamabad">Islamabad</option>
				<option value="North dakota">North dakota</option>
              </select></td>
            </tr>
            <tr>
              <td class="h2">Province</td>
              <td><input type="text" name="txtpro" id="txtpro" class="inputboxes" value=" <?php echo $txtpro;?>" />
             <input name="btnshow" type="button" class="btn-link" id="btnshow" onclick="ShowPopup();" value="show" /></td>
            </tr>
            <tr>
              <td class="h2">Answer</td>
              <td> <?php
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
		?>
        </td>
            </tr>
            <tr>
              <td class="h2">Preferences</td>
              <td><b> <?php
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
	?></td>
            </tr>
            <tr>
              <td class="h2">Website</td>
              <td><table width="200" border="1" class="color">
                <tr>
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
					<option <?php echo $str; ?> value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option><br>	
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
                  <td>use ctrl+click for multiselection</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td class="h2">Address</td>
              <td><textarea name="txtaddress" id="txtaddress" cols="45" rows="5" class="inputboxes" onblur="textCounter(this,this.form.counter,100);" onkeyup="textCounter(this,this.form.counter,100);"> <?php echo $txtaddress; ?> </textarea></td> </tr>
			  <tr><td></td><td><div>Chars Remaining--<input onBlur="textCounter(this.form.recipients,this,100);" disabled  onfocus="this.blur();"  tabindex="999" maxlength="100" value="200" name="counter"  ></div>
           </td></tr>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><span id="errmsg"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="right"><input name="btnsubmit" type="submit" class="btn-success" id="btnsubmit" value="Save" />
               <input name="btndelete" type="submit" class="btn-danger" id="btndelete" onclick="return confirm('Delete record?');" value="Delete" />
              <input name="btnreset" type="button" class="btn-primary" id="btnreset" onclick="window.location.href='home.php';" value="Back" />
                <input name="btnreset" type="reset" class="btn-info" id="btnreset" value="Reset" /></td>
            </tr>
          </table>
</form>
	   <script type="text/javascript" src="task11.js"></script>
		<?php $conn=NULL; ?>









<!-- InstanceEndEditable -->



<div class="container-fluid">

<hr />
  <p class="bg-warning color" style="font-family:Verdana, Geneva, sans-serif; font-size:10px">Copyrights &copy;by Daniya Jadoon</p>
 <hr />
 </div>

</body>
<!-- InstanceEnd --></html>
