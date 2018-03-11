function validate()
      {
	  var a = document.login_form.username.value;
      var b = document.login_form.password.value;

            
         if(a == "")
		 {
		 alert("please enter username.");
		 return false;
		 }
       if(a != "epinet_dehradun")
        {
         alert("Invalid Username  please try again");
         return false;
        } 
      
         if(b == "")
         {
         alert("please enter Password");
         //document.login_form.password.focus();
         return false;
         }
         if(b != "ed")
        {
         alert("Invalid password please try again");
         return false;
        } 
      

            
		return( true );
      }
