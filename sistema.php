<?php

  // Importamos base de datos
  require("db.php");

  // Función: Devuelve una respuesta en la API.
  function respuesta($estado, $contenido = '', $codigo = 'API-200'){
    $respuesta['estado'] = $estado;
    $respuesta['detalle'] = $contenido;
    $respuesta['codigo'] = $codigo;
    print_r(json_encode($respuesta, JSON_UNESCAPED_UNICODE));
    die();
  }

  // Función: Valida el token de un dispositivo
  function validarToken($token){
    GLOBAL $conexion;
    $sql = "SELECT id FROM `dispositivos` WHERE token = '$token' AND estado = '1'";
    $resultado = mysqli_query($conexion, $sql);;
    if($resultado){
      if(mysqli_num_rows($resultado) == 1){
        return  mysqli_fetch_array($resultado)["id"];
      }else{
        respuesta("error", "El token ingresado es invalido o no esta habilitado.", "API-003");
      }
    }else{
      respuesta("error", "Hubo un error a la hora de validar el token.", "API-005");
    }
  }

  // Establecemos variables generales
  $fecha = date('Y-m-d H:i:s');
  $ip = obtenerIP();

  // Función: Obtener IP
  function obtenerIP() {
    $ip = '';
    if (getenv('HTTP_CLIENT_IP'))
      $ip = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
      $ip = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
      $ip = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
      $ip = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
      $ip = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
      $ip = getenv('REMOTE_ADDR');
    else
      $ip = '0';
    return $ip;
  }

?>