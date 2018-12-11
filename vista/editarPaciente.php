

<body>
 <div class="wrapper ">
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
    <?php //var_dump($pac); ?>


    <!-- Inicio Modal Editar Paciente  -->
    <div class="modal fade bd-editarpac-modal-lg" id="editarpac" tabindex="-1" role="dialog" aria-labelledby="labelModal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header modal-header-success">
            <h4 class="card-title">Editar los Datos del Paciente
              <?php echo $pac->
              nombre_paciente; ?>
              <?php echo $pac->
              apellido_paciente; ?></h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


            <div class="modal-body">
              <form method="get" action="" id="form_mod">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group label-floating has-success">
                      <label class="bmd-label-floating">N° de cédula</label>
                      <input type="text" name="cedula" id="cedula" class="form-control" required="required"
                      value="<?php echo $pac->cedula_paciente; ?>">
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group label-floating has-success">
                      <label class="bmd-label-floating">Nombres</label>
                      <input type="text" name="nombre" id="nombre" class="form-control" required="required"
                      value="<?php echo $pac->nombre_paciente; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group label-floating has-success">
                      <label class="bmd-label-floating">Apellidos</label>
                      <input type="text" name="apellido" id="apellido" class="form-control" required="required"
                      value="<?php echo $pac->apellido_paciente; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group label-floating has-success">
                      <label class="bmd-label-floating">Correo</label>
                      <input type="email" name="email" id="email" class="form-control" required="required"
                      value="<?php echo $pac->email_paciente; ?>">
                    </div>
                  </div>


                  <div class="form-group label-floating has-success col-md-7">
                    <label for="direccion" class="bmd-label-floating">Dirección</label>
                    <input type="text" class="form-control" name="direccion_paciente" id="direccion_paciente" required="required"
                    value="<?php echo $pac->direccion_paciente; ?>">
                  </div>



                </div>

                <div class="form-row">
                  <div class=" col-lg-4 col-md-4 col-sm-4">

                    <select class="form-control" type="select" id="estadomod" name="estado" data-style="btn btn-success btn-round">
                      <option disabled selected>Estado</option>
                      <?php foreach ($datose as $estado => $fila) {?>
                        <?php if ($fila->id_estado == $muni->id_estado): ?>

                          <option value="<?php echo $fila->id_estado ?>" selected="selected">
                            <?php echo $fila->nombre ?></option>

                          <?php endif?>
                          <option value="<?php echo $fila->id_estado ?>">
                            <?php echo $fila->nombre ?></option>
                          <?php }?>
                        </select>

                      </div>

                      <div class="col-lg-4 col-md-4 col-sm-4">

                        <select class="form-control" id="municipiomod" name="municipiomod" data-style="btn btn-success btn-round">
                          <option disabled selected>Municipio</option>
                          <?php foreach ($datosm as $municipio => $fila) {?>
                            <?php if ($fila->id_municipio == $muni->municipio_id): ?>


                              <option value="<?php echo $fila->id_municipio ?>" selected="selected"><?php echo $fila->nombre ?></option>



                            <?php endif?>
                            <option value="<?php echo $fila->id_municipio ?>"><?php echo $fila->nombre ?></option>
                          <?php }?>
                        </select>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-4">

                        <select class="form-control" id="parroquiamod" name="parroquiamod" data-style="btn btn-success btn-round">
                          <option disabled selected>Parroquia</option>
                          <?php foreach ($datosp as $parroquia => $fila) {?>
                            <?php if ($fila->id_parroquia == $pac->id_parroquia): ?>


                              <option value="<?php echo $fila->id_parroquia ?>" selected="selected"><?php echo $fila->nombre ?></option>


                            <?php endif?>
                            <option value="<?php echo $fila->id_parroquia ?>"><?php echo $fila->nombre ?></option>
                          <?php }?>
                        </select>

                      </div>
                    </div>


                    <div class="form-row">
                      <div class="form-group label-floating has-success col-md-4">
                        <label for="telefonomovil" type="selectpicker" class="bmd-label-floating">Teléfono</label>
                        <input type="text" class="form-control" name="telefono_paciente" id="telefono_paciente" required="required"
                        value="<?php echo $pac->telefono_paciente; ?>">
                      </div>

                      <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
                        <label for="ocupacion" class="bmd-label-floating">Ocupación</label>
                        <input type="text" class="form-control" name="ocupacion" id="ocupacion" required="required"
                        value="<?php echo $pac->ocupacion; ?>">
                      </div>
                      <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
                        <label for="peso_paciente" class="bmd-label-floating">Peso</label>
                        <input type="number" class="form-control" name="peso_paciente" id="peso_paciente" required="required"
                        value="<?php echo $pac->peso_paciente; ?>">
                      </div>
                    </div>





                    <div class="form-row">
                      <div class="form-group col-lg-4 col-md-4 col-sm-4">
                        <select class="form-control" type="" name="estadocivil_paciente" id="edocivilmod" data-style="btn btn-success btn-round">
                          <option disabled selected>Estado Civil</option>
                          <?php  $esci = $pac->estadocivil_paciente;
                          if ($esci == 'Soltero(a)') { ?>
                           <option value="Soltero(a)" selected="selected">Soltero(a)</option>
                         <?php } else { ?>
                           <option value="Soltero(a)" >Soltero(a)</option>
                         <?php }

                         if ($esci == 'Casado(a)') {?>
                           <option value="Casado(a)" selected="selected">Casado(a)</option>
                         <?php  } else{ ?>
                           <option value="Casado(a)" >Casado(a)</option>
                         <?php }

                         if ($esci == 'Divorciado(a)') {?>
                           <option value="Divorciado(a)" selected="selected">Divorciado(a)</option>
                         <?php } else {?>
                           <option value="Divorciado(a)" >Divorciado(a)</option>
                         <?php }
                         if ($esci == 'Viudo(a)') {?>
                           <option value="Viudo(a)" selected="selected">Viudo(a)</option>
                         <?php } else {?>
                           <option value="Viudo(a)" >Viudo(a)</option>
                         <?php }
                         ?>


                       </select>
                     </div>

                     <div class="form-group col-lg-4 col-md-4 col-sm-4">
                      <select class="form-control" type="" name="nacionalidad_paciente" id="nacionamod"  data-style="btn btn-success btn-round">
                        <option disabled selected>Nacionalidad</option>
                        <?php $nac = $pac->nacionalidad_paciente;
                        if ($nac == 'Venezolano') { ?>
                         <option value="Venezolano" selected="selected">Venezolano</option>
                       <?php  } else { ?>
                         <option value="Venezolano" >Venezolano</option>
                       <?php }
                       if ($nac == 'Extranjero') {?>
                         <option value="Extranjero" selected="selected">Extranjero</option>
                       <?php } else{ ?>
                         <option value="Extranjero" >Extranjero</option>
                       <?php }
                       ?>                 

                     </select>
                   </div>
                   <div class="form-group label-floating has-success col-md-4">
                    <label for="etnia" class="bmd-label-floating">Etnia</label>
                    <input type="text" name="etnia_paciente" id="etnia_paciente" class="form-control" 
                    value="<?php echo $pac->etnia_paciente; ?>">
                  </div>
                </div>

                <div class="form-row">

                  <label for="fecnac">Fecha Nacimiento <span class="required">*</span>:</label>
                  <input id="fecha_nacimiento" name="fecha_nacimiento" type="text" class="datepicker" value="<?php echo $pac->fecha_nacimiento; ?>">

                </div>
                
                <div class="form-row">
                  <div class="col-xs-12">
                    <span>Sexo: </span>
                    <?php $sex=$pac->sexo_paciente;?>

                    <input name="sexo_paciente" value="Femenino" type="radio" data-toggle="collapse" data-target="#collapseOne"/> Femenino:
                    <input name="sexo_paciente" value="Masculino" type="radio" data-toggle="collapse" data-target="#collapseOne" checked/> Masculino:
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
                                    <label for="semanas" class="bmd-label-floating">Semanas:</label>
                                    <input type="text" name="semanas" id="semanas" class="form-control">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group label-floating has-success col">
                                <div class="collapse multi-collapse" id="multiCollapseExample2">
                                  <div class="card card-body">
                                    <label for="mlactante" class="bmd-label-floating">Tiempo de Lactancia</label>
                                    <input type="text" name="mlactante" id="mlactante" class="form-control">
                                  </div>
                                </div>
                              </div>
                              <div class="form-group label-floating has-success col">
                                <div class="collapse multi-collapse" id="multiCollapseExample3">
                                  <div class="card card-body">
                                    <label for="elactante" class="bmd-label-floating">Edad del Lactante:</label>
                                    <input type="text" name="elactante" id="elactante" class="form-control">
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



                <div>

                  <input class="btn" type="hidden" name="id_parroquiamod" id="id_parroquiamod"  
                  value="<?php echo $pac->id_parroquia; ?>">
                  <input class="btn" type="hidden" name="id_paciente" id="id_paciente"  
                  value="<?php echo $pac->id_paciente; ?>">


                  <input class="btn" type="hidden" name="editarregistro" value="si">
                  <button type="submit" class="btn btn-danger btn-sm pull-right btn-round" id="editarregistro">Guardar Cambios</button>
                </div>

                <a  class="btn btn-danger btn-sm pull-right btn-round" role="button" href="<?php echo RUTA ?>/?accion=principal">Inicio</a>
                <a  class="btn btn-danger btn-sm pull-right btn-round" role="button" href="<?php echo RUTA ?>/?accion=consultarPaciente">Volver</a>



              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin Modal Editar Paciente  -->
    </div>
  </div>
</div>
</div>
<?php require_once "vista/pie.php";?>




</body>

</html>


<script type="text/javascript">

  $(document).ready(function() {

    $("#editarpac").modal("show");

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


    $("#estadomod").on('change', function () {
      $("#estadomod option:selected").each(function () {

        elegido=$(this).val();

        $.get("?accion=municipio",
          { elegido: elegido },
          function(data){
            console.log(data);

                   $("#municipiomod").empty(); //limpiamos lo que hay
                   $("#parroquiamod").empty(); //limpiamos lo que hay

                   $("#municipiomod").html(data);

                 });
      });
    });
    $("#municipiomod").on('change', function () {
      /* Act on the event */

      $("#municipiomod option:selected").each(function () {

        elegido=$(this).val();
            //alert(elegido);
            $.get("?accion=parroquia",
              { elegido: elegido },
              function(data){
                console.log(data);


                $("#parroquiamod").html(data);

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
          window.location='?accion=consultarPaciente';
          
        }
      });
    });


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


  });

</script>










