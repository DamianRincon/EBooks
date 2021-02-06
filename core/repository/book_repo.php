<?php
require_once('../storage/connection.php');

class BookRepository {
    public $conexion;
    public $ERRORDEL = "Error al preparar la sentencia";

    public function __construct() {
        $this->conexion = Connection::get();
    }
    
    public function fetchAll() {
        $query = "SELECT book.*, CONCAT(autor.name, ' ', autor.last_name) as autor, category.name as category, category.id as id_category 
        from book, book_autor, book_category, autor, category 
        WHERE book.id = book_category.id_book 
        and book.id = book_autor.id_autor 
        and book_autor.id_autor = autor.id 
        and book_category.id_category = category.id";
        if (!$stmt = $this->conexion->prepare($query)) {
            throw Exception($this->ERRORDEL. $this->conexion->error);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $results = array();
        while ($myrow = $result->fetch_assoc()) {
            $results[] = $myrow;
        }
        return $results;
    }

    public function fetch($id) {
        $query = "SELECT book.*, CONCAT(autor.name, ' ', autor.last_name) as autor, category.name as category, category.id as id_category 
        from book, book_autor, book_category, autor, category 
        WHERE book.id = book_category.id_book 
        and book.id = book_autor.id_autor 
        and book_autor.id_autor = autor.id 
        and book_category.id_category = category.id
        and book.id=".$id;
        if (!$stmt = $this->conexion->prepare($query)) {
            throw Exception($this->ERRORDEL. $this->conexion->error);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $results = array();
        while ($myrow = $result->fetch_assoc()) {
            $results[] = $myrow;
        }
        return $results;
    }

    public function insert($book){
        
    }

    public function update($book){
        
    }

    public function delete($id){
        
    }
}

?>