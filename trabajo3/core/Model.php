<?php
   
    namespace Core;

    // Incluir el archivo de configuración de la base de datos
    require "config/db.php";

    // Importar constantes y clases necesarias para la conexión a la base de datos
    use const DSN;
    use const USUARIO;
    use const PASSWORD;
    use PDO;
    use PDOException;

    #[\AllowDynamicProperties]
    class Model {
        // Método estático para obtener una instancia de la conexión a la base de datos
        static function db(){
            try {
                // Crear una nueva instancia de PDO para la conexión a la base de datos
                $dbh = new PDO(DSN, USUARIO, PASSWORD);
                // Establecer el modo de manejo de errores
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $dbh;
            }
            catch(PDOException $ex){
                // En caso de error, imprimir un mensaje de fallo en la conexión
                echo "Fallo en la conexión: " . $ex->getMessage();
            }
        }
    }
?>
