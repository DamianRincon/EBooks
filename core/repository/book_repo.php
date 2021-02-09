<?php
require_once('../storage/connection.php');

class BookRepository {
    public $conexion;
    public $ERRORDEL = "Error al preparar la sentencia";

    public function __construct() {
        $this->conexion = Connection::get();
    }
    
    public function fetchAll() {
        $query = "SELECT book.*, category.name as category, category.id as id_category 
            from book, book_category, category 
            WHERE book.id = book_category.id_book 
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
        $query = "SELECT book.*, category.name as category, category.id as id_category 
        from book, book_category, category 
        WHERE book.id = book_category.id_book 
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

    public function insert($book, $imagePath){
        try {
            $query = "INSERT INTO book VALUES (0,?,?,?,?,?,?,?)";
            if (!$stmt = $this->conexion->prepare($query)) {
                throw Exception($this->ERRORDEL. $this->conexion->error, 1);
            }
            $stmt->bind_param("sssssss", $book["name"], $book["author"], $book["isbn"], $book["description"], $book["publisher"], $book["language"], $imagePath);
            $stmt->execute();
            $id = $this->conexion->insert_id;
            sleep(2);
            $result = $this->bookCategoryAdd($id, $book["category"]);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function bookCategoryAdd($book, $category){
        try {
            $query = "INSERT INTO book_category VALUES (?,?)";
            if (!$stmt = $this->conexion->prepare($query)) {
                throw Exception($this->ERRORDEL. $this->conexion->error, 1);
            }
            $stmt->bind_param("ii", $book, $category);
            return ($stmt->execute());
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update($book){
        
    }

    public function delete($id){
        $query = "DELETE FROM book WHERE id  = ?";
        if (!$stmt = $this->conexion->prepare($query)) {
            throw Exception($this->ERRORDEL. $this->conexion->error, 1);
        }
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

?>