<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class login_model extends CI_Model {


  function __construct() {
    parent::__construct();
  }

  function loginrequest($username,$password)
  {
  	$sql = "select * from user where username ='$username' AND password='$password'";
  	$query = $this->db->query($sql);
  	if(count($query->result()) == 1)
  	{
  		return true;
  	}
  	else {
  		return 0;
  	}
  }

}
