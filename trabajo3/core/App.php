<?php
    // Esta clase se encarga del enrutamiento y control principal de la aplicación

    namespace Core;

    class App {
        function __construct(){
            // Obtener la URL de la solicitud, si no está presente, se establece la URL predeterminada "cervezas"
            isset($_GET["url"]) ? $url = $_GET["url"] : $url = "cervezas";
            
            // Separar el URL en un array
            $arguments = explode('/', trim($url,'/'));

            // Obtener el nombre del controlador a partir del primer elememto de la URL
            $controllerName = array_shift($arguments);                                         
            $controllerName = ucwords($controllerName) . "Controller";

            // Si hay más segmentos en la URL, obtener el nombre del método; de lo contrario, utilizar "index" como método predeterminado
            count($arguments) ? $method = array_shift($arguments) : $method = "index";
            
            // Construir la ruta del archivo del controlador
            $file = "controller/$controllerName" . ".php";
            
            // Verificar si el archivo del controlador existe
            if(file_exists($file)){
                require "$file"; 
            }
            else{
                // Si el archivo no existe, mostrar un mensaje de error
                http_response_code(404);
                echo "Oops! Página no encontrada.";
                die();
            }
            
            // Construir el nombre completo del controlador
            $controllerName = "Controller\\" . $controllerName;
            
            // Instanciar el objeto del controlador
            $controllerObject = new $controllerName;

            // Verificar si el método existe en el controlador y llamarlo con los argumentos
            if(method_exists($controllerObject, $method)){
                $controllerObject -> $method($arguments);
            }
            else{
                // Si el método no existe, mostrar un mensaje de error
                http_response_code(404);
                echo "Oops! Página no encontrada.";
                die();
            }
        }
    }
?>
