<?php
    include('../../src/functions/medicine_functions.php');
?>

<script src="../High/code/highcharts.js"></script>
<script src="../High/code/modules/exporting.js"></script>
<script src="../High/code/modules/export-data.js"></script>

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>



		<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Inventario Farmacia Multimedial'
    },
    subtitle: {
        text: 'Fuente: Farmacias multimedial'
    },
    xAxis: {
        categories: [
            <?php
                $arr = get_all_medicines_and_manufacturers();
                $medicines = $arr['medicine_names'];

                foreach ($medicines as $i => $value) {
                    echo "'" . $value . "', ";
                }
                echo "''";
            ?>
        ],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Unidades en almacen',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' unidades'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'En almacen',
        data: [
            <?php
                foreach ($medicines as $i => $value) {
                    echo get_remaining_medicine_quantity($value) . ", ";
                }
            ?>
            ,
        ]
    }]
});
		</script>


