<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors','1'); 

if($_POST["button"]<>"")
{
  //mail headers
  $headers = "From: Grupo Jaco <sistemas@grupojaco.com>\r\n";
  $headers .= "Reply-To: Grupo Jaco <sistemas@grupojaco.com>\r\n";
  $headers .= "Return-path: sistemas@grupojaco.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=\"utf-8\"\r\n";
  $headers .= "Content-Transfer-Encoding: 8bit\r\n";
  $headers .= "X-Sender: sistemas@grupojaco.com\r\n";
  $headers .= "X-Priority: 3\r\n";
  $headers .= "X-MSMail-Priority: Normal\r\n";
  $headers .= "X-Mailer: PHP " . phpversion();
  
  $to = "sistemas@grupojaco.com";
  $subject = "1er Convivio Interagencias de Ejecutivos";
  
  $mensaje = "<p>" . $_POST["nombre"] . " envi&oacute; un mensaje desde la p&aacute;gina grupojaco.com</p>";
  $mensaje .= $_POST["empresa"] . "<br />";
  $mensaje .= $_POST["puesto"] . "<br />";
  $mensaje .= $_POST["telefono"] . "<br />";
  $mensaje .= $_POST["correo"] . "</p>";
  
  mail($to, $subject, $mensaje, $headers);
  
  $to = $_POST["correo"];
  $subject = "1er Convivio Interagencias de Ejecutivos";
  
  $mensaje = "<p>Que tal " . $_POST["nombre"] . ",</p>";
  $mensaje .= "<p>Muchas gracias por confirmar tu registro, te esperamos el 1 de Marzo a partir de las 2pm.</p>";
  $mensaje .= "<p>Atentamente, <br />";
  $mensaje .= "El staff de Grupo Jaco</p>";
  $mensaje .= "<img src='http://grupojaco.com/img/logo.jpg' />";
  
  mail($to, $subject, $mensaje, $headers);
  
  
  
  header("Location: index.html");
}
ob_end_flush();
?>