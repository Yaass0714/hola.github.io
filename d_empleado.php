<?php
$clave=$_POST['clave_php'];
$nombre=$_POST['nombre_php'];
$cn= new mysqli('localhost', 'root', '', 'empleado1');

if($cn->connect_errno==0) {
    echo("Conexión exitosa!"); 
    $insertar=$cn->query("insert into empleados values('".$clave."','".$nombre."')");

    if($insertar==1) {
        echo("El registro se guardó correctamente.".$cn->connect_errno."Insertar=".$insertar);
    } else {
        echo("No se guardó el registro.".$cn->errno."Insertar=".$insertar); 
    }

    $cn->close();
} else { 
    echo("Falló la conexión.".$cn->connect_errno);
}
?>