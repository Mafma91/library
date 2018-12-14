<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Authors</title>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {

	         if( document.forms["add_author"]["authorname"].value == "" )
	         {
	            alert( "Please provide user name!" );
	            return false;
	         }



	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Add Author</h1></div>
	<?php
		if(isset($result))
		{
			echo " Author added successfully";

	 }
		else {
			echo '<form name="add_author" action="'. base_url().'index.php/library/add_author" onsubmit="return validateForm()" method="post">
		   Author Name: <input type="text" name="authorname"><br>


			 ';


			 echo '</select>
			    <input type="submit" value="Add">
			  </form>';
		}
		?>




</body>
</html>
