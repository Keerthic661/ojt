<! DOCTYPE html>
<html>
<head>
<title>  first site  </title>
<style>
	
	input{
		padding:20px;
		margin:20px;
	}
  .error{
       color:red;
  }
</style>
</head>
<body>
 <!---form starts---->
 <fieldset  >
  <form action="<?php echo base_url()?>main/regaction" method="POST" >
    <span class="error"></span>  
      <input type="text" name="fname"  placeholder="firstname" ></br>
    
          <input type="text" name="lname"  placeholder="lastname" ></br>
       
         <input type="text" name="username"  placeholder="username" ></br>

          <input type="password" name="password" placeholder="password"> </br>
        
           <input type="text" name="mobile"  placeholder="phoneno" ></br>
           
          <input type="email" name="email"  placeholder="email" > </br>
            
               <input type="submit" name="submit" >
            </form>
            </fieldset>
 <!----form ends----->


</body>
</html>
