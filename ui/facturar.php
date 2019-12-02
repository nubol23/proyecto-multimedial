<php?
<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="nav-bar">
    <?php include_once ("navbar.php");?>
</div>
</head>
<body padding="10">
<table cellspacing="0" cellpadding="2" border="0" width="70%" style="margin-left:auto;margin-right:auto;">
  <tr>
    <td width="5%">
        <p>Cliente: </p>
    </td>
    <td width="55%">
        <input placeholder="Cliente"/>
    </td>
    <td width="5%">
        NIT/CI
    </td>
    <td width="15%">
        <input placeholder="Cliente"/>
    </td>
    <td width="15%">
        <button>Buscar</button>
    </td>
  </tr>
  <tr>
    <td width="5%">
        <p>Medicamentos </p>
    </td>
    <td width="55%">
    </td>
    <td width="5%">
    </td>
    <td width="15%">
        <button>Eliminar selección</button>
    </td>
    <td width="15%">
        <button>Agregar Medicamento</button>
    </td>
  </tr>
</table>

<table cellspacing="0" cellpadding="0" border="0" width="70%" style="margin-left:auto;margin-right:auto;">
  <tr>
    <td>
       <table cellspacing="0" cellpadding="2" border="1" width="100%" >
         <tr style="color:white;background-color:grey;">
            <th width="5%"><strong>Nro.</strong></th>
            <th width="45%"><strong>Medicamento</strong></th>
            <th width="25%"><strong>Cantidad</strong></th>
            <th width="25%"><strong>Precio</strong></th>
         </tr>
       </table>
    </td>
  </tr>
  <tr>
    <td>
       <div style="width:100%; height:80px; overflow:auto;">
         <table cellspacing="0" cellpadding="1" border="1" width="100%">
           <tr>
             <td width="5%">1</td>
             <td width="45%">new item</td>
             <td width="25%">new item</td>
             <td width="25%">new item</td>
           </tr>
           <tr>
             <td>2</td>
             <td>new item</td>
             <td>new item</td>
             <td>new item</td>
           </tr>
           <tr>
             <td>3</td>
             <td>new item</td>
             <td>new item</td>
             <td>new item</td>
           </tr>
         </table>  
       </div>
    </td>
  </tr>
</table>
</body>
</html>
