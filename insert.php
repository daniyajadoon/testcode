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
<title>insert record</title>
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
          <li><a href="home.php" > Home</a></li>
            <li><a href="insert.php" class="active">Insert New Record</a></li>
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
<script type="text/javascript" src="js/checks.js"></script>

<form id="form1" name="form1" method="post" action="insertsave.php">
  <table width="60%" border="1" align="center" class="table-striped table-bordered table-responsive text-center text-info externalTable">
        <tr>
          <td class="h2">E-mail</td>
          <td colspan="3"><input name="txtemail" type="text" class="inputboxes" id="txtemail" /></td>
        </tr>
        <tr>
          <td class="h2">Name</td>
          <td colspan="3"><input name="txtname" type="text" class="inputboxes" id="txtname" /></td>
        </tr>
        <tr>
          <td class="h2">Country</td>
          <td><select name="ddlcountry" class="color" id="ddlcountry">
            <option selected="selected">--Select value--</option>
            <option>Bangladesh</option>
            <option>Italy</option>
            <option>UK</option>
            <option>Australia</option>
            <option>Pakistan</option>
            <option>India</option>
            <option>Afghanistan</option>
          </select></td>
          <td class="h2">City </td>
          <td><select name="ddlcity" class="color" id="ddlcity">
            <option selected="selected">--Select option--</option>
            <option>Islamabad</option>
            <option>Lahore</option>
            <option>Karachi</option>
            <option>Abbottabad</option>
            <option>Attok</option>
            <option>Multan</option>
            <option>Peshawar</option>
          </select></td>
        </tr>
        <tr>
          <td class="h2">Province</td>
          <td colspan="3"><input name="txtpro" type="text" class="inputboxes" id="txtpro" />
            <input name="btn" type="button" class="btn-link" id="btn"
onclick="ShowPopup();" value="Show" /></td>
        </tr>
        <tr>
          <td class="h2">Answer</td>
          <td colspan="3"><input name="color" type="radio" class="inputboxes" id="radio1" value="red"/>
            <span class="color">Red</span>
            <input name="color" type="radio" class="inputboxes" id="radio2" value="gray"/>
            <span class="color">Gray</span> <span class="color">
              <input name="color" type="radio" class="inputboxes" id="radio3" value="blue"/>
              Blue</span></td>
        </tr>
        <tr>
          <td class="h2">Preference</td>
          <td colspan="3"><input name="chkpref[]" type="checkbox" class="inputboxes" id="chkpref[]" value="sports"/>
            <span class="color">Sports</span> <span class="color">
              <input name="chkpref[]" type="checkbox" class="inputboxes" id="chkPolitics" value="politics"/>
              Politics
              <input name="chkpref[]" type="checkbox" class="inputboxes" id="chkBusiness" value="business"/>
              Busines</span>s </td>
        </tr>
        <tr>
          <td class="h2">Website</td>
          <td colspan="3"><table border="2" class="insertTable">
            <tr>
              <td width="219" height="26"><select name="mulselect[]" size="7" multiple="multiple" class="color" id="mulselect[]">
                <option selected="selected" value="instagram">instagram</option>
                <option value="facebook">facebook</option>
                <option value="google">google</option>
                <option value="yahoo">yahoo</option>
                <option value="twitter">twitter</option>
                <option value="gmail">gmail</option>
              </select></td>
            </tr>
            <tr>
              <td><span class="color">user ctrl+click for multi-selection</span></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td class="h2">Address</td>
          <td colspan="3"><p class="externalTable">
            <textarea name="txtaddress" cols="50" rows="1" class="inputboxes" id="txtaddress" style="/* [disabled]WIDTH: 200px; */ HEIGHT: 94px" onBlur="textCounter(this,this.form.counter,200);" onKeyUp="textCounter(this,this.form.counter,200);"    >
              </textarea>
          </p>
            <p class="externalTable">
              <input name="counter" disabled="disabled"  class="color" tabindex="999"  onfocus="this.blur();" onBlur="textCounter(this.form.recipients,this,200);" value="200" size="5" maxlength="3" />
              <span class="color">              words remaining
              </span></p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3" class="color"><?php  echo isset($_GET['msg']) == TRUE ? $_GET['msg'] : ""; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3" align="right" class="color"><input name="btnsubmit" type="submit" class="btn-success" id="btnsubmit"  onclick="validate();" value="Save" />
            <input name="reset" type="reset" class="btn-danger" id="reset" onClick="window.location.href='insert.php';" value="Reset" /></td>
        </tr>
  </table>
      <p class="externaltabe">&nbsp;</p>
</form>
    







<!-- InstanceEndEditable -->



<div class="container-fluid">

<hr />
  <p class="bg-warning color" style="font-family:Verdana, Geneva, sans-serif; font-size:10px">Copyrights &copy;by Daniya Jadoon</p>
 <hr />
 </div>

</body>
<!-- InstanceEnd --></html>
