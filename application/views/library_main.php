<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//isset($_SESSION['isuserloggedin']) OR exit('Please Login');

$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Local Municipality library</title>


</head>
<body>

<div><h1>Local Municipality Library</h1></div>
<div><h2>Please choose an options</h2></div>
<a href="<?php echo base_url();?>index.php/library/showallbooks"><input type="button" value="Show All Book"></a><br>
<a href="<?php echo base_url();?>index.php/library/search_books"><input type="button" value="Search"></a><br>
<a href="<?php echo base_url();?>index.php/library/add_book">Add books</a><br>
<a href="<?php echo base_url();?>index.php/library/add_genre"><input type="button" value="Add Genre"></a><br>
<a href="<?php echo base_url();?>index.php/library/add_author"><input type="button" value="Add Author"></a><br>
<a href="<?php echo base_url();?>index.php/library/add_user"><input type="button" value="Add User"></a><br>
<a href="<?php echo base_url();?>index.php/library/edit_book">edit book</a><br>
<a href="<?php echo base_url();?>index.php/library/logout"><input type="button" value="Logout"></a><br>


</body>
</html>
