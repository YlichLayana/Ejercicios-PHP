
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>CRUD DE USUARIOS</title>
<link href="web/default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container" style="width: 600px;">
<div id="header">
<h1>GESTIÓN DE PRODUCTOS PDO versión 1.1 + BD</h1>
</div>
<div id="content">
<hr>
<form   method="POST">
<table>
<tr><td>Nº Producto </td> 
 <td>
 <input type="text" 	name="PRODUCTO_NO" 	value="<?=$produc->PRODUCTO_NO ?>"       <?= ($orden == "Detalles" || $orden == "Modificar" )?"readonly":"" ?> size="20" autofocus></td></tr>
 <tr><td>DESCRIPCION   </td> <td>
 <input type="text" 	name="DESCRIPCION" 	value="<?=$produc->DESCRIPCION  ?>"        <?= ($orden == "Detalles" )?"readonly":"" ?> size="8"></td></tr>
 <tr><td>PRECIO </td> <td>
 <input type="text" name="PRECIO_ACTUAL" 	value="<?=$produc->PRECIO_ACTUAL ?>"        <?= ($orden == "Detalles")?"readonly":"" ?> size=10></td></tr>
 <tr><td>STOCK </td><td>
 <input type="text" 	name="STOCK_DISPONIBLE" value="<?=$produc->STOCK_DISPONIBLE ?>" <?= ($orden == "Detalles")?"readonly":"" ?> size=20></td></tr>
 </table>
 <input type="submit"	 name="orden" 	value="<?=$orden?>">
 <input type="submit"	 name="orden" 	value="Volver">
</form> 
</div>
</div>
</body>
</html>
<?php exit(); ?>

