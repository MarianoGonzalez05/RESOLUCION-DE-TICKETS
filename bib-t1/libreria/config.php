<?php
//define ('DB_HOST','localhost');
define ('DB_HOST','localhost');
define ('DB_USER','root');
define ('DB_PASS','');
define ('DB_NAME','biblio_t1');


// Nombre de la session (puede dejar este mismo)
$usuarios_sesion="pwd";

class Conexion extends mysqli{

 public $enlace;
 
 function __construct(){
   //$this->enlace=mysql_connect(DB_HOST,DB_USER,DB_PASS);
   //mysql_select_db(DB_NAME,$this->enlace);
   $this->enlace=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    
  
 }
 function __destruct(){
   //mysql_close($this->enlace);
   mysqli_close($this->enlace);
 }
}
class LibraryItem {
  // Propiedades comunes de los items de la biblioteca
  protected $id;
  protected $title;

  public function __construct($id, $title) {
      $this->id = $id;
      $this->title = $title;
  }

  // Métodos comunes
  public function getId() {
      return $this->id;
  }

  public function getTitle() {
      return $this->title;
  }
}

class Book extends LibraryItem {
  private $author;
  private $isbn;
  private $copies;

  public function __construct($id, $title, $author, $isbn, $copies) {
      parent::__construct($id, $title);
      $this->author = $author;
      $this->isbn = $isbn;
      $this->copies = $copies;
  }

  public function getAuthor() {
      return $this->author;
  }

  public function getIsbn() {
      return $this->isbn;
  }

  public function getCopies() {
      return $this->copies;
  }
}
class Loan {
  private $loan_id;
  private $book_id;
  private $member_id;
  private $loan_date;
  private $return_date;
  private $returned;

  public function __construct($loan_id, $book_id, $member_id, $loan_date, $return_date, $returned) {
      $this->loan_id = $loan_id;
      $this->book_id = $book_id;
      $this->member_id = $member_id;
      $this->loan_date = $loan_date;
      $this->return_date = $return_date;
      $this->returned = $returned;
  }

  public function markAsReturned() {
      $this->returned = true;
  }

  // Otros métodos según sea necesario
}
