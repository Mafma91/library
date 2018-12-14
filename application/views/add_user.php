<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>users</title>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {

	         if( document.forms["add_user"]["userName"].value == "" )
	         {
	            alert( "Please provide user name!" );
	            return false;
	         }

	         if( document.forms["add_user"]["userage"].value == "" )
	         {
	            alert( "Please provide user age!" );
	            return false;
	         }
					 if( document.forms["add_user"]["userage"].value < 18 )
	         {
	            alert( "Please provide user age greater than 18!" );
	            return false;
	         }

	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Add User</h1></div>
	<?php
		if(isset($result))
		{
			echo " Account added successfully";

	 }
		else {
			echo '<form name="add_user" action="'. base_url().'index.php/library/add_user" onsubmit="return validateForm()" method="post">
		   User Name: <input type="text" name="username"><br>
			 Password: <input type="password" name="password"><br>
	     First Name: <input type="text" name="firstname"><br>
	     Last Name: <input type="text" name="lastname"><br>
			 User age: <input type="text" name="userage"><br>

			 ';
			 echo '</select>
			    <input type="submit" value="Register">
			  </form>';
		}
		?>




</body>
</html>
