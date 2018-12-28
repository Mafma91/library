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
	<div><h1>Edit Book</h1></div>
	<h3>Book Updated Successfully</h3>
	<a href="<?php echo base_url();?>index.php/library/mainpage"><input type="button" value="Back to mainpage"></a><br>






</body>
</html>
