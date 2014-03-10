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
  $subject = "Mensaje desde grupojaco.com";
  
  $mensaje = "<p>" . $_POST["nombre"] . " envi&oacute; un mensaje desde la p&aacute;gina grupojaco.com</p>";
  $mensaje .= "<p>" . $_POST["nombre"] . " escribi&oacute;<br />\"" . nl2br($_POST["mensaje"]) . "\"<br />";
  $mensaje .= $_POST["empresa"] . "<br />";
  $mensaje .= $_POST["puesto"] . "<br />";
  $mensaje .= $_POST["telefono"] . "<br />";
  $mensaje .= $_POST["correo"] . "</p>";
  $mensaje .= "<p>Favor de darle el seguimiento correspondiente</p>";
  
  mail($to, $subject, $mensaje, $headers);
  
  header("Location: index.html");
}
ob_end_flush();
?>