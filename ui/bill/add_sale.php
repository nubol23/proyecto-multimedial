<html>
    <head>
        <title>Adicionar medicina</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>
        <input method="GET" action="_add_sale.php">
            Medicina: <select name="medicine">
                <?php
                    include('../../src/functions/medicine_functions.php');
                    $arr = get_all_medicines_and_manufacturers();
                    $medicines = $arr['medicine_names'];
                    foreach ($medicines as $i => $value) {
                        echo "<option value='$value'>" . $value . "</option>";
                    }
                ?>
            </select> <br />
            Cantidad: <input name="quantity" type="number"  />
        </form>
    </body>
</html>