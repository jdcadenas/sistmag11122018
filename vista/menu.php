

<div class="sidebar" data-color="green" data-background-color="green">

    <!--    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag -->
      
      <div class="logo">
        <a class="simple-text logo-normal">
          Menú de Gestión
        </a>
      </div>
      <div class="sidebar-wrapper ps-container ps-thme-default">
        <ul class="nav">


          <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA ?>/?accion=registroPaciente" class="btn btn-success" role="button">Registrar Paciente
              <i class="fa fa-user-plus" aria-hidden="true"></i>             
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA ?>/?accion=consultarPaciente" class="btn btn-success" role="button">Consultar Pacientes
              <i class="fa fa-users" aria-hidden="true"></i>             
            </a>
          </li>
          <?php if ($_SESSION['descripcion']=='administrador'): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo RUTA ?>/?accion=registroUsuario" class="btn btn-success" role="button">Registrar Usuario
                <i class="fa fa-user-plus" aria-hidden="true"></i>             
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo RUTA ?>/?accion=consultarUsuarios" class="btn btn-success" role="button">Consultar Usuarios
                <i class="fa fa-users" aria-hidden="true"></i>             
              </a>
            </li>
          <?php endif ?>

          <li class="nav-item ">

            <a class="nav-link collapsed" data-toggle="collapse" href="#reportediario" aria-expanded="false">
              <i class="fa fa-files-o" aria-hidden="true"></i>
              <p>Gestión de Reportes 
               <b class="caret"></b>
             </p>
           </a>
           <div class="collapse" id="reportediario" style="">
            <ul class="nav">
              <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#componentsCollapse" aria-expanded="false">
                  <i class="fa fa-stethoscope" aria-hidden="true"></i>
                  <span class="sidebar-normal"> Tratamientos 
                    <b class="caret"></b>
                  </span>

                </a>

                <div class="collapse show" id="componentsCollapse" aria-expanded="false" style="">
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" data-target="#modalbuscardiatra" data-toggle="modal" id="reportetra1" href="">
                        <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                        <span class="sidebar-normal"> Diarios </span>
                      </a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link" data-target="#modalbuscarfechastra" data-toggle="modal" id="reportetra2" href="">
                        <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                        <span class="sidebar-normal"> Semanal </span>
                      </a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link" data-target="#modalbuscarmestra" data-toggle="modal" id="reportetra3" href="">
                        <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                        <span class="sidebar-normal"> Mensual </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#componentsCollapse1" aria-expanded="false">
                  <i class="fa fa-stethoscope" aria-hidden="true"></i>
                  <span class="sidebar-normal"> Pruebas 
                    <b class="caret"></b>
                  </span>

                </a>

                <div class="collapse show" id="componentsCollapse1" style="" aria-expanded="false">
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link"  data-target="#modalbuscardiapru" data-toggle="modal" id="reportepru1" href="">
                        <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                        <span class="sidebar-normal"> Diarias </span>
                      </a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link" data-target="#modalbuscarfechaspru" data-toggle="modal" id="reportepru2" href="">
                        <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                        <span class="sidebar-normal"> Semanales </span>
                      </a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link"  data-target="#modalbuscarmespru" data-toggle="modal" id="reportepru3" href="">
                        <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                        <span class="sidebar-normal"> Mensuales </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#componentsCollapse2" aria-expanded="false">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  <span class="sidebar-normal">Origen probable de infección 
                    <b class="caret"></b>
                  </span>

                </a>

                <div class="collapse show" id="componentsCollapse2" style="" aria-expanded="false">
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link" id="reported" href="<?php echo RUTA ?>/?accion=reporte&tipo=estado">
                        <i class="fa fa-location-arrow" aria-hidden="true"></i>
                        <span class="sidebar-normal"> Estado </span>
                      </a>
                    </li>

                  </ul>
                </div>
              </li>
              <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#componentsCollapse5" aria-expanded="false">
                  <i class="fa fa-user-md" aria-hidden="true"></i> 
                  <span class="sidebar-normal">Medicamentos Suministrados 
                    <b class="caret"></b>
                  </span>

                </a>

                <div class="collapse show" id="componentsCollapse5" style="" aria-expanded="false">
                  <ul class="nav">
                    <li class="nav-item ">
                      <a class="nav-link"  data-target="#modalbuscardiasumi" data-toggle="modal" id="reportesumdia" href="">
                        <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                        <span class="sidebar-normal"> Diarios </span>
                      </a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link" data-target="#modalmuscarsemanasumi" data-toggle="modal" id="reportesumsema" href="">
                        <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                        <span class="sidebar-normal"> Semanales </span>
                      </a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link"  data-target="#modalbuscarmessumi" data-toggle="modal" id="reportesummen" href="">
                        <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                        <span class="sidebar-normal"> Mensuales </span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA ?>/?accion=salir" class="btn btn-success" role="button">Cerrar Sesión
              <i class="fa fa-sign-out" aria-hidden="true"></i>             
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Inicio de botones Modales  -->



    <!-- Inicio de botones Modales de tratamiento -->
    <div aria-hidden="true" aria-labelledby="ModalLabelDia" class="modal fade" id="modalbuscardiatra" role="dialog" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reported">
              Seleccione el día
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
              <span aria-hidden="true">
              </span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="diario" class="">Dia:</label>                        
                    <input type="text" class="datepicker1" name="diario" id="diario" value="<?php echo date("Y-n-j"); ?>" >
                  </div>
                </div>

              </div>



            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-info btn-sm btn-round" data-dismiss="modal" type="button">
              Cerrar
            </button>
            <button type="search" name="busquedadiatra" id="busquedadiatra" class="btn btn-success btn-sm btn-round">Iniciar Búsqueda</button>
          </div>
        </div>
      </div>
    </div>


    <div aria-hidden="true" aria-labelledby="ModalLabelSemana" class="modal fade" id="modalbuscarfechastra" role="dialog" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reported">
              Seleccione los tratamientos por semana:
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
              <span aria-hidden="true">
              </span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="fechasinitra" class="">Desde:</label>                        
                    <input type="text" class="datepicker1" name="fechasinitra" id="fechasinitra" value="<?php echo date("Y-n-j"); ?>" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="fechasfintra" class="">Hasta:</label>                        
                    <input type="text" class="datepicker1" name="fechasfintra" id="fechasfintra" value="<?php echo date("Y-n-j"); ?>" >
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-info btn-sm btn-round" data-dismiss="modal" type="button">
              Cerrar
            </button>
            <button type="search" name="busquedafechatra" id="busquedafechatra" class="btn btn-success btn-sm btn-round">Iniciar Búsqueda</button>
          </div>
        </div>
      </div>
    </div>





    <div aria-hidden="true" aria-labelledby="ModalLabelMes" class="modal fade" id="modalbuscarmestra" role="dialog" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reported">
              Seleccione el tratamiento por mes:
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
              <span aria-hidden="true">
              </span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="mesinitra" class="">Desde:</label>                        
                    <input type="text" class="datepicker1" name="mesinitra" id="mesinitra" value="<?php echo date("Y-n-j"); ?>" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="mesfintra" class="">Hasta:</label>                        
                    <input type="text" class="datepicker1" name="mesfintra" id="mesfintra" value="<?php echo date("Y-n-j"); ?>" >
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-info btn-sm btn-round" data-dismiss="modal" type="button">
              Cerrar
            </button>
            <button type="search" name="busquedamestra" id="busquedamestra" class="btn btn-success btn-sm btn-round">Iniciar Búsqueda</button>
          </div>
        </div>
      </div>
    </div>
    <!-- fin modal tratmiento -->


    <!-- Inicio de botones Modales de pruebas -->

    <div aria-hidden="true" aria-labelledby="ModalLabelDia" class="modal fade" id="modalbuscardiapru" role="dialog" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reported">
              Seleccione el día
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
              <span aria-hidden="true">
              </span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="diariopru" class="">Dia:</label>                        
                    <input type="text" class="datepicker1" name="diariopru" id="diariopru" value="<?php echo date("Y-n-j"); ?>" >
                  </div>
                </div>

              </div>



            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-info btn-sm btn-round" data-dismiss="modal" type="button">
              Cerrar
            </button>
            <button type="search" name="busquedadiapru" id="busquedadiapru" class="btn btn-success btn-sm btn-round">Iniciar Búsqueda</button>
          </div>
        </div>
      </div>
    </div>


    <div aria-hidden="true" aria-labelledby="ModalLabelSemana" class="modal fade" id="modalbuscarfechaspru" role="dialog" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reported">
              Seleccione las Pruebas Por Semana:
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
              <span aria-hidden="true">
              </span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="fechasini" class="">Desde:</label>                        
                    <input type="text" class="datepicker1" name="fechasini" id="fechasini" value="<?php echo date("Y-n-j"); ?>" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="fechasfin" class="">Hasta:</label>                        
                    <input type="text" class="datepicker1" name="fechasfin" id="fechasfin" value="<?php echo date("Y-n-j"); ?>" >
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-info btn-sm btn-round" data-dismiss="modal" type="button">
              Cerrar
            </button>
            <button type="search" name="busquedafechapru" id="busquedafechapru" class="btn btn-success btn-sm btn-round">Iniciar Búsqueda</button>
          </div>
        </div>
      </div>
    </div>

    <div aria-hidden="true" aria-labelledby="ModalLabelMes" class="modal fade" id="modalbuscarmespru" role="dialog" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reported">
              Seleccione las Pruebas Por Mes:
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
              <span aria-hidden="true">
              </span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="mesini1" class="">Desde mes:</label>                        
                    <input type="text" class="datepicker1" name="mesini1" id="mesini1" value="<?php echo date("Y-n-j"); ?>" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="mesfin1" class="">Hasta:</label>                        
                    <input type="text" class="datepicker1" name="mesfin1" id="mesfin1" value="<?php echo date("Y-n-j"); ?>" >
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-info btn-sm btn-round" data-dismiss="modal" type="button">
              Cerrar
            </button>
            <button type="search" name="busquedamespru" id="busquedamespru" class="btn btn-success btn-sm btn-round">Iniciar Búsqueda</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin botones Modales pruebas -->

    <!-- Inicio Modales Medicamento Suministrados por fecha   -->

    <div aria-hidden="true" aria-labelledby="ModalLabelDia" class="modal fade" id="modalbuscardiasumi" role="dialog" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reported">
              Seleccione por día
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
              <span aria-hidden="true">
              </span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="diariosumi" class="">Dia:</label>                        
                    <input type="text" class="datepicker1" name="diariosumi" id="diariosumi" value="<?php echo date("Y-n-j"); ?>" >
                  </div>
                </div>
              </div>
            </form>
          </div>

          <div class="modal-footer">
            <button class="btn btn-info btn-sm btn-round" data-dismiss="modal" type="button">
              Cerrar
            </button>
            <button type="search" name="busquedadiasumi" id="busquedadiasumi" class="btn btn-success btn-sm btn-round">Iniciar Búsqueda</button>
          </div>
        </div>
      </div>
    </div>   



    <div aria-hidden="true" aria-labelledby="ModalLabelMes" class="modal fade" id="modalmuscarsemanasumi" role="dialog" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reported">
              Seleccione Por Semana:
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
              <span aria-hidden="true">
              </span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="busquedaseminisumi" class="">Desde:</label>                        
                    <input type="text" class="datepicker1" name="busquedaseminisumi" id="busquedaseminisumi" value="<?php echo date("Y-n-j"); ?>" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="busquedasemfinsumi" class="">Hasta:</label>                        
                    <input type="text" class="datepicker1" name="busquedasemfinsumi" id="busquedasemfinsumi" value="<?php echo date("Y-n-j"); ?>" >
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-info btn-sm btn-round" data-dismiss="modal" type="button">
              Cerrar
            </button>
            <button type="search" name="busquedasemsumi" id="busquedasemsumi" class="btn btn-success btn-sm btn-round">Iniciar Búsqueda</button>
          </div>
        </div>
      </div>
    </div>

    <div aria-hidden="true" aria-labelledby="ModalLabelMes" class="modal fade" id="modalbuscarmessumi" role="dialog" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reported">
              Seleccione Por Mes:
            </h5>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
              <span aria-hidden="true">
              </span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="busquedamesinisumi" class="">Desde:</label>                        
                    <input type="text" class="datepicker1" name="busquedamesinisumi" id="busquedamesinisumi" value="<?php echo date("Y-n-j"); ?>" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="busquedamesfinsumi" class="">Hasta:</label>                        
                    <input type="text" class="datepicker1" name="busquedamesfinsumi" id="busquedamesfinsumi" value="<?php echo date("Y-n-j"); ?>" >
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-info btn-sm btn-round" data-dismiss="modal" type="button">
              Cerrar
            </button>
            <button type="search" name="busquedamessumi" id="busquedamessumi" class="btn btn-success btn-sm btn-round">Iniciar Búsqueda</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Fin Modales Medicamentos Suministrados por fecha   -->




    <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>

    <script> 

      $( document ).ready(function() {

        var $input = $( '.datepicker1' ).pickadate({

        selectMonths: true, // Creates a dropdown to control month
        selectYears: 200,
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
    min: new Date(2018,9,1),
    max: new Date(2060,12,31)

  }); 



        /* Inicio busqueda tratamiento por dia */
        $( "#busquedadiatra" ).on('click', function(event) {
          event.preventDefault();
          /* Act on the event */
          fecha= $('#diario').val();

          location.href="?accion=reporte&tipo=diariotra&fecha="+fecha;
        });
        /* Fin Busqueda por dia */

        /* Inicio busqueda por semanas */
        $( "#busquedafechatra" ).on('click', function(event) {
          event.preventDefault();
          /* Act on the event */
          fechasinitra= $('#fechasinitra').val();
          fechasfintra= $('#fechasfintra').val();

          location.href="?accion=reporte&tipo=fechastra&fechasinitra="+fechasinitra+"&fechasfintra="+fechasfintra;
        });

    /* Fin busqueda por semanas /*

    /* Inicio Busqueda tratamiento por meses */
    $( "#busquedamestra" ).on('click', function(event) {
      event.preventDefault();
      mesinitra= $('#mesinitra').val();
      mesfintra= $('#mesfintra').val();

      location.href="?accion=reporte&tipo=mestra&mesinitra="+mesinitra+"&mesfintra="+mesfintra;     

    });
    /* fin busqueda tratamiento por meses */



    /* Inicio busqueda de pruebas por dia */
    $( "#busquedadiapru" ).on('click', function(event) {
      event.preventDefault();
      /* Act on the event */
      fecha= $('#diariopru').val();

      location.href="?accion=reporte&tipo=diariopru&fecha="+fecha;
    });
    /* Fin Busqueda de pruebas por dia */

    /* Inicio busqueda de pruebas por semanas */
    $( "#busquedafechapru" ).on('click', function(event) {
      event.preventDefault();
      /* Act on the event */
      fechasini= $('#fechasini').val();
      fechasfin= $('#fechasfin').val();

      location.href="?accion=reporte&tipo=fechaspru&fechasini="+fechasini+"&fechasfin="+fechasfin;
    });

    /* Fin busqueda de pruebas por semanas /*

    /* Inicio Busqueda de pruebas por meses */
    $( "#busquedamespru" ).on('click', function(event) {
      event.preventDefault();
      mesini1= $('#mesini1').val();
      mesfin1= $('#mesfin1').val();

      location.href="?accion=reporte&tipo=mespru&mesini1="+mesini1+"&mesfin1="+mesfin1;     

    });
    /* fin busqueda de pruebas por meses */



    /* Inicio busqueda medicamento suministrado por dia */
    $( "#busquedadiasumi" ).on('click', function(event) {
      event.preventDefault();
      /* Act on the event */
      fecha= $('#diariosumi').val();      

      location.href="?accion=reporte&tipo=diariosumi&fecha="+fecha;
    });

    /* Fin busqueda medicamento suministrado por dia /*

    /* Inicio Busqueda medicamento suministrado por semanas*/
    $( "#busquedasemsumi" ).on('click', function(event) {
      event.preventDefault();
      busquedaseminisumi= $('#busquedaseminisumi').val();
      busquedasemfinsumi= $('#busquedasemfinsumi').val();


      location.href="?accion=reporte&tipo=semsumi&busquedaseminisumi="+busquedaseminisumi+"&busquedasemfinsumi="+busquedasemfinsumi;     

    });
    /* fin busqueda medicamento suministrado por semanas */

    /* Inicio Busqueda medicamento suministrado por meses*/
    $( "#busquedamessumi" ).on('click', function(event) {
      event.preventDefault();
      busquedamesinisumi= $('#busquedamesinisumi').val();
      busquedamesfinsumi= $('#busquedamesfinsumi').val();

      location.href="?accion=reporte&tipo=messumi&busquedamesinisumi="+busquedamesinisumi+"&busquedamesfinsumi="+busquedamesfinsumi;     

    });
    /* fin busqueda medicamento suministrado por meses */


  });
</script>






