<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Detalle Cerveza</h1>
        <table>
            <ul>
                <li><strong>Nombre: </strong><?php echo $cerveza->Nombre ?><br></li>
                <li><strong>Tipo: </strong><?php echo $cerveza->Tipo ?><br></li>
                <li><strong>Graduacion: </strong><?php echo $cerveza->Graduacion ?><br></li>
                <li><strong>Pais: </strong><?php echo $cerveza->Pais ?><br></li>
                <li><strong>Precio: </strong><?php echo $cerveza->Precio ?><br></li>
                <li><img src="<?php echo $cerveza->Ruta ?>" /></li>
            </ul>
            <tr>
                <td><a href="?method=index">Volver al index</a></td>
            </tr>
        </table>
    </body>
</html>