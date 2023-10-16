<?php
include 'conexion.php';
$anoSeleccionado = 2013;
$select = [];
$totales = "";



$totales = isset($_POST['totales']) ? $_POST['totales'] : "";
$select = isset($_POST['checkboxes']) ? $_POST['checkboxes'] : [];

$consultaGrafico = "SELECT YEAR(fecha) AS year, SUM(venta) AS total 
FROM detalle_fac INNER JOIN encabezado_fac ON detalle_fac.codigo = encabezado_fac.codigo";

if (!empty($select)) {
    $yearConditions = implode(',', $select);
    $consultaGrafico .= " WHERE YEAR(encabezado_fac.fecha) IN ($yearConditions)";
    $anoSeleccionado = $select[0];
    $anofin=end($select);
    
}

if ($totales !== "") {
    $consultaGrafico .= " GROUP BY YEAR(fecha) HAVING SUM(venta) >= $totales";
} else {
    $consultaGrafico .= " GROUP BY YEAR(fecha)";
}

$ejecutarGrafico = mysqli_query($conexion, $consultaGrafico);

$datosGrafico = [];
while ($dato = mysqli_fetch_array($ejecutarGrafico)) {
    $ano = $dato['year'];
    $total = floatval(number_format($dato['total'], 2, '.', ''));
    $datosGrafico[] = array((int)$ano,$total);
}




?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="post" style="text-align: center;">

        <label for="totales">Totales anuales mayores o iguales que</label>
        <input type="text" name="totales" id="totales" value="<?php echo $totales; ?>">
        <?php
        $anio = "SELECT YEAR(fecha) FROM `encabezado_fac` GROUP BY YEAR(fecha)";
        $ejecucion = mysqli_query($conexion, $anio);

        while ($seleccionarAnios = mysqli_fetch_array($ejecucion)) {
            $checkboxName = 'checkboxes[]';
            $checkboxValue = $seleccionarAnios[0];
            $isChecked = in_array($checkboxValue, $select);
            echo "<input type='checkbox' name='$checkboxName' value='$checkboxValue' id='$checkboxValue'";
            if ($isChecked) {
                echo " checked";
            }
            echo ">";
            echo "<label for='$checkboxValue'>" . $seleccionarAnios[0] . "</label>";
        }
        ?>
        <input type="submit" value="Filtrar">
    </form>
    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>
</body>

</html>

<script>
    Highcharts.chart('container', {
        title: {
            text: 'U.S Solar Employment Growth',
            align: 'left'
        },
        subtitle: {
            text: 'By Job Category. Source: <a href="https://irecusa.org/programs/solar-jobs-census/" target="_blank">IREC</a>.',
            align: 'left'
        },
        yAxis: {
            title: {
                text: 'Number of Employees'
            }
        },
        xAxis: {
            accessibility: {
                 rangeDescription: 'Range: <?php echo $anoSeleccionado; ?> to 2023'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: <?php echo $anoSeleccionado; ?>
            }
        },
        series: [{
            name: 'Installation & Developers',
            data: <?php echo json_encode($datosGrafico); ?>
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>