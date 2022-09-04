<?php
   require_once("../config/conexion.php");
   require_once("../models/Recuperar.php");
   $recuperar = new Recuperar();

  $correo = $_POST['txtcorreo'];

  $queryusuario =mysqli_query($conn, "SELECT * FROM tm_usuario WHERE correo = '$correo'");
  $nr           =mysqli_num_rows($queryusuario);
if ($nr == 1)
{
$mostrar   =mysqli_fetch_array($queryusuario);
$enviarpass   =$mostrar['pass'];

$paracorreo    =$correo;
$titulo        ="Recuperar Password";
$mensaje       ="Tu password es: ".$enviarpass;
$tucorreo      ="From: xxxx@clinicos.com.co";

if(mail($paracorreo,$titulo,$mensaje,$tucorreo))
{
    echo "<script> alert ('Contrseña enviado');window.location= 'index.html' </script>";
}else
{
    echo "<script> alert('Error');window.location= 'index.html'</script>";
}
}


?>