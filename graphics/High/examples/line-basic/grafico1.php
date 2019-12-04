<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Reporte</title>

		<style type="text/css">
#container {
	min-width: 310px;
	max-width: 800px;
	height: 400px;
	margin: 0 auto
}
		</style>
	</head>
	<body>
<script src="../../code/highcharts.js"></script>
<script src="../../code/modules/series-label.js"></script>
<script src="../../code/modules/exporting.js"></script>
<script src="../../code/modules/export-data.js"></script>

<div id="container"></div>

<?php
	require_once("../../../conexion.php");
	$conect = new mysqli($serv,$user,$pw,$bd);
	//$conect = new mysqli('localhost','root','','mispruebas');
	if (!$conect) 
	{      die("Conección fallida " . mysqli_connect_error());}
	//else echo "Conección con la Base de datos";
	$query="SELECT * FROM notas";
	$rep = mysqli_query($conect,$query);
	$row=mysqli_fetch_array($rep);
		for($i=0;$i<14;$i++)
		{ 
			//$row[$vec[$i]]
			 } 
	?>

		<script type="text/javascript">
Highcharts.chart('container', {

    title: {
        text: 'Formulación y preparación de proyectos, 2019'
    },

    subtitle: {
        text: 'Maestría Gestión de Proyectos y Presupuestos'
    },

    yAxis: {
        title: {
            text: 'Notas'
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
            pointStart: 2010
        }
    },

    series: [{
        name: 'Manufacturing',
        data: [100, 64, 97, 98, 90, 82, 81, 94]
    }, {
        name: 'Sales & Distribution',
        data: [
			<?php 
			      $a="123456";
			      $query2="SELECT * FROM notas WHERE Ci=$a";
	              $rep1 = mysqli_query($conect, $query2);
	             
			      
	              $row=mysqli_fetch_array($rep1);
		          for($i=0;$i<14;$i++)
		          { 
			           echo $row[$vec[$i]];
			      } 
			?>
		]
    }
			],

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
	</body>
</html>
