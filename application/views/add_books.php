<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>library</title>

	<script type="text/javascript">

     function add_book()
     {

     if( document.forms["add_book"]["ISBN"].value == "" )
     {
        alert( "Please provide ISBN for this book!" );
        return false;
     }
     if( document.forms["add_book"]["bookname"].value == "" )
     {
        alert( "Please provide book name!" );
        return false;
     }
     if( document.forms["add_book"]["numberofpages"].value == "" )
     {
        alert( "Please provide number of pages for this book!" );
        return false;
     }
     if( document.forms["add_book"]["genre"].value < 0 )
     {
        alert( "Please provide genre for this book!" );
        return false;
     }
     if( document.forms["add_book"]["type"].value < 0 )
     {
        alert( "Please provide type for this book!" );
        return false;
     }
	 }


//-->
</script>
</head>
<body>
<div><h1>Add Book</h1></div>

<form name="add_book" action="<?php echo $this->config->base_url(); ?>index.php/library/add_book_result" onsubmit="return validateForm()"  method="post">
Book Name: <input type="text" name="bookname"><br>
Number of pages: <input type="text" name="numberofpages"><br>
Publishing Date: <input type= "date" name="publishingdate"><br>
 Edition Number: <input type= "text" name="editionnumber"><br>
 Print Date: <input type= "date" name="printdate"><br>
 ISBN: <input type= "text" name="ISBN"><br>



<?php

		 echo '<br><br> Authors <br>';

		 foreach ($authorslist as $author)
		 {
			 echo '<input type="checkbox" name="authors[]" value="'.$author->authorid.'"> '.$author->authorname.'<br>';
		 }

		 echo '<br><br> Genres <br>';

		 foreach ($genrelist as $genre)
		 {
		 	echo '<input type="checkbox" name="genre[]" value="'.$genre->genreid.'"> '.$genre->genrename.'<br>';
		 }
echo '<br><br> Types <br>';
		 foreach ($typeslist as $type)
		 {
			echo '<input type="checkbox" name="type[]" value="'.$type->typeid.'"> '.$type->typename.'<br>';
		 }

echo'<input type="submit" value="Add"></form>';

?>




</body>
</html>
