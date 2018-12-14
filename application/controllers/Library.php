	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class library extends CI_Controller {

	public function __construct() {
    parent::__construct();
		$this->load->model('library_model');
		$this->load->helper('url');

  }

	public function index(){
		$this->load->view('login');
	}


	public function add_user(){
		if($this->input->post("username") || $this->input->post("firstname")
		|| $this->input->post("lastname") || $this->input->post("userage")
		 || $this->input->post("password"))
		{
			$result = $this->library_model->adduser();
			$data = array();
			$data['result'] = $result;
			$this->load->view('add_user',$data);
		}
		else {
			$this->load->view('add_user');
		}
	}

	public function login()
	{
		$result = $this->library_model->loginrequest($this->input->post("username"),$this->input->post("password"));
		if($result!=0)
		{
			//$this->session->set_userdata('isuserloggedin', 'true');
			redirect('/library/mainpage');
		}
		else
		{
			echo "wrong username or password";
		}
	}

	public function mainpage()
	{
		$this->load->view('library_main');
	}

	public function logout()
{

	redirect('/library');
}

	public function showallbooks()
	{
			$all_books = $this->library_model->get_all_books();

	    $data = array();
	    $data['books'] = $all_books;
			$this->load->view('showallbooks',$data);
	}

	public function search_books()
	{
		if($this->input->post("bookname"))
		{
			$result = $this->library_model->searchbooks($this->input->post("bookname"));
	    $data = array();
	    $data['books'] = $result;
			$this->load->view('searchbooks',$data);
		}
		else
		{
			$this->load->view('searchbooks');
		}

	}

	public function add_book()
	{
		$result = $this->library_model->getauthors();
		$data = array();
		$data['authorslist'] = $result;
		$result = $this->library_model->getgenre();
		$data['genrelist'] = $result;
		$this->load->view('add_books',$data);
	}

	public function add_book_result()
			{
				$result = $this->library_model->addbook();
				$data = array();
				$data['result'] = $result;
				$this->load->view('add_book_results',$data);
			}

	public function add_genre(){
		if($this->input->post("genrename"))
		{
			$result = $this->library_model->addgenre();
			$data = array();
			$data['result'] = $result;
			$this->load->view('add_genre',$data);
		}
		else {
			$this->load->view('add_genre');
		}
	}
	public function add_author(){
		if($this->input->post("authorname"))
		{
			$result = $this->library_model->addauthor();
			$data = array();
			$data['result'] = $result;
			$this->load->view('add_author',$data);
		}
		else {
			$this->load->view('add_author');
		}
	}


public function delete_book($id)
{
	$result = $this->library_model->deletebook($id);
	redirect('Library/showallbooks');

}

}
?>
