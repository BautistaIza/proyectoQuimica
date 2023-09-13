<?php 

  // Insertamos sistema
  require("../sistema.php");

  // Establecemos variables
  isset($_GET['token']) ? $token = $_GET['token'] : respuesta('error', "Falta que se aporte el parámetro 'token'", "API-001");
  isset($_GET['valor']) ? $valor = $_GET['valor'] : respuesta('error', "Falta que se aporte el parámetro 'valor'", "API-001");

  // Verificamos si el token es valido
  if($id = validarToken($token)){

    // Preparamos petición
    $sql = "INSERT INTO `mediciones`(`dispositivo`, `valor`, `fecha`, `ip`) VALUES ('$id','$valor','$fecha','$ip')";
    $resultado = mysqli_query($conexion, $sql);;

    // Verificamos estado de la petición
    if($resultado){
      respuesta("exitoso");
    }else{
      respuesta('error', 'Hubo un error interno.', 'API-004');
    }

  };

  

?>