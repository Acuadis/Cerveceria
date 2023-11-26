<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Cerveza</title>
</head>
<body>
    <h2>Agregar una cerveza</h2>
    <form name="flogin" action="index.php?url=cervezas/store" method="post" enctype="multipart/form-data"> 
        <div>
            <!-- Campo para introducir el nombre de la cerveza. Lo ponemos required para que asi de forma obligatoria se tenga que poner. -->
            <label for="nombre">Introducir Nombre</label>
            <input type="text" name="nombre" id="nombre" required>
            <br><br>
            
            <!-- Campo para seleccionar el tipo de cerveza. Lo hago con un select porque es la manera facil de que solo pueda ser de unos tipos determinados-->
            <label for="tipo">Introduce Tipo</label>
            <select id="tipo" name="tipo">
                <?php
                   //Lo hago con un array para ahorrarme una lineas de codido escribiendo lo mismo 4 veces
                    $tiposDeCerveza = array("tostada", "rubia", "deTrigo", "negra");
                    $tipoCervezaSeleccionada = "rubia"; 
                    
                  
                    foreach ($tiposDeCerveza as $tipo) {
                        echo "<option value=\"$tipo\"";
                        if ($tipo == $tipoCervezaSeleccionada) {
                            echo " selected";
                        }
                        echo ">$tipo</option>";
                    }
                ?>
            </select>
            <br><br>
            
            <!-- Campo para introducir la graduación de la cerveza. Lo ponemos required para que asi de forma obligatoria se tenga que poner.
            Lo hago de tipo number y le pongo limites para que solo pueda ser de 0 a 100 -->
            <label for="graduacion">Introduce Graduacion</label>
            <input type="number" name="graduacion" id="graduacion" min="0" max="100" pattern="\d+" required>
            <br><br>
            
            <!-- Campo para introducir el país de origen de la cerveza. Lo ponemos required para que asi de forma obligatoria se tenga que poner. -->
            <label for="pais">Introduce Pais</label>
            <input type="text" name="pais" id="pais" required>
            <br><br>
            
            <!-- Campo para introducir el precio de la cerveza. Lo ponemos required para que asi de forma obligatoria se tenga que poner.
            Lo hago de tipo number y le pongo limites para que solo pueda ser de superios a 0  -->
            <label for="precio">Introduce Precio</label>
            <input type="number" name="precio" id="precio" min="0" required>
            <br><br>
            
            <!-- Campo para seleccionar y cargar la imagen de la cerveza. Lo ponemos required para que asi de forma obligatoria se tenga que poner.
            -->
            <label for="ruta">Introduce imagen</label>
            <input type="file" name="ruta" id="ruta" accept=".jpg, .png" max-size="10485760" required>
            <br><br>
            
            <!-- Campo para seleccionar y cargar el fichero de descripción de la cerveza. Lo hago tipo fichero y le pongo terminaciones obligatorias para que no puedas pones otras y un maximo de tamaño-->
            <label for="fichero">Introduce fichero</label>
            <input type="file" name="fichero" id="fichero" accept=".pdf, .docx" max-size="5242880">
            <br><br>
            
            <!-- Botón para enviar el formulario -->
            <input type="submit" name="ienviar" value="Enviar">
        </div>
    </form>
</body>
</html>
