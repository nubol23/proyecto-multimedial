<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="main.php">Farmacia Multimedial</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto navbar-right">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addManufacturer.php">Agregar fabricante</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addMedicine.php">Agregar medicamento</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="refill.php">Reabastecer</a> 
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../reports/inventario.php">Inventario</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../reports/proveedor.php">Proveedores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Crear usuario</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="logout.php">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Salir</button>
    </form>
  </div>
</nav>
