<?php
    $ape_pe=$_POST['txt_ApellidoP'];
    $ape_ma=$_POST['txt_ApellidoM'];
    $nombre=$_POST['txt_Nombre'];
    $edad=$_POST['txt_Edad'];
    $fecha_nac=$_POST['txt_Fecha_nac'];
    $sexo=$_POST['txt_Sexo'];
    $clavep_test1=1;	
    $cn=new mysqli("localhost","root","","base_imccarmen");
    //Qué devuelve $cn->connect_errno, si la conexión es exitosa.
    //Devuelve 0
    if( $cn->connect_errno==0 ) {
        echo("Conexión exitosa");
        //Sintaxis guia
        //insert into plan_salud values(0,'dieta equilibrada','realiza ejercicio,no fumar');
        $insertar=$cn->query("insert into persona values(0,'".$ape_pe."','".$ape_ma."','".$nombre."','".$edad."','".$fecha_nac."','".$sexo."','".$clavep_test1."')");
        //Si la consulta se ejecuto correctamente $insertar vale 1
        if($insertar==1){
         header("Location: Datos_imc.html"); 
         exit(); 
        }
        else{
           echo("No se guardo el registro".$cn->error."insertar=".$insertar); //$insertar no devulve ningun valor cuando falla la consulta
        }
        $cn->close();
    }
    else //2054 es el valor que devuelve $cn->connect_errno
         //Si la conexión falla
      echo("Fallo la Conexión".$cn->connect_errno);
      //Error(500) interno del servidor, checar sintaxis en php
?>