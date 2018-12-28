<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Books</title>


</head>
<body>

<div><h1>All Books</h1></div>
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
	<div class="divTableHead">edit</div>
	<div class="divTableHead">delete</div>



</div>
</div>
<div class="divTableBody">
      <?php
			foreach ($books as $book) {

        	echo '<div class="divTableRow">';
				echo '<div class="divTableCell">'.$book->ISBN.'</div>';
				echo '<div class="divTableCell">'.$book->bookname.'</div>';
				echo '<div class="divTableCell">'.$book->authorname.'</div>';
				echo '<div class="divTableCell">'.$book->genrename.'</div>';
				echo '<div class="divTableCell">'.$book->editionnumber.'</div>';
				echo '<div class="divTableCell">'.$book->numberofpages.'</div>';
				echo '<div class="divTableCell">'.$book->publishingdate.'</div>';
				echo '<div class="divTableCell">'.$book->typename.'</div>';
				echo '<div class="divTableCell"><a href="'. base_url().'index.php/library/editbook/'.$book->bookid.'">edit</a></div>';
				echo '<div class="divTableCell"><a href="'. base_url().'index.php/library/delete_book/'.$book->bookid.'">Delete</a></div>';

				echo '</div>';
			}
			?>
				</div>
</div>

</body>
</html>
