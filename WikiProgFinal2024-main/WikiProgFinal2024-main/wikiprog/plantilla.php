<?php
// Podría haber código PHP pero se vería en todas las secciones.
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Bootstrap, from Twitter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Le styles -->
  <link href="css/estilo.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

 <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GQJG3209SE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GQJG3209SE');
</script>
</head>

<body>

  <!-- Barra de navegación -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="controlador.php?seccion=seccion1">WikiProg</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="input-group me-2">
          <input type="text" class="form-control" id="busqueda" placeholder="Buscar..." style="width: 5%;">
        </div>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Explorar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Visual Code</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Foro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="controlador.php?seccion=seccion4">Cursos</a>
          </li>
        </ul>
        <div class="d-flex align-items-center">
          <div class="dropdown me-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
              data-bs-toggle="dropdown" aria-expanded="false">
              <img src="css/img/usuario.png" alt="Usuario" class="img-fluid" style="width: 30px;">
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
              <li><a class="dropdown-item" href="controlador.php?seccion=seccion2"><b>Iniciar Seccion</b></a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#"><b>ESTADO</b> Activo</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="controlador.php?seccion=seccion9">Tu Perfil​</a></li>
              <li><a class="dropdown-item" href="archivos.html">Tu Nube</a></li>
              <li><a class="dropdown-item" href="video.html">Tus Cursos</a></li>
              <li><a class="dropdown-item" href="controlador.php?seccion=seccion5"><b>Registro</b></a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="controlador.php?seccion=seccion10">Configuración</a></li>
              <li><a class="dropdown-item" href="ayuda.html">Ayuda</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="index.html">Cerrar Sesión​</a></li>
            </ul>
          </div>
          <img src="css/img/notificacion.png" alt="Notificaciones" class="img-fluid me-3" style="width: 30px;">
          <img src="css/img/lista.png" alt="Lista" class="img-fluid" style="width: 30px;">
        </div>
      </div>
    </div>
  </nav>

  <!-- Se declara un contenedor fila y después un contenedor columna. Las columnas deben sumar 12, según la rejilla Bootstrap. -->
  <div class="container" style="margin-top: 80px;">
    <?php
    include ($seccion . ".php");
    ?>
  </div>

  <div class="container">
    <footer>
      <p>© Company 2012</p>
    </footer>
  </div>

  <!-- Le javascript -->
  <script src="js/funciones.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</body>

</html>