<?php
include '../conf/con.php';
$mostrar = "SELECT * FROM medicamentos";
$preparar = $pdo->prepare($mostrar);


if ($preparar->execute()) {
} else {
    echo "Error en la consulta";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilo/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    img {
        width: 50px;
        height: 50px;
    }

    img:hover {
        transform: scale(2.2);
    }
</style>

<body>
    <div class="menu">
        <ul>
            <li><a href="agregar.php">Agregar</a></li>
            <li><a href="mostrar.php">Ver Contenido</a></li>
        </ul>
    </div>
    <div class="container">
        <div style="margin-top: 5%;" class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Nombre</th>
                        <th>Existencias</th>
                        <th>Fecha Registro</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $preparar->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['code'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['existencia'] . "</td>";
                        echo "<td>" . $row['fecharegistro'] . "</td>";
                        echo "<td><img src='../imgServer/" . $row['imagen'] . "' alt='Imagen' width='100'></td>";
                        echo "<td>" . $row['precio'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>

            </table>
        </div>

    </div>

</body>

</html>