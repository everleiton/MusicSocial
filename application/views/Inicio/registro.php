<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <title>Registro</title>
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
  
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url(); ?>css/mdb.min.css" rel="stylesheet">
  
  <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
  
  <!-- Template styles -->
  <style rel="stylesheet">
  /* TEMPLATE STYLES */
  
  main {
    padding-top: 3rem;
    padding-bottom: 2rem;
  }
  
  .widget-wrapper {
    padding-bottom: 2rem;
    border-bottom: 1px solid #e0e0e0;
    margin-bottom: 2rem;
  }
  
  .extra-margins {
    margin-top: 1rem;
    margin-bottom: 2.5rem;
  }
  
  .divider-new {
    margin-top: 0;
  }
  
  .navbar {
    background-color: #414a5c;
  }
  
  footer.page-footer {
    background-color: #414a5c;
    margin-top: 2rem;
  }
  </style>
  <?php 
  
  $conexion =new mysqli("localhost", "root", "", "musicsocial");
  $instrumentos= "SELECT * FROM instrumentos ";
  $Resultadoinstrumentos = $conexion->query($instrumentos);
  $generos= "SELECT * FROM generos ";
  $Resultadogeneros = $conexion->query($generos);
   ?>
</head>

<body>
  
  
  <header>
    
    <!--Navbar-->
    <nav class="navbar navbar-toggleable-md navbar-dark">
      <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
          <strong>Music Social</strong>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav1">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url(); ?>">Iniciar sesión <span class="sr-only">(current)</span></a>
            </li>
            
          </ul>
        
        </div>
      </div>
    </nav>
    <!--/.Navbar-->
    
  </header>
  
  <main>
    
    <!--Main layout-->
    <div class="container">
      <form class="form-horizontal" method="post"  action="<?php echo base_url('index.php/Musico/insert'); ?>" enctype="multipart/form-data">
        <fieldset>
          
          <!-- Form Name -->
          <legend>Registro nuevo usuario</legend>
          
          <!-- Text input-->
          <div class="form-group">
            
            <div class="col-md-12">
              <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control input-md" required="">
              
            </div>
          </div>
          <div class="form-group">
            
            <div class="col-md-12">
              <input id="correo" name="correo" type="text" placeholder="Correo" class="form-control input-md" required="">
              
            </div>
          </div>
          <div class="form-group">
            
            <div class="col-md-12">
              <input id="pass" name="pass" type="password" placeholder="Contraseña" class="form-control input-md" required="">
              
            </div>
          </div>
          
          <!-- Text input-->
          <div class="form-group">
            
            <div class="col-md-12">
              <input id="direccion" name="direccion" type="text" placeholder="Dirección" class="form-control input-md" required="">
              
            </div>
          </div>
          
          
          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-12 control-label" for="instrumento">Intrumento que toca</label>
            <div class="col-md-12">
              <select id="instrumento" name="instrumento" class="form-control">
                
                <option value disabled>  Instrumentos Musicales</option>
                <?php    while ($row = $Resultadoinstrumentos->fetch_assoc()) { ?>
                 <option value="<?php echo $row['id'];?>"><?php echo $row['instrumento'];?></option>
                 <?php  } ?>
              </select>
            </div>
          </div>
          
          
          <div class="form-group">
            <label class="col-md-12 control-label" for="genero">Generos</label>
            <div class="col-md-12">
          
                
                
                <?php    while ($row = $Resultadogeneros->fetch_assoc()) { ?>
              
                 <input type="checkbox" name="genero[]" value="<?php echo $row['id'];?>"><?php echo $row['genero'];?><br>
                 <?php  } ?>
              </select>
            </div>
            
          </div>
          <div class="form-group">
            
            <div class="col-md-12">
              <input id="imagen" name="imagen" type="file"  accept="image/*"placeholder="Foto" class="form-control input-md form-group is-empty is-fileinput" required="">
              
            </div>
          </div>    
          <!-- Button -->
          <div class="form-group">
            
            <div class="col-md-4">
              <button id="Registrarse" name="Registrarse" class="btn btn-danger">Registrarse</button>
            </div>
          </div>
        </div>
        <!--/.Main layout-->
        
      </main>
      
      <!--Footer-->
      <footer class="page-footer center-on-small-only">
        
        <!--Footer Links-->
        
        
        <hr>
        
        <!--Call to action-->
        <div class="call-to-action">
          <h4>HACKATHON</h4>
          
        </div>
        <!--/.Call to action-->
        
        <!--Copyright-->
        <div class="footer-copyright">
          <div class="container-fluid">
            © 2017 Copyright: Ever Leitón
            
          </div>
        </div>
        <!--/.Copyright-->
        
      </footer>
      <!--/.Footer-->
      
      
      <!-- SCRIPTS -->
      
      <!-- JQuery -->
      <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-2.2.3.min.js"></script>
      
      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="<?php echo base_url(); ?>js/tether.min.js"></script>
      
      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
      
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="<?php echo base_url(); ?>js/mdb.min.js"></script>
      
      <script>
      new WOW().init();
      </script>
      
    </body>
    
    </html>