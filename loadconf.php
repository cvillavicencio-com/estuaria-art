<?php
// carga configuración de sitio

$s="SELECT * FROM opciones;";
$q=$conn->query($s);
$l = $q->fetch_row();
// 0 - titulo
// 1 - coleccion por defecto
//

$titulo       = $l[0];
$coleccionDef = $l[1];


?>
