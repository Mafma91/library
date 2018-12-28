<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Library</title>


</head>
<body>
	<div><h1>Search Book Results</h1></div>
<form action="<?php echo base_url(); ?>index.php/library/search_books" method="post">
	Book Name: <input type="text" name="bookname"><br>
	<input type="submit" value="Search">

</form>

 <?php
 if(isset($books))
 {
	 if(count($books) == 0)
	 {
		 echo "no results found";
	 }
	 else {
	 	echo '<div><h1>Search results</h1></div>
	  <div class="divTable">
	  <div class="divTableHeading">
	  <div class="divTableRow">
		<div class="divTableHead">ISBN</div>
	  <div class="divTableHead">bookname</div>
		<div class="divTableHead">author</div>
		<div class="divTableHead">genre</div>
		<div class="divTableHead">edition</div>
		<div class="divTableHead">numberofpages</div>
		<div class="divTableHead">publishingdate</div>
		<div class="divTableHead">type</div>

	  </div>
	  </div>
	  <div class="divTableBody">';


	  			foreach ($books as $book) {

	  				echo '<div class="divTableRow">';
						echo '<div class="divTableCell">'.$book->ISBN.'</div>';
	  				echo '<div class="divTableCell">'.$book->bookname.'</div>';
						echo '<div class="divTableCell">'.$book->authorname.'</div>';
						echo '<div class="divTableCell">'.$book->genrename.'</div>';
						echo '<div class="divTableCell">'.$book->editionnum.'</div>';
						echo '<div class="divTableCell">'.$book->numberofpages.'</div>';
						echo '<div class="divTableCell">'.$book->publishingdate.'</div>';
						echo '<div class="divTableCell">'.$book->type.'</div>';






	  				echo '</div>';
	  			}
	  	echo"</div></div>";
	 }

	}
 ?>


</body>
</html>
