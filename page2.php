<?php session_start();
if( !isset($_SESSION['email']) )
{
	echo "<script language='javascript'>window.location.href='unauthorized.php';</script>";
}

echo "Welcome: " . $_SESSION['email'] . "<br>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" type="text/css" href="file:///C|/xampp/htdocs/assignment(dd)/css/stylesheet.css"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POPUP</title>
</head>
<script language="javascript" type="text/javascript">
        function ShowText(txt)
        {           
            window.opener.document.getElementById("txtpro").value = txt;
        }
    </script>
</head>
<body  alink="#FF0033" vlink="#FF0033" link="#FF0033" >
<table border="0" align="center">
<tr>
  <td><table border="0" align="center">
    <tr>
      <td><ul>
        <li>
          <h1 ><span class="color"><a href="javascript:;" value="balochistan" onclick="ShowText(this.innerHTML);">KPK</a></span></h1>
        </li>
      </ul></td>
    </tr>
    <tr>
      <td class="insertTable"><ul>
        <li>
          <h1><span class="color"><a href="javascript:;"
   value="sindh" onclick="ShowText(this.innerHTML);">PUNJAB</a></span></h1>
        </li>
      </ul></td>
    </tr>
    <tr>
      <td class="insertTable"><ul>
        <li>
          <h1><span class="color"><a href="javascript:;"
   value="kpk" onclick="ShowText(this.innerHTML);">BALOCHISTAN</a></span></h1>
        </li>
      </ul></td>
    </tr>
    <tr>
      <td class="insertTable"><ul>
        <li>
          <h1><span class="color"><a href="javascript:;"
   value="kashmir" onclick="ShowText(this.innerHTML);">SINDH</a></span></h1>
        </li>
      </ul>        </td>
    </tr>
  </table>    <span class="insertTable"><a href="javascript:;" value="balochistan" onclick="ShowText(this.innerHTML);"></a></span></td>
</tr>
</table>
<span class="insertTable"><br />
</span><br />
<center>
</center>
</body>
</html>