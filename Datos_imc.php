<?php
    $Peso=$_POST['txt_Peso'];
    $Altura=$_POST['txt_Altura'];
    $Calcular=$_POST['txt_Calcular'];
    $clavep_persona1=1;
    $cn=new mysqli("localhost","root","","base_imccarmen");
    //Qué devuelve $cn->connect_errno, si la conexión es exitosa.
    //Devuelve 0
    if( $cn->connect_errno==0 ) {
        echo("Conexión exitosa");
        //Sintaxis guia
        //insert into plan_salud values(0,'dieta equilibrada','realiza ejercicio,no fumar');
        $insertar=$cn->query("insert into imc values(0,'".$Peso."','".$Altura."','".$Calcular."','".$clavep_persona1."')");
        //Si la consulta se ejecuto correctamente $insertar vale 1
        if($insertar==1){
            header("Location: Terminar.html"); 
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