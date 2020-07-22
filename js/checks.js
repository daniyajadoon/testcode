// JavaScript Document



function validate()
{
		 var email=document.getElementById("txtemail");
		  var email2=document.getElementById("txtemail").value;
		 var name=document.getElementById("txtname");
		 var country=document.getElementById("ddlcountry");
		 var city=document.getElementById("ddlcity");
		 var ans=document.getElementsByName("color");
		 var pref=document.getElementsByName("chkpref[]");
		 var web=document.getElementById("mulselect[]");
		 var add=document.getElementById("txtaddress");
	     var User = country.options[country.selectedIndex].value;
		 var User1 = city.options[city.selectedIndex].value;
		 var name1 = document.getElementById("txtname").value;
         var nameFormat =/^[a-zA-Z ]{2,30}$/;
		  var emailFormat =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			if (email.value.length == 0)
            {
                alert("Email cannot be blank");
                email.focus();
                return false;
            }

            if ( email.value.length > 50)
            {
                alert("Email must be in range");
                email.focus();
                return false;
            }
			if( emailFormat.test(email2) == false)
			{
			alert("email must be in correct format");
			name.focus();
			return false;
			}
			if (name.value.length == 0)
            {
                alert("Name cannot be blank");
                name.focus();
                return false;
            }

            if ( name.value.length > 50)
            {
                alert("Name must be in range");
                name.focus();
                return false;
            }
			if( nameFormat.test(name1) == false)
			{
			alert("Name must be in correct format");
			name.focus();
			return false;
			}
			
 if(User==0)
{
alert("Country Required");
return false;
}


if(User1==0)
{
alert("City Required");
return false
}
for (var i = 0; i < ans.length; i++)
            {
		
			   if(ans[i].checked==true)
			   {
			   status = true;
			   }
	        }
			
			if(status == false)
			{
			//alert("At least one Answer must be selected");
			return false;
			}
			
            var count=0; 
			for (var i = 0; i < pref.length; i++)
            {
				if(pref[i].checked == true)
				{
				count++;
				
				}
				
			}
				if(count < 2)
			{
			alert("At least two Preferences must be selected");
			return false;
			}
			
			
             
			 
			 var count1=0;
			for (var i = 0; i < web.length; i++)
            {
				if (web[i].selected==true)
				 {
					 
				count1++;
				
				}
				
			}
			
			if(count1 < 2)
			{
			alert("At least two Websites must be selected");
			return false;
			}
			

            if ( add.value.length > 100)
            {
                alert("Address must be in range");
                add.focus();
                return false;
			
}
if( emailFormat.test(email) == false)
			{
			alert("email must be in correct format");
			name.focus();
			return false;
			}
 
}
function ShowPopup()
    {
        var myWindow = window.open("page2.php", "txtpro", "width=400,height=300, left=300, top=200, scrollbars");  

      
    }
	
	function textCounter( field, countfield, maxlimit ) {
 if ( field.value.length > maxlimit ) {
  field.value = field.value.substring( 0, maxlimit );
  field.blur();
  field.focus();
  return false;
 } else {
  countfield.value = maxlimit - field.value.length;
 }
}
