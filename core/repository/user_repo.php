<?php
require_once('../storage/connection.php');

class UserRepository {
    public $conexion;
    public $ERRORDEL = "Error al preparar la sentencia";

    public function __construct() {
        $this->conexion = Connection::get();
    }
    
    public function login($email, $password){
        $query = "SELECT * FROM users where email = '$email' and password= '$password'";
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

    public function fetchAll(){
        $query = "SELECT * FROM users";
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

    public function insert($user){
        try {
            $query = "INSERT INTO users VALUES (0,?,?,?,?,?)";
            if (!$stmt = $this->conexion->prepare($query)) {
                throw Exception($this->ERRORDEL. $this->conexion->error, 1);
            }
            $stmt->bind_param("ssssi", $user['name'], $user['last_name'], $user['email'], $user['password'], $user['type']);
            if ($stmt->execute()) {
                $id = $this->conexion->insert_id;
                return $id;
            }
        } catch (Exception $e) {
            echo $e;
            return null;
        }    
    }

    public function update($user){

    }

    public function delete($id){
        $query = "DELETE FROM users WHERE id  = ?";
        if (!$stmt = $this->conexion->prepare($query)) {
            throw Exception($this->ERRORDEL. $this->conexion->error, 1);
        }
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }


}

?>