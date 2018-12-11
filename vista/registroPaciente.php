

<body>

  <?php require_once "vista/menu.php";?>


  <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">

          <a class="navbar-brand"> Gestión de Pacientes</a>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->




    <!--Inicio Modal Registro PAciente  -->
    <div class="modal fade bd-registropac-modal-lg" id="registropac" tabindex="-1" role="dialog" aria-labelledby="labelModal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header modal-header-success">
            <h5 class="modal-title" id="labelModal">Registro de Pacientes</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="" id="form_registro">
              <div class="row">
                <div class="col-md-6">
                  Nacionalidad <span class="required">*</span><br>
                  <input class="nacionalidad_paciente" type="radio" name="nacionalidad_paciente"  id="V" value="Venezolano">
                  <label for="V">Venezolano</label>
                  <input class="nacionalidad_paciente" type="radio"  name="nacionalidad_paciente" id="E" value="Extranjero" />
                  <label for="E">Extranjero</label>
                </div>
                <div class="col-md-6">
                  <div class="form-group label-floating has-success">
                    <label class="bmd-label-floating">N° de cédula <span class="required">*</span></label>
                    <input type="text" minlength="6" maxlength="8" name="cedula" id="cedula" class="form-control" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group label-floating has-success">
                    <label class="bmd-label-floating">Nombres <span class="required">*</span></label>
                    <input type="text" name="nombre" id="nombre" class="form-control"  >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group label-floating has-success">
                    <label class="bmd-label-floating">Apellidos <span class="required">*</span></label>
                    <input type="text" name="apellido" id="apellido" class="form-control" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group label-floating has-success">
                    <label class="bmd-label-floating">Correo <span class="required">*</span></label>
                    <input type="email" name="email_paciente" id="email_paciente" class="form-control" >

                  </div>
                </div>


                <div class="form-group label-floating has-success col-md-7">
                  <label for="direccion" class="bmd-label-floating">Dirección <span class="required">*</span></label>
                  <input type="text" class="form-control" name="direccion_paciente" id="direccion_paciente" >
                </div>
              </div>

              <div class="form-row">
                <div class=" col-lg-4 col-md-4 col-sm-4">
                  <select class="form-control" type="" id="estado" name="estado" data-style="btn-success">
                    <option disabled selected>Estado</option>
                    <?php foreach ($datosEstados as $estado => $fila) {?>
                      <option value="<?php echo $fila->id_estado ?>"><?php echo $fila->nombre ?></option>
                    <?php }?>
                  </select>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4">
                  <select class="form-control" type="" id="cbx_municipio" name="municipio" data-style="btn btn-success btn-round">
                    <option disabled selected>Municipio</option>
                  </select>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <select class="form-control" id="cbx_parroquia" name="parroquia" data-style="btn btn-success btn-round">
                    <option disabled selected>Parroquia</option>
                  </select>
                </div>
              </div>




              <div class="form-row">
                <div class="form-group label-floating has-success col-md-4">
                  <label for="telefonomovil" type="selectpicker" class="bmd-label-floating">Teléfono</label>
                  <input type="tel" maxlength="11" class="form-control" name="telefono_paciente" id="telefono_paciente" >
                </div>

                <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
                  <label for="ocupacion" class="bmd-label-floating">Ocupación</label>
                  <input type="text" class="form-control" name="ocupacion" id="ocupacion" >
                </div>
                <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
                  <label for="peso_paciente" class="bmd-label-floating">Peso</label>
                  <input type="number" class="form-control" name="peso_paciente" id="peso_paciente" >
                </div>
              </div>

              <div class="form-row">
                <div class="form-group has-success col-lg-6 col-md-6 col-sm-6">
                  <select class="form-control" type="" name="estadocivil_paciente" id="estadocivil_paciente" data-style="btn btn-success btn-round">
                    <option disabled selected>Estado Civil</option>
                    <option value="Soltero(a)">Soltero(a)</option>
                    <option value="Casado(a)">Casado(a)</option>
                    <option value="Divorciado(a)">Divorciado(a)</option>
                    <option value="Viudo(a)">Viudo(a)</option>

                  </select>
                </div>
                <div class="form-group label-floating has-success col-sm6 col-md-6 col-lg-6">
                  <label for="etnia" class="bmd-label-floating">Etnia</label>
                  <input type="text" name="etnia_paciente" id="etnia_paciente" class="form-control">
                </div>
              </div>

              <div class="row">

                <div class="form-group label-floating has-success col-sm6 col-md-6 col-lg-6">

                  <label for="fecnac">Fecha Nacimiento <span class="required">*</span>:</label>
                  <input id="fecha_nacimiento" name="fecha_nacimiento" type="text" class="datepicker" >
                </div>

              </div>
              <div class="form-row">
                <div class="col-xs-12">
                  Sexo<span class="required">*</span>:<br>
                  <input class="genero" name="sexo_paciente" value="Masculino" type="radio" data-toggle="collapse" data-target="#collapseOne" checked/>
                  <label for="masculino">Masculino:</label>
                  <input class="genero" name="sexo_paciente" value="Femenino" type="radio" data-toggle="collapse" data-target="#collapseOne"/>
                  <label for="femenino">Femenino:</label>
                  <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                      <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                          <div class="row">
                            <p>
                              <a class="btn btn-success" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">¿Está embarazada?</a>
                              <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Madre Lactante</button>
                              <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3">Lactante:</button>

                            </p>
                          </div>
                          <div class="row">
                            <div class="form-group label-floating has-success col">
                              <div class="collapse multi-collapse" id="multiCollapseExample1">
                                <div class="card card-body">
                                  <label for="embarazada" class="bmd-label-floating">Semanas:</label>
                                  <input type="text" name="embarazada" id="embarazada" class="form-control">
                                </div>
                              </div>
                            </div>
                            <div class="form-group label-floating has-success col">
                              <div class="collapse multi-collapse" id="multiCollapseExample2">
                                <div class="card card-body">
                                  <label for="madre_lactante" class="bmd-label-floating">Tiempo de Lactancia</label>
                                  <input type="text" name="madre_lactante" id="madre_lactante" class="form-control">
                                </div>
                              </div>
                            </div>
                            <div class="form-group label-floating has-success col">
                              <div class="collapse multi-collapse" id="multiCollapseExample3">
                                <div class="card card-body">
                                  <label for="lactante" class="bmd-label-floating">Edad del Lactante:</label>
                                  <input type="text" name="lactante" id="lactante" class="form-control">
                                </div>
                              </div>
                            </div>
                          </div>


                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>


              <div class="modal-footer">
                <div class="row">
                  <input class="btn" type="hidden" name="guardarregistro" value="si">

                  <button type="submit" class="btn btn-info btn-sm pull-right btn-round" id="guardarregistro" >Guardar Datos</button>

                  <a  class="btn btn-danger btn-sm pull-right btn-round" role="button" href="<?php echo RUTA ?>/?accion=principal">Inicio</a>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    <!--Fin Modal Registro PAciente  -->

    <?php require_once "vista/pie.php";?>


    <!-- data-validation="custom" data-validation-regexp="^([a-z][A-Z]+)$" data-validation-error-msg="Ingrese sólo letras"  -->

  </body>

  </html>


  <script type="text/javascript">

    $(document).ready(function() {


      var $input = $( '.datepicker' ).pickadate({

        selectMonths: true, // Creates a dropdown to control month
        selectYears: 120,
        //max: new Date(2003,12,31),
    //max: new Date(), //Muestra todas las fechas pasadas y futuras
    min: false, // new Date() deshabilita las fechas pasadas y solo muestra de la actual hasta hoy
    today: 'Hoy',
    clear: 'Limpiar',
    close: 'Seleccionar',
    format: 'yyyy-mm-dd',
    monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Miér', 'Jue', 'Vie', 'Sáb'],
    weekdaysLetter: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
    showMonthsShort: undefined,
    showWeekdaysFull: undefined,
    labelMonthNext: 'Mes siguiente',
    labelMonthPrev: 'Mes anterior',
    labelMonthSelect: 'Seleccione el mes',
    labelYearSelect: 'Seleccione el año',
    min: new Date(1910,1,1),
    max: new Date(2050,12,31)

  });

      $( "#cedula" ).keyup(function(e) {

        cedula=$("#cedula").val();

        $.ajax({
          type: "get",
          url: "?accion=buscarCedula&cedula="+cedula,
          data: cedula,
          success: function(data) {


            if (data==1) {
             alert("Cedula Existe");
             $('#cedula').val('');
             $('#cedula').focus();
           }
         }
       });
      });

      $("#registropac").modal("show");

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

      $("#cbx_municipio").on('change', function () {

        $("#cbx_municipio option:selected").each(function () {

          elegido=$(this).val();
            //alert(elegido);
            $.get("?accion=parroquia",
              { elegido: elegido },
              function(data){
                console.log(data);

                $("#cbx_parroquia").html(data);

              });
          });
      });


      $( "#form_registro" ).on( "submit", function( event ) {

        event.preventDefault();
        //event.stopPropagation();

        var dataString = $('#form_registro').serialize();
        //alert('Datos serializados: '+dataString);

        $.ajax({
          type: "POST",
          url: "",
          data: dataString,
          success: function(data) {


           alert("¡Paciente registrado exitosamente!");

           window.location='?accion=consultarPaciente';

         }
       });
      });




     /* $.validate({
       borderColorOnError : '#FFF',
       addValidClassOnAll : true,
       validateOnBlur : true, // disable validation when input looses focus
    errorMessagePosition : 'top',// Instead of 'inline' which is default
    scrollToTopOnError : true // Set this property to true on longer forms

  });*/






});






</script>










