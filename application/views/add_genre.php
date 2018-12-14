<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Genre</title>

	<script type="text/javascript">
	function validateForm()
     {

        if( document.forms["addgenre"]["genrename"].value == "" )
        {
           alert( "Please provide genre name!" );
           return false;
        }

     }
  //-->
</script>
</head>
<body>
<div><h1>Add genre</h1></div>
<?php
	if(isset($result))
	{
		echo " Genre added successfully";

 }
	else {
		echo '<form name="add_genre" action="'. base_url().'index.php/library/add_genre" onsubmit="return validateForm()" method="post">
		 Genre Name: <input type="text" name="genrename"><br>


		 ';


		 echo '</select>
				<input type="submit" value="Add">
			</form>';
	}
	?>

</body>
</html>
