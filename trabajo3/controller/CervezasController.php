<?php
    namespace Controller;
    require "models/Cervezas.php";
    use Models\Cervezas;

    class CervezasController{

        function __construct(){
            require "vistas/index.php";
        }

        function index(){
            $cervezas = Cervezas::all();
            require "vistas/galeria.php";
        }
        function show($args){
           $id = (int)$args[0];
           $cerveza = Cervezas::find($id);
           require "vistas/show.php";
        }

        public function create(){
            require 'vistas/agregar.php';
        }
        
        public function store(){
            $cerveza = new Cervezas();
            $cerveza->Nombre = $_REQUEST['nombre'];
            $nombre = $_REQUEST['nombre'];
            $cerveza->Tipo = $_REQUEST['tipo'];
            $cerveza->Graduacion = $_REQUEST['graduacion'];
            $cerveza->Pais = $_REQUEST['pais'];
            $cerveza->Precio = $_REQUEST['precio'];

                $carpetaDir = "fotos/";
                $carpetaDirFile = $carpetaDir. basename($_FILES["ruta"]["name"]);
                if(move_uploaded_file($_FILES["ruta"]["tmp_name"], $carpetaDirFile)){
                    $cerveza->Ruta = $carpetaDirFile;
                }

                $carpetaDirF = "beer_desc/";
                $nombreArchivoOriginal = basename($_FILES["fichero"]["name"]);

                $nuevoNombre = $nombre.".pdf";
                $carpetaDirFileF = $carpetaDirF. $nuevoNombre;
                if(move_uploaded_file($_FILES["fichero"]["tmp_name"], $carpetaDirFileF)){
                    $cerveza->Fichero = $carpetaDirFileF;
                }
            $cerveza->insert();
            header('Location:index.php?url=cervezas');
        }

        function edit($args){
            $id = (int)$args[0];
            $cerveza = Cervezas::find($id);
            require "vistas/edit.php";
        }

        public function update(){
            $cerveza = new Cervezas();
            $cerveza->ID = $_REQUEST['id'];
            $cerveza->Nombre = $_REQUEST['nombre'];
            $nombre = $_REQUEST['nombre'];
            $cerveza->Tipo = $_REQUEST['tipo'];
            $cerveza->Graduacion = $_REQUEST['graduacion'];
            $cerveza->Pais = $_REQUEST['pais'];
            $cerveza->Precio = $_REQUEST['precio'];
            $cerveza->Ruta = $_REQUEST['ruta'];
           
            /*$carpetaDir = "fotos/";
            $carpetaDirFile = $carpetaDir. basename($_FILES["ruta"]["name"]);
            if(move_uploaded_file($_FILES["ruta"]["tmp_name"], $carpetaDirFile)){
                unlink($cerveza->Ruta);
                $cerveza->Ruta = $carpetaDirFile;
            }
            else{
                echo"Esto no funciona";
                die();
            }*/
            
            
            $carpetaDirF = "beer_desc/";
            $nombreArchivoOriginal = basename($_FILES["fichero"]["name"]);

            $nuevoNombre = $nombre.".pdf";
            $carpetaDirFileF = $carpetaDirF. $nuevoNombre;
            if(move_uploaded_file($_FILES["fichero"]["tmp_name"], $carpetaDirFileF)){
                $cerveza->Fichero = $carpetaDirFileF;
            }
            else{
                echo "No funciona";
                die();
            }
            $Fichero = $_REQUEST['fichero'];
            header('Location:index.php?url=cervezas');
        }

        public function delete($args){
            $id = (int) $args[0];
            $cerveza = Cervezas::find($id);
            $nombre = $cerveza->Nombre;
            $rutaFicheroFoto = $cerveza->Ruta;
            $rutaFicheroFichero = "beer_desc/". $nombre . ".pdf";
            unlink($rutaFicheroFoto);
            unlink($rutaFicheroFichero);
            $cerveza->delete($id);
            header('Location:index.php?url=cervezas');
        }
    }
?>