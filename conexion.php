<?php
    $conexion=mysql_connect("localhost","root","") or die ("Sin Servicio LocalHost");
    mysql_select_db("personeros",$conexion) or die ("NO SE PUDO SELECCIONAR LA BASE DE DATOS");
?>