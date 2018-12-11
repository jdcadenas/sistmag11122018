  

<body class="">
  <div class="wrapper ">
    <?php require_once("vista/menu.php"); ?>

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">		
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="">
              <header>	   		
               <div class="row">
                <div class="col-md-12">
                  <div style=" height: 20px;">
                    <img src="lib/img/piedepagina.png" style="height: 50px;"/>
                  </div>
                </div>
              </div>          
            </header>  	
          </div>        
        </div>
      </div>    
    </nav>

    <div class="content">
      <div class="container-fluid">     
       <div class="row">
        <div class="col-md-6">
          <h6 class="navbar-brand-danger">Bienvenido(a) <?php echo $_SESSION["nombre"]." ". $_SESSION["apellido"] ?>  al Sistema Web de la Dirección de Salud</h6>  
        </div>
        <div class="col-md-6">
          <h9 class="navbar-brand-danger">Usted inició sesión como <?php echo $_SESSION["descripcion"] ?></h9>  
        </div>
      </div>
    </div>

    <div class="col-md-12">
     <div class="row">
       <div id="carouselImagenes" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel1" data-slide-to="0" class="active"></li>
          <li data-target="#carousel2" data-slide-to="1"></li>
          <li data-target="#carousel3" data-slide-to="2"></li>
          <li data-target="#carousel3" data-slide-to="3"></li>
        </ol>
        <div class="col-md-12">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="lib/img/P1012702.jpg" alt="Primer slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="lib/img/P1012699.jpg" alt="Segundo slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="lib/img/P1012746.jpg" alt="Tercer slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="lib/img/P1012747.jpg" alt="Cuarto slide">
            </div>
          </div>

          <a class="carousel-control-prev" href="" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
          </a>
        </div>
      </div>
    </div> 

    <script>
      //$('.carousel').carousel({
        //interval: 3000
     // })
   </script>





 </div>

</div>
<footer class="footer">
  <div class="container-fluid">
    <nav class="float-left">
      <ul>
        <li>               
          Uptaeb -               
        </li>
        <li>
          PNFI -              
        </li>
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>
        Copyright    
        
      </ul>
    </nav>    
  </div>
</footer>
</div>


<?php require_once("vista/pie.php"); ?>
