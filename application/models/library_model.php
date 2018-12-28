<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class library_model extends CI_Controller {

	function __construct() {
    parent::__construct();
}

function adduser() {
    $data = array(
            'username' => $this->input->post("username"),
						'firstname' =>$this->input->post("firstname"),
						'lastname' =>$this->input->post("lastname"),
						'userage' => $this->input->post("userage"),
            'password' => $this->input->post("password")
    );
    $this->db->insert('user', $data);
		return 1;

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
function get_all_books() {
    $sql = "SELECT * FROM ((((((books
							 INNER JOIN books_has_genre ON books.bookid = books_has_genre.books_bookid)
							 INNER JOIN genre on books_has_genre.genre_genreid = genre.genreid)
							 INNER JOIN books_has_authors ON books.bookid = books_has_authors.books_bookid)
							 INNER JOIN authors ON books_has_authors.authors_authorid = authors.authorid)
              				 INNER JOIN edition ON books.bookid = edition.books_bookid)
                             INNER JOIN books_has_types ON books.bookid=books_has_types.books_bookid)
                             INNER JOIN types ON books_has_types.types_typeid=types.typeid ";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }

function searchbooks($bookname) {
	$sql = "SELECT * FROM ((((((books
						 INNER JOIN books_has_genre ON books.bookid = books_has_genre.books_bookid)
						 INNER JOIN genre on books_has_genre.genre_genreid = genre.genreid)
						 INNER JOIN books_has_authors ON books.bookid = books_has_authors.books_bookid)
						 INNER JOIN authors ON books_has_authors.authors_authorid = authors.authorid)
										 INNER JOIN edition ON books.bookid = edition.books_bookid)
													 INNER JOIN books_has_types ON books.bookid=books_has_types.books_bookid)
													 INNER JOIN types ON books_has_types.types_typeid=types.typeid where bookname LIKE '%{$bookname}%' ";
	$query = $this->db->query($sql);
	$results = array();
	foreach ($query->result() as $result) {
		$results[] = $result;
	}
	return $results;
}

function addbook()
{
      $data = array(
            'bookname' => $this->input->post("bookname"),
            'numberofpages' => $this->input->post("numberofpages"),
            'publishingdate' => $this->input->post("publishingdate"),
            'ISBN' => $this->input->post("ISBN"),

    );

    $this->db->insert('books', $data);
    $lastId =$this->db->insert_id();


		$editionnumber = $this->input->post("editionnumber");
		$printdate = $this->input->post("printdate");
		$id = $lastId;

		$sql = "insert into edition ( editionnumber, printdate, books_bookid) VALUES ($editionnumber, '$printdate', $lastId)";
			$query = $this->db->query($sql);

			$authors = $this->input->post("authors");
			foreach($authors as $authors)
			{
			 $data = array(
							 'books_bookid' => $lastId,
							 'authors_authorid' => $authors,
			 );
			 $this->db->insert('books_has_authors', $data);
			}

			$genres = $this->input->post("genre");
			foreach($genres as $genres)
			{
			 $data = array(
							 'books_bookid' => $lastId,
							 'genre_genreid' => $genres,
			 );
			 $this->db->insert('books_has_genre', $data);
			}


	$types = $this->input->post("type");
 foreach($types as $type)
 {
	 $data = array(
					 'books_bookid' => $lastId,
					 'types_typeid' => $type,
	 );
	 $this->db->insert('books_has_types', $data);
 }

    return 1;
    }

	function addgenre() {
	    $data = array(
	            'genrename' => $this->input->post("genrename"),
	    );
	    $this->db->insert('genre', $data);
			return 1;
		}
		function addauthor() {
		    $data = array(
		            'authorname' => $this->input->post("authorname"),

		    );
		    $this->db->insert('authors', $data);
				return 1;

		}
		function getedition() {
		      $sql = "select * from edition";
		      $query = $this->db->query($sql);
		      $results = array();
		      foreach ($query->result() as $result) {
		        $results[] = $result;
		      }
		      return $results;
		    }


		function getauthors() {
      $sql = "select * from authors";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }
		function gettypes() {
			$sql = "select * from types";
			$query = $this->db->query($sql);
			$results = array();
			foreach ($query->result() as $result) {
				$results[] = $result;
			}
			return $results;
		}
		function getgenre() {
      $sql = "select * from genre";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }

		function deletebook($id) {
	  $sql = "delete from books where bookid = $id";
	  $query = $this->db->query($sql);
	  return 1;
	  }

		function getbookgenres($id) {
			$sql = "select * from books_has_genre where `books_bookid` = '.$id.'";
		  $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result->genre_genreid;
      }
			return $results;
		}


				function getbooktypes($id) {
					$sql = "select * from books_has_types where `books_bookid` = '.$id.'";
				  $query = $this->db->query($sql);
		      $results = array();
		      foreach ($query->result() as $result) {
		        $results[] = $result->types_typeid;
		      }
					return $results;
				}

		function getbookauthors($id) {
			$sql = "select * from books_has_authors where `books_bookid` = '.$id.'";
		  $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result->authors_authorid;
      }
			return $results;
		}


	function getbookdetailsbyid($id)
 {
	$sql = "select * from books inner join edition on books.bookid=edition.books_bookid where bookid=$id";
	$query = $this->db->query($sql);
	return $query->result();
 }

 function updatebooks() {
	 $id = $this->input->post("bookid");
    $ISBN = $this->input->post("ISBN");
    $name = $this->input->post("bookname");
    $date = $this->input->post("publishingdate");
    $pages = $this->input->post("numberofpages");
		$type = $this->input->post("type");
		$genres = $this->input->post("genre");


    $sql = "update books
    set bookname='$name',
    publishingdate='$date',
		ISBN=$ISBN,
    numberofpages=$pages
    where bookid=$id";
    $query = $this->db->query($sql);

		$sql = "delete from books_has_authors where books_bookid = $id";
    $query = $this->db->query($sql);

    $authors = $this->input->post("author");
    if(!isset($authors))
    {
      return 1;
    }
    foreach($authors as $author)
    {
      $data = array(
              'books_bookid' => $id,
              'authors_authorid' => $author,
      );
      $this->db->insert('books_has_authors', $data);
    }

		$sql = "delete from books_has_types where books_bookid = $id";
    $query = $this->db->query($sql);

    $types= $this->input->post("type");
    if(!isset($types))
    {
      return 1;
    }
    foreach($types as $types)
    {
      $data = array(
              'books_bookid' => $id,
              'types_typeid' => $types,
      );
      $this->db->insert('books_has_types', $data);
    }

		$sql = "delete from books_has_genre where books_bookid = $id";
		$query = $this->db->query($sql);

		$genre = $this->input->post("genre");
		if(!isset($genre))
		{
			return 1;
		}
		foreach($genre as $genre)
		{
			$data = array(
							'books_bookid' => $id,
							'genre_genreid' => $genre,
			);
			$this->db->insert('books_has_genre', $data);
		}
    return 1;
  }





}
