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
          <li><a href="home.php" > Home</a></li>
            <li><a href="insert.php">Insert New Record</a></li>
            <li><a href="search.php" class="active">Search Record</a></li>
          </ul>
      </div>
      
     
      
      <div><ul class="nav navbar-nav navbar-right"> 
       <li><a href="logout.php">Logout</a></li>
       </ul>
       </div>
      </div>

</nav>



<!-- InstanceEndEditable --><!-- InstanceBeginEditable name="main contents" -->
<center>
      <h2>

        <span class="color">SEARCH</span>
        <textarea name="t1" cols="50" class="inputboxes" id="t1" placeholder="ENTER KEYWORD" onkeyup="aa();" autocomplete="off" height="20"></textarea>
      </h2>

    </center>
<hr />
 <br />
<div id="dl" style="height:auto; width:auto ;border-style:solid; border-width:0; margin:auto;min-width:auto; visibility:hidden" >
</div>
<script type="text/javascript">
function aa()
{
	xmlhttp=new XMLHttpRequest();
	xmlhttp.open("GET","select.php?onm="+document.getElementById("t1").value,false);
	xmlhttp.send(null);
	document.getElementById("dl").innerHTML=xmlhttp.responseText;
	document.getElementById("dl").style.visibility='visible';
	
	
}
</script>
	
	








<!-- InstanceEndEditable -->



<div class="container-fluid">

<hr />
  <p class="bg-warning color" style="font-family:Verdana, Geneva, sans-serif; font-size:10px">Copyrights &copy;by Daniya Jadoon</p>
 <hr />
 </div>

</body>
<!-- InstanceEnd --></html>
