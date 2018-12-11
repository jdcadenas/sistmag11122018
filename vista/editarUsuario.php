

<body>
 <div class="wrapper ">
   <?php require_once "vista/menu.php";?>



   <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <a class="navbar-brand"> Gestión de Usuarios</a>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <?php //var_dump($pac); ?>


    <!-- Inicio Modal Editar Usuarios  -->
    <div class="modal fade bd-editarusu-modal-lg" id="editarusu" tabindex="-1" role="dialog" aria-labelledby="labelModal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header modal-header-success">
            <h4 class="card-title">Editar los datos del Usuario:
              <?php echo $usu->
              nombre; ?>
              <?php echo $usu->
              apellido; ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>                
            </div>

            <div class="card-body">
              <form method="get" action="" id="form_mod">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group label-floating has-success">
                      <label class="bmd-label-floating">N° de cédula</label>
                      <input type="text" name="cedula" id="cedula" class="form-control" required="required"
                      value="<?php echo $usu->cedula; ?>">
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group label-floating has-success">
                      <label class="bmd-label-floating">Nombres</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" required="required"
                      value="<?php echo $usu->nombre; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group label-floating has-success">
                      <label class="bmd-label-floating">Apellidos</label>
                      <input type="text" name="apellido" id="apellido" class="form-control" required="required"
                      value="<?php echo $usu->apellido; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group label-floating has-success">
                      <label class="bmd-label-floating">Correo</label>
                      <input type="email" name="email" id="email" class="form-control" required="required"
                      value="<?php echo $usu->email_usuario; ?>">
                    </div>
                  </div>                  



                </div>                


                <div class="form-row">
                  <div class="form-group label-floating has-success col-md-4">
                    <label for="telefonomovil" type="selectpicker" class="bmd-label-floating">Teléfono</label>
                    <input type="text" class="form-control" name="telefono_usuario" id="telefono_usuario" required="required"
                    value="<?php echo $usu->telefono_usuario; ?>">
                  </div>                   

                </div> 

                <div class="row">
                 <div class="col-md-3">
                  <div class="form-group label-floating col-md-12">
                    <label class="bmd-label-floating">Seleccione rol:</label>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="administrador" id="administrador" value="1"> Administrador
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="secretaria" id="secretaria" value="2"> Secretaria
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-check form-check-inline">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="visitante" id="visitante" value="3"> Visitante
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>



              <div>


                <input class="btn" type="hidden" name="id_usuario_sistema" id="id_usuario_sistema"  
                value="<?php echo $pac->id_usuario_sistema; ?>">


                <input class="btn" type="hidden" name="editarusuario" value="si">
                <button type="submit" class="btn btn-danger btn-sm pull-right btn-round" id="editarusuario">Guardar Cambios</button>
              </div>

              <a  class="btn btn-danger btn-sm pull-right btn-round" role="button" href="<?php echo RUTA ?>/?accion=principal">Inicio</a>
              <a  class="btn btn-danger btn-sm pull-right btn-round" role="button" href="<?php echo RUTA ?>/?accion=consultarUsuarios">Volver</a>



            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php require_once "vista/pie.php";?>




</body>

</html>


<script type="text/javascript">

  $(document).ready(function() {

    $("#editarusu").modal("show");

    $("#estado").on('change', function () {
      $("#estado option:selected").each(function () {

        elegido=$(this).val();

        $.get("?accion=municipio",
          { elegido: elegido },
          function(data){
            console.log(data);
            $("#cbx_municipio").html(data);

          });
      });
    });

    $( "#form_mod" ).on( "submit", function( event ) {

      event.preventDefault();

      var dataString = $('#form_mod').serialize();

    //alert('Datos serializados: '+dataString);

    $.ajax({
      type: "POST",
      url: "",
      data: dataString,
      success: function(data) {
        alert("Registro Modificado exitosamente");
        window.location='?accion=consultarUsuarios';
        
      }
    });
  });
  });

</script>










