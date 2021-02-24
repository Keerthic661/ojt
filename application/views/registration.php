<! DOCTYPE html>
<html>
<head>
<title>  registeration </title>
<style>
	
	input{
		padding:10px;
		margin:10px;
	}
	fieldset
	{
		width: 40px;
	}
 </style>
</head>
<body>
 <!---form starts---->
 <fieldset  >
  <form name="myform" action="<?php echo base_url()?>main/regaction" method="POST" > 
       
        <input type="text" name="fname"  placeholder="firstname" pattern=".{3,}"   required title="3 characters minimum" maxlength="25"></br>
    	  
    	   <input type="text" name="lname"  placeholder="lastname" pattern=".{3,}"   required title="3 characters minimum"  maxlength="25"></br>
            
            <input type="text" name="username"  placeholder="username" required pattern=".{3,}"   required title="3 characters minimum" maxlength="10"></br>
			
			<input type="password" name="password" placeholder="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"> </br>
        
        <input type="text" name="mobile"  placeholder="phoneno" required minlength="10"maxlength="10"></br>
      
      <input type="email" name="email"  placeholder="email" required> </br>
    
    <input type="submit" name="submit" >
            </form>
            </fieldset>
 <!----form ends----->
 

</body>
</html>
