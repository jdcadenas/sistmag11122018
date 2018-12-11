

<body>

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


    <div class="modal fade bd-registrousu-modal-lg" id="registrousu" tabindex="-1" role="dialog" aria-labelledby="labelModal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header modal-header-success">
            <h4 class="card-title">Registro de Usuarios</h4>                
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="card-body">
           <form method="post" action="" id="form_registro">
            <div class="row">              
              <div class="col-md-6">
                <div class="form-group label-floating has-success">
                  <label class="bmd-label-floating">N° de cédula</label>
                  <input type="text" minlength="6" maxlength="8" name="cedula" id="cedula" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group label-floating has-success">
                  <label for="usuario_sistema" type="selectpicker" class="bmd-label-floating">Nombre de Usuario*</label>
                  <input type="text" class="form-control" name="usuario_sistema" id="usuario_sistema" data-validation-length = "min4">
                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group label-floating has-success">
                  <label class="bmd-label-floating">Nombre</label>
                  <input type="text" name="nombre" id="nombre" class="form-control">
                </div>
              </div>              
              <div class="col-md-6">
                <div class="form-group label-floating has-success">
                  <label class="bmd-label-floating">Apellido</label>
                  <input type="text" name="apellido" id="apellido" class="form-control">
                </div>
              </div>
              
            </div>
            <div class="row">              
              <div class="col-md-6">
                <div class="form-group label-floating has-success">
                  <label class="bmd-label-floating">Correo</label>
                  <input type="email" name="email_usuario" id="email_usuario" class="form-control">
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group label-floating has-success">
                  <label for="telefo" type="selectpicker" class="bmd-label-floating">Teléfono</label>
                  <input type="text" minlength="10" maxlength="11" class="form-control" name="telefono_usuario" id="telefono_usuario">
                </div>
              </div> 
            </div>

            <div class="row">

              <div class="col-md-4">
                <div class="form-group label-floating has-success">
                  <label for="claveusuario" class="bmd-label-floating has-success"> Contraseña *</label>
                  <input type="password" class="form-control" id="claveusuario"  name="clave" id="clave">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group label-floating has-success">
                  <label for="claveusuario1" class="bmd-label-floating has-success"> Confirma Contraseña *</label>
                  <input type="password" class="form-control" id="claveusuario1" equalTo="#claveusuario" name="confirmaclave" id="confirmaclave">
                </div>
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
                  <input class="form-check-input" type="radio" name="id_rol" id="administrador" value="1"> Administrador
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="id_rol" id="secretaria" value="2"> Secretaria
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label>
              </div>
            </div>            
          </div>


          <div class="modal-footer">
                <div class="row">
                  <input class="btn" type="hidden" name="registroUsuario" value="si">

                  <button type="submit" class="btn btn-info btn-sm pull-right btn-round" id="registroUsuario" >Guardar Datos</button>

                  <a  class="btn btn-danger btn-sm pull-right btn-round" role="button" href="<?php echo RUTA ?>/?accion=principal">Inicio</a>
                </div>
              </div>              

               
          
        </form>

      </div>
    </div>
  </div>
</div>
</div>
</div>

<?php require_once("vista/pie.php"); ?>   

</body>

</html>

<script>
  $(document).ready(function() {

    $("#registrousu").modal("show");

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

    $( "#form_registro" ).on( "submit", function( event ) {

      event.preventDefault();

      var dataString = $('#form_registro').serialize();

    //alert('Datos serializados: '+dataString);

    $.ajax({
      type: "POST",
      url: "",
      data: dataString,
      success: function(data) {
        alert("¡Usuario registrado exitosamente!");
        window.location='?accion=consultarUsuarios';
      }
    });
  });

    $( "#cedula" ).keyup(function(e) {


      cedula=$("#cedula").val();

      $.ajax({
        type: "get",
        url: "?accion=buscarCedulaUsu&cedula="+cedula,
        data: cedula,
        success: function(data) {


          if (data==1) {
            alert("¡N° de Cédula ya está registrado!");
            $('#cedula').val('');
            $('#cedula').focus();
          }         
        }
      });
      
    });

    $( "#usuario_sistema" ).keyup(function(e) {

      usuario_sistema=$("#usuario_sistema").val();

      $.ajax({
        type: "get",
        url: "?accion=buscarNombreUsu&usuario_sistema="+usuario_sistema,
        data: usuario_sistema,
        success: function(data) {


          if (data==1) {
           alert("¡El nombre de usuario ya existe!");
           $('#usuario_sistema').val('');
           $('#usuario_sistema').focus();
         }         
       }
     });
    });
  });
</script>


