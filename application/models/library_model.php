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
    $sql = "SELECT * FROM ((((books
               INNER JOIN books_has_genre ON books.ISBN = books_has_genre.books_ISBN)
               INNER JOIN genre on books_has_genre.genre_genreid = genre.genreid)
               INNER JOIN books_has_authors ON books.ISBN = books_has_authors.books_ISBN)
               INNER JOIN authors ON books_has_authors.authors_authorid = authors.authorid)
               INNER JOIN edition ON books.ISBN = edition.books_ISBN ";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }

function searchbooks($bookname) {
	$sql = "SELECT books.ISBN, books.bookname, books.numberofpages, books.publishingdate, books.type, genre.genrename, authors.authorname, edition.editionnum FROM ((((books
						 INNER JOIN books_has_genre ON books.ISBN = books_has_genre.books_ISBN)
						 INNER JOIN genre on books_has_genre.genre_genreid = genre.genreid)
						 INNER JOIN books_has_authors ON books.ISBN = books_has_authors.books_ISBN)
						 INNER JOIN authors ON books_has_authors.authors_authorid = authors.authorid)
						 INNER JOIN edition ON books.ISBN = edition.books_ISBN ";
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
            'type' => $this->input->post("type"),
            'ISBN' => $this->input->post("ISBN"),

    );

    $this->db->insert('books', $data);
    $lastISBN =$this->db->insert_id();

		$id = $this->input->post("editionid");
		$editionnum = $this->input->post("editionnum");
		$printdate = $this->input->post("printdate");
		$isbn = $lastISBN;

		$sql = "insert into edition ( editionnum, printdate, books_ISBN) VALUES ('$editionnum', '$printdate', $isbn)";
			$query = $this->db->query($sql);


  $authors = $this->input->post("authors");
	//print_r($authors);
foreach($authors as $author)
{
  $data = array(
          'books_ISBN' => $lastISBN,
          'authors_authorid' => $author,
  );
  $this->db->insert('books_has_authors',$data);
}
$genres = $this->input->post("genre");
foreach($genres as $genre)
{
$data = array(
        'books_ISBN' => $lastISBN,
        'genre_genreid' => $genre,
);
$this->db->insert('books_has_genre', $data);
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
		function getgenre() {
      $sql = "select * from genre";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }
		function delete($id){
		$sql="delete from books where ISBN = $id";
		$query=$this->db->query($sql);
		return 1;
	}
	function deletebook($id) {
  $sql = "delete from books where ISBN = $id";
$query = $this->db->query($sql);
  return 1;
  }

}
