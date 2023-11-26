<?php 
namespace Models;
use PDO;
require "core/Model.php";
use Core\Model;

class Cervezas extends Model{

    public static function all(){
        $dbh =  Cervezas::db();
        $sql = "SELECT * FROM Cervezas";
        $statement = $dbh->query($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, Cervezas::class);
        $cervezas = $statement->fetchAll(PDO::FETCH_CLASS);
        return $cervezas;
    }

    public static function find($id){
        $dbh = self::db();
        $sql = "SELECT * FROM Cervezas WHERE id = :id";
        $statement = $dbh->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, Cervezas::class);
        $cerveza = $statement->fetch(PDO::FETCH_CLASS);
        return $cerveza;
    }

    public function insert(){
        $dbh = self::db();
        $sql = "INSERT INTO Cervezas (Nombre, Tipo, Graduacion, Pais, Precio, Ruta) 
        VALUES (:nombre, :tipo, :graduacion, :pais, :precio, :ruta)";
        $statement = $dbh->prepare($sql);
        $statement->bindValue(":nombre",$this->Nombre);
        $statement->bindValue(":tipo",$this->Tipo);
        $statement->bindValue(":graduacion",$this->Graduacion);
        $statement->bindValue(":pais",$this->Pais);
        $statement->bindValue(":precio",$this->Precio);
        $statement->bindValue(":ruta",$this->Ruta);
        return $statement->execute();
    }
    
    public function save(){
        $dbh = self::db();
        $sql = "UPDATE Cervezas SET Nombre = :nombre, Tipo = :tipo, Graduacion = :graduacion,
         Pais = :pais, Precio = :precio, Ruta = :ruta WHERE ID = :id";
        var_dump($sql);
        $statement= $dbh->prepare($sql);
        $statement->bindValue(":nombre",$this->Nombre);
        $statement->bindValue(":tipo",$this->Tipo);
        $statement->bindValue(":graduacion",$this->Graduacion);
        $statement->bindValue(":pais",$this->Pais);
        $statement->bindValue(":precio",$this->Precio);
        $statement->bindValue(":ruta",$this->Ruta);
        $statement->bindValue(":id",$this->ID);
        return $statement->execute(); 
    }
    public static function delete($id){
        $db = Cervezas::db();
        $stmt = $db->prepare('DELETE FROM Cervezas WHERE id = :id');
        $stmt->bindValue(':id',$id);
        return $stmt->execute();
    }


}
    
?>