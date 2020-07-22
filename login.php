<?php session_start()?>
  <?php
  $myvalue1=isset($_COOKIE['email'])? $_COOKIE['email']:"";
  $myvalue2=isset($_COOKIE['password'])? $_COOKIE['password']:"";
	  if(isset($_POST['submit1']))
	  {
		  if(isset($_POST['ch1']))
		  {
			  setcookie('email',$_POST['text1'],time()+3600);//seconds
			  setcookie('password',$_POST['text2'],time()+3600);//seconds
			  
		  }
		mysql_connect("localhost","root","");
        mysql_select_db("assignment1");
		$res =mysql_query("  select * from user where email='$_POST[text1]' && password='$_POST[text2]'");
		while($row=mysql_fetch_array($res))
		{
			$_SESSION["email"]=$row['email'];
			?>
            <script type="text/javascript">
			window.location='home.php';
			</script>
            
            
            <?php
		}
		  
	  }
	  
	  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<a href="# class="navbar-brand color"> WELCOME TO LOGIN PAGE</a>
</div>
      
     
      
      <div><ul class="nav navbar-nav navbar-right"> 
       <li><a href="logout.php">Logout</a></li>
       </ul>
       </div>
      </div>

</nav>



<!-- InstanceEndEditable --><!-- InstanceBeginEditable name="main contents" -->


<form id="form1" name="form1" method="post" action="">
        <table width="60%" height="250" border="0" align="center" class="externalTable table-responsive table-striped text-center">
          <tr>
            <td class="color"><strong><em>ENTER YOUR EMAIL:</em></strong></td>
            <td align="center"><input name="text1" type="text" class="inputboxes" id="text1"  value="<?php echo$myvalue1;?>"  /></td>
          </tr>
          <tr>
            <td class="color"><strong><em>ENTER YOUR PASSWORD</em></strong><em><strong>:</strong></em></td>
            <td align="center"><input name="text2" type="password" class="inputboxes" id="text2"  value="<?php echo $myvalue2;?>"/>             
          </tr>
          <tr>
            <td height="62" rowspan="2"><p>&nbsp;</p>              <p><a href="remove cookies.php" class="bg-warning">remove email and password</a></p></td>
            <td height="59" align="center" valign="middle"><p>
              <input name="ch1" type="checkbox" class="inputboxes" id="ch1" value="ch" />
              <span class="color"> KEEP ME LOG IN </span></p>
              <p>&nbsp;</p></td>
          </tr>
          <tr>
            <td height="23" align="right" valign="top"><input name="submit1" type="submit" class="bg-primary" id="submit1" value="Login" /></td>
          </tr>
        </table>
      </form>





<!-- InstanceEndEditable -->



<div class="container-fluid">

<hr />
  <p class="bg-warning color" style="font-family:Verdana, Geneva, sans-serif; font-size:10px">Copyrights &copy;by Daniya Jadoon</p>
 <hr />
 </div>

</body>
<!-- InstanceEnd --></html>
