<!DOCTYPE html>
<html>
<head>
  
  <!-- UTF-8 -->
  <meta charset="UTF-8" />
  
  <!-- Titulo -->
  <title>Proyecto quimica</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>

<style>

body{
  background-color: #dcdcdc;
}

</style>

  <!-- Contenedor -->
  <div class="container mt-3">

    <!-- Titulo -->
    <h3>Dispositivos:</h3>

    <!-- Listado de dispositivos -->
    <div style="border: 2px solid red">
      <span>
        <b>Id:</b> <i>1</i><br>
        <b>Ultima medicón:</b> <i>1024 db <small>[13/09/23 19:19hs]</small></i><br>
        <b>Estado:</b> <i>Activo</i><br>
        <button>Inhabilitar</button>
      </span>
    </div>

  </div>
  <!-- Fin de Contenedor -->
    
  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<script>

  // Ejecutamos petición
  $.ajax({
    type: "GET",
    url: Url + "Api/articulos",
    data: {
      "tipo": "obtener",
      "id": articulo
    },
    success: function(Resultado, textStatus, xhr){

      // Verificamos si es un json valido
      if(verificarJson(Resultado)){

        // Establecemos datos
        Datos = $.parseJSON(Resultado);

        // Verificamos estado de la petición
        if(Datos['estado'] == 'exitoso'){

        }else if(Datos['estado'] == 'error'){
          alert(Datos['detalle'], Datos['codigo']);
        }else{
          errorLoader();
        }

      }

    },
    error: function(){
      errorLoader();
    }
  })

</script>

</body>
</html>