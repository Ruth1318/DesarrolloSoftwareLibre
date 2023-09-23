<?php
include "../conf/con.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
    $existencia = isset($_POST['existencia']) ? $_POST['existencia'] : "";
    $fecharegistro = isset($_POST['fecharegistro']) ? $_POST['fecharegistro'] : "";
    $precio = isset($_POST['precio']) ? $_POST['precio'] : "";
    $directorio_destino = "../imgServer/";

    
    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
        
        $nombre_imagen = uniqid() . '_' . $_FILES["imagen"]["name"];
        $ruta_imagen = $directorio_destino . $nombre_imagen;

        
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen)) {
            $insertar = "INSERT INTO medicamentos (nombre, existencia, fecharegistro, imagen, precio) VALUES (:nombre, :existencia, :fecharegistro, :imagen, :precio)";
            $preparar = $pdo->prepare($insertar);
            $preparar->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $preparar->bindParam(':existencia', $existencia, PDO::PARAM_INT);
            $preparar->bindParam(':fecharegistro', $fecharegistro, PDO::PARAM_STR);
            $preparar->bindParam(':imagen', $nombre_imagen, PDO::PARAM_STR);
            $preparar->bindParam(':precio', $precio, PDO::PARAM_STR);

            if ($preparar->execute()) {
                header('Location: index.php');
                exit();
            } else {
                echo "Error al insertar: " . $preparar->errorInfo()[2];
            }
        } else {
            echo "Error al mover la imagen al servidor.";
        }
    } else {
        echo "No se ha seleccionado ninguna imagen o ha ocurrido un error en la carga.";
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Add</title>
</head>
<body>
<div class="container mt-5">
        <h2>Agregar Medicamento</h2>
        <form  method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre Medicamento:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="existencia">Existencia:</label>
                <input type="number" class="form-control" id="existencia" name="existencia" required>
            </div>
            <div class="form-group">
                <label for="fecharegistro">Fecha de Registro:</label>
                <input type="date" class="form-control" id="fecharegistro" name="fecharegistro" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Medicamento</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>