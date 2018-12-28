<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Books</title>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {

	         if( document.forms["updatebook"]["bookname"].value == "" )
	         {
	            alert( "Please provide book name!" );
	            return false;
	         }

	         if( document.forms["updatebook"]["publishingdate"].value == "" )
	         {
	            alert( "Please provide publishing date!" );
	            return false;
	         }
					 if( document.forms["updatebook"]["numberofpages"].value < 0 )
	         {
	            alert( "Please provide student age greater than 0!" );
	            return false;
	         }
           if( document.forms["updatebook"]["type"].value == "" )
	         {
	            alert( "Please provide book type!" );
	            return false;
	         }

	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Edit Book | <?php echo $book->bookname?></h1></div>
	<form name="updatebooks" action="<?php echo base_url(); ?>index.php/library/updatebook" onsubmit="return validateForm()" method="post">
	 Book Name: <input type="text" name="bookname" value="<?php echo $book->bookname?>"><br>
	 Publishing date: <input type="text" name="publishingdate" value="<?php echo $book->publishingdate?>"><br>
	 Number of pages: <input type="text" name="numberofpages" value="<?php echo $book->numberofpages?>"><br>
	 ISBN: <input type="text" name="ISBN" value="<?php echo $book->ISBN?>"><br>
	 Edition number: <input name="editionnumber" value="<?php echo $book->editionnumber?>"><br>
	 Print date: <input type="date" name="printdate" value="<?php echo $book->printdate?>"><br>


	<?php


		 if(isset($genrelist))

		 echo '<br><br> genres <br>';

			 foreach ($genrelist as $genre)
				 {
					$isthere = 0;
 				 if (in_array($genre->genreid, $bookgenres)) {
 					 	$isthere = 1;
 				 }
				 if($isthere == 1)
				 {
					 echo '<input checked type="checkbox" name="genre[]" value="'.$genre->genreid.'"> '.$genre->genrename.'<br>';
				 }
				 else
				 {
					 echo '<input type="checkbox" name="genre[]" value="'.$genre->genreid.'"> '.$genre->genrename.'<br>';
				 }

			 }
		 echo '</select>';
		 echo '<br><br> authors <br>';

		 foreach ($authorslist as $authors)
		 {
			 $isthere = 0;
			 if (in_array($authors->authorid, $bookauthor)) {
					$isthere = 1;
			 }

			 if($isthere == 1)
			 {
				 echo '<input checked type="checkbox" name="authors[]" value="'.$authors->authorid.'"> '.$authors->authorname.'<br>';
			 }
			 else
			 {
				 echo '<input type="checkbox" name="authors[]" value="'.$authors->authorid.'"> '.$authors->authorname.'<br>';
			 }
		 }
		 echo '<br><br> Types <br>';

		foreach ($typeslist as $types)
		{
			$isthere = 0;
			if (in_array($types->typeid, $booktypes)) {
				 $isthere = 1;
			}

			if($isthere == 1)
			{
				echo '<input checked type="checkbox" name="type[]" value="'.$types->typeid.'"> '.$types->typename.'<br>';
			}
			else
			{
				echo '<input type="checkbox" name="type[]" value="'.$types->typeid.'"> '.$types->typename.'<br>';
			}
		}
		  echo'    <input type="hidden" name="ISBN" value="'.$book->bookid.'">
			<br><input type="submit" value="Update">
		  </form>';

	?>






</body>
</html>
