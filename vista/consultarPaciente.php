
<body>

  <div class="wrapper ">
    <?php require_once "vista/menu.php";?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand">
              Gestión de Pacientes
            </a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">



          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">
                    Consulta de Pacientes
                  </h4>
                  <p class="card-category">
                    Ingrese N° de Cédula, Nombre o Apellido para la búsqueda
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </i>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive datatables">
                  <table class="table display tablapaciente" data-toggle="table"  id="paciente">
                    <thead class=" text-info">
                      <tr>
                        <td>
                          Cédula
                        </td>
                        <td>
                          Nombres
                        </td>
                        <td>
                          Apellidos
                        </td>
                        <td>
                          Teléfono
                        </td>
                        <td>
                          Sexo
                        </td>
                        <td>
                          Dirección
                        </td>
                        <td>
                          Peso (Kgs)
                        </td>
                        <td>
                          Fecha Nacimiento
                        </td>                        
                        <td class="text-right">
                          Acciones
                        </td>                        
                        <td>
                          Pruebas, Tratamientos, Detalles y Nvo Caso
                        </td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($datos as $paciente =>
                        $valor) :  ?>
                        <tr class="table-success">
                          <td>
                            <?php echo $valor->
                            cedula_paciente; ?>
                          </td>
                          <td>
                            <?php echo $valor->
                            nombre_paciente; ?>
                          </td>
                          <td>
                            <?php echo $valor->
                            apellido_paciente; ?>
                          </td>
                          <td>
                            <?php echo $valor->
                            telefono_paciente; ?>
                          </td>
                          <td>
                            <?php echo $valor->
                            sexo_paciente; ?>
                          </td>
                          <td>
                            <?php echo $valor->
                            direccion_paciente; ?>
                          </td>
                          <td>
                            <?php echo $valor->
                            peso_paciente; ?>
                          </td>
                          <td>
                            <?php echo $valor->
                            fecha_nacimiento; ?>
                          </td>
                          <!-- td para las acciones -->
                          


                          <td class="td-actions text-right">
                            <!-- Boton para modificar registro-->
                            <button class="btn btn-success btn-xs btn-round editar" id="editar" type="button" value="<?php echo $valor->id_paciente; ?>">
                              <i aria-hidden="true" class="fa fa-pencil-square-o"></i>
                            </button>
                            <!-- Boton modal para prueba-->
                            <?php if ($_SESSION['descripcion']=='administrador'): ?>
                              <!-- Boton para eliminar registro
                              <button class="btn btn-danger btn-xs btn-round eli" data-target="#modalEliminar<?php //echo $valor->id_paciente; ?>" data-toggle="modal" id="eliminar1" type="button" value="<?php// echo $valor->id_paciente; ?>">
                                <i aria-hidden="true" class="fa fa-trash">
                                </i>
                              </button>-->
                            </td>
                            <!-- fin del  td para las acciones -->
                          <?php endif ?>
                          <!--  td para tratamiento medico y prueba   -->
                          <td>
                            <button class="btn btn-warning btn-xs btn-round" data-target="#pruebaModal<?php echo $valor->id_paciente; ?>" data-toggle="modal" id="prueba" type="button" value="<?php echo $valor->id_paciente; ?>">
                              <i class="fa fa-stethoscope" aria-hidden="true"></i>
                              
                            </button>
                            <button class="btn btn-primary btn-xs btn-round" data-target="#tratamientoModal<?php echo $valor->id_paciente; ?>" data-toggle="modal" id="tratamiento" type="button" value="<?php echo $valor->id_paciente; ?>">
                              <i class="fa fa-user-md" aria-hidden="true"></i>
                              
                            </button>
                            <!-- Boton modal para detalles -->
                            <button class="btn btn-info btn-xs btn-round detalle" data-target="#detalleModal<?php echo $valor->id_paciente; ?>" data-toggle="modal" id="detalle1<?php echo $valor->id_paciente; ?>" type="button" value="<?php echo $valor->id_paciente; ?>">
                              <i class="fa fa-info-circle" aria-hidden="true"></i>
                              
                            </button>
                            <!-- cierre boton modal para detalles -->
                            <!-- Boton Modal Para Casos  -->
                            <button class="btn btn-secondary btn-xs btn-round caso" data-target="#casoModal<?php echo $valor->id_paciente; ?>" data-toggle="modal" id="caso" type="button" value="<?php echo $valor->id_paciente; ?>">
                              <i class="fa fa-plus" aria-hidden="true"></i>
                              
                            </button>
                            <!-- Fin Boton Modal Recaida -->
                          </td>
                          <!-- cierre td para tratamiento medico y prueba  -->
                        </tr>
                      <?php endforeach; ?>

                    </tbody>
                  </table>
                </div>
                <input type="hidden" name="registroUsuario" value="si">      
                <a  class="btn btn-danger btn-sm pull-right btn-round" role="button" href="<?php echo RUTA ?>/?accion=principal">Inicio</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>    



    <?php foreach ($datos as $paciente =>$valor) : ?>

      <!-- Modal para eliminar registro-->
      <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modalEliminar<?php echo $valor->id_paciente; ?>" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEliminarLabel">
                ¿Desea eliminar el registro?
              </h5>
              <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                <span aria-hidden="true">
                </span>
              </button>
            </div>
            <div class="modal-body">
              <span>
                <?php echo $valor->
                id_paciente; ?>
              </span>
              <?php echo $valor->
              cedula_paciente; ?>
              <?php echo $valor->
              nombre_paciente; ?>
              <?php echo $valor->
              apellido_paciente; ?>
            </div>
            <div class="modal-footer">
              <button class="btn btn-success btn-sm btn-round" data-dismiss="modal" type="button">
                Cerrar
              </button>
              <button class="btn btn-danger btn-sm pull-right btn-round eliminar" id="eliminar<?php echo $valor->id_paciente; ?>" type="button" value="<?php echo $valor->id_paciente; ?>">
                Eliminar
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin de Modal Para eliminar registro -->

      <!-- Modal para tratamiento-->
      <div aria-hidden="true" aria-labelledby="tratamientoModal" class="modal fade" id="tratamientoModal<?php echo $valor->id_paciente; ?>" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tratamientoModal">
                Registrar tratamiento al paciente:
                <?php echo $valor->
                cedula_paciente; ?>
                <?php echo $valor->
                nombre_paciente; ?>
                <?php echo $valor->
                apellido_paciente; ?>
              </h5>
            </div>
            <form action="" id="form_tratamiento" method="post">
              <div class="row">
                <div class="form-group label-floating has-success col-lg-6 col-md-6 col-sm-6">
                  <div class="modal-body">
                    <label class="bmd-label-floating" for="tipo_busqueda">
                      Medicamentos:
                    </label>
                    <select class="form-control" data-style="btn btn-success btn-round" id="nombre" name="nombre" type="">
                      <option selected="">
                        Seleccione
                      </option>
                      <option value="Cloroquina">
                        Cloroquina
                      </option>
                      <option value="Primaquina">
                        Primaquina 5mg
                      </option>
                      <option value="Primaquina 15mg">
                        Primaquina 15mg
                      </option>
                      <option value="Artemether + Lumenfartin">
                        Artemether + Lumenfartin
                      </option>
                      <option value="Primaquina 7,5mg">
                        Primaquina 7,5mg
                      </option>
                      <option value="Quinina Amp">
                        Quinina Amp
                      </option>
                      <option value="Artesunato Amp">
                        Artesunato Amp
                      </option>
                      <option value="Artemether">
                        Artemether
                      </option>
                    </select>
                  </div>
                </div>
                <div class="form-group label-floating has-success col-lg-6 col-md-6 col-sm-6">
                  <div class="modal-body">
                    <label class="label-control has-success" for="tipo_busqueda">
                      Cantidad:
                    </label>
                    <input class="form-control" id="cantidad" name="cantidad" type="number" />

                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group label-floating has-success col-lg-6 col-md-6 col-sm-6">
                  <div class="modal-body">
                    <label class="label-control has-success">
                      Fecha Suministrado:
                    </label>
                    <input type="text" id="fecha_suministrado" name="fecha_suministrado" class="datepicker" value=""/>
                  </div>
                </div>
              </div>
              <input name="guardartratamiento" type="hidden" value="si">
              <input name="id_paciente" type="hidden" value="<?php echo $valor->id_paciente; ?>">
              <div class="modal-footer">
                <button class="btn btn-secondary btn-sm" data-dismiss="modal" type="button">
                  Cerrar
                </button>
                <button class="btn btn-success btn-sm" id="guardartratamiento" type="submit" value="<?php echo $valor->id_paciente; ?>">
                  Guardar
                </button>
              </div>

            </form>
          </div>
        </div>
      </div>
      <!--fin de modal tratamiento -->

      <!-- Modal para Detalles-->
      <div aria-hidden="true" aria-labelledby="detalleModal" class="modal fade bd-detalles-modal-lg" id="detalleModal<?php echo $valor->id_paciente; ?>" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="detalleModal">
                Detalles del Paciente
                <?php echo $valor->
                cedula_paciente; ?>
                <?php echo $valor->
                nombre_paciente; ?>
                <?php echo $valor->
                apellido_paciente; ?>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"> 
              <div class="row">
                <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
                  <label class="bmd-label-floating">N° de cédula</label>                        
                  <input type="text" name="cedula" id="cedula" class="form-control"
                  value="<?php echo $valor->
                  cedula_paciente; ?>" disabled>
                </div>                

                <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
                  <label class="bmd-label-floating">Nombres</label>
                  <input type="text" name="nombre" id="nombre" class="form-control"
                  value="<?php echo $valor->
                  nombre_paciente; ?>" disabled>                            
                </div>

                <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">                   
                  <label class="bmd-label-floating">Apellidos</label>
                  <input type="text" name="apellido" id="apellido" class="form-control"
                  value="<?php echo $valor->
                  apellido_paciente; ?>" disabled>                             
                </div>
              </div>

              <div class="row">
                <div class="form-group label-floating has-success col-lg-6 col-md-6 col-sm-6">             
                  <label class="bmd-label-floating">Correo</label>
                  <input type="email" name="email" id="email" class="form-control"
                  value="<?php echo $valor->
                  email_paciente; ?>" disabled>                    
                </div>

                <div class="form-group label-floating has-success col-lg-6 col-md-6 col-sm-6">                
                  <label for="direccion" class="bmd-label-floating">Dirección</label>
                  <input type="text" class="form-control" name="direccion_paciente" id="direccion_paciente" 
                  value="<?php echo $valor->
                  direccion_paciente; ?>" disabled>                            
                </div>
              </div>

              <div class="row">
                <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">               
                  <label for="estadodet" class="bmd-label-floating">Estado</label>
                  <input type="text" class="form-control" name="estadodet" id="estadodet" 
                  value="<?php echo $valor->
                  estado; ?>" disabled>            
                </div>

                <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
                  <label for="municipiodet" class="bmd-label-floating">Municipio</label>
                  <input type="text" class="form-control" name="municipiodet" id="municipiodet" 
                  value="<?php echo $valor->
                  municipio; ?>" disabled>
                </div>        

                <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
                  <label for="parroquiadet" class="bmd-label-floating">Parroquia</label>
                  <input type="text" class="form-control" name="parroquiadet" id="parroquiadet" 
                  value="<?php echo $valor->
                  parroquia; ?>" disabled>
                </div>          
              </div>

              <div class="row">
                <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">                                        
                  <label for="ocupacion" class="bmd-label-floating">Ocupación</label>
                  <input type="text" class="form-control" name="ocupacion" id="ocupacion"
                  value="<?php echo $valor->
                  ocupacion; ?>" disabled>         
                </div>

                <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">                       
                 <label for="telefonomovil" type="" class="bmd-label-floating">Teléfono</label>
                 <input type="text" class="form-control" name="telefono_paciente" id="telefono_paciente"
                 value="<?php echo $valor->
                 telefono_paciente; ?>" disabled>                            
               </div>

               <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">             
                <label for="peso_paciente" class="bmd-label-floating">Peso</label>
                <input type="number" class="form-control" name="peso_paciente" id="peso_paciente" 
                value="<?php echo $valor->
                peso_paciente; ?>" disabled>                               
              </div>
            </div>

            <div class="row">            
              <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
               <label for="estadocivil_paciente" class="bmd-label-floating">Estado Civil</label>
               <input type="text" class="form-control" name="estadocivil_paciente" id="estadocivil_paciente" 
               value="<?php echo $valor->
               estadocivil_paciente; ?>" disabled>
             </div>           

             <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
               <label for="nacionalidad_paciente" class="bmd-label-floating">Nacionalidad</label>
               <input type="text" class="form-control" name="nacionalidad_paciente" id="nacionalidad_paciente" 
               value="<?php echo $valor->
               nacionalidad_paciente; ?>" disabled>
             </div>         

             <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
              <label for="etnia" class="bmd-label-floating">Etnia</label>
              <input type="text" name="etnia_paciente" id="etnia_paciente" class="form-control" 
              value="<?php echo $valor->
              etnia_paciente; ?>" disabled>
            </div>       
          </div>

          <div class="row">
            <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
              <label for="embarazada" class="bmd-label-floating">Embarazada</label>
              <input type="text" class="form-control" name="embarazada" id="embarazada" 
              value="<?php echo $valor->
              embarazada; ?>" disabled>
            </div>
            <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
              <label for="madre_lactante" class="bmd-label-floating">Madre Lactante</label>
              <input type="text" class="form-control" name="madre_lactante" id="madre_lactante" 
              value="<?php echo $valor->
              madre_lactante; ?>" disabled>
            </div>
            <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
              <label for="lactante" class="bmd-label-floating">lactante</label>
              <input type="text" class="form-control" name="lactante" id="lactante" 
              value="<?php echo $valor->
              lactante; ?>" disabled>
            </div>  
          </div>

          <div class="row">
            <div class="form-group label-floating has-success col-lg-12 col-md-12 col-sm-12">           
             <label for="tipo_busqueda" class="bmd-label-floating">N° de Caso</label>
             <button class="btn btn-success btn-sm detallesnumcaso" id="detallesnumcasos" type="button" value="<?php echo $valor->id_paciente; ?>">
              Mostrar N° de Caso
            </button>
          </div>
          <div id="numcaso<?php echo $valor->id_paciente; ?>"></div>                      
        </div>

        <div class="row">
          <div class="form-group label-floating has-success col-lg-12 col-md-12 col-sm-12">         
            <label for="tipo_prueba" class="bmd-label-floating">Pruebas realizadas</label>
            <button class="btn btn-success btn-sm detallespruebas" id="detallespruebas" type="button" value="<?php echo $valor->id_paciente; ?>">
              Buscar Pruebas
            </button>
          </div>                
          <div id="pruebastabla<?php echo $valor->id_paciente; ?>"></div>           

        </div>


        <div class="row">
          <div class="form-group label-floating has-success col-lg-12 col-md-12 col-sm-12">                         

            <label for="tipo_busqueda" class="bmd-label-floating">Tratamientos realizados</label>
            <button class="btn btn-success btn-sm detallestratamiento" id="detallestratamiento" type="button" value="<?php echo $valor->id_paciente; ?>">
              Buscar Tratamientos
            </button>
          </div>
          <div id="tratamientostabla<?php echo $valor->id_paciente; ?>"></div>


        </div>

      </div>      

      <input name="detalles" type="hidden" value="si">
      <input name="detallespac" type="hidden" value="<?php echo $valor->id_paciente; ?>">
      <div class="modal-footer">
        <button class="btn btn-secondary btn-sm" data-dismiss="modal" type="button">
          Cerrar
        </button>

      </div>
    </div>


  </div>
</div>
</div>
<!--fin de modal Detalles -->
<!-- Modal para prueba-->
<div aria-hidden="true" aria-labelledby="pruebaModalTitle" class="modal fade bd-prueba-modal-lg" id="pruebaModal<?php echo $valor->id_paciente; ?>" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pruebaModalTitle">
          Registrar prueba al paciente:
          <?php echo $valor->
          cedula_paciente; ?>
          <?php echo $valor->
          nombre_paciente; ?>
          <?php echo $valor->
          apellido_paciente; ?>
        </h5>
      </div>
      <form action="" id="form_prueba" method="post" >
        <div class="row">

          <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
            <div class="modal-body">
              <label class="bmd-label-floating" for="tipo_busqueda">
                Tipo de Prueba:
              </label>
              <select class="form-control" data-style="btn btn-success btn-round" id="tipo_prueba" name="tipo_prueba" type="">
                <option selected="">
                  Seleccione
                </option>
                <option value="Lámina GGyE">
                  Lámina GGyE
                </option>
                <option value="PDRM">
                  PDRM
                </option>
              </select>
            </div>
          </div>
          <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
            <div class="modal-body">
              <label class="bmd-label-floating" for="tipo_busqueda">
                Tipo de Búsqueda:
              </label>
              <select class="form-control" data-style="btn btn-success btn-round" id="tipo_busqueda" name="tipo_busqueda" type="">
                <option selected="">
                  Seleccione
                </option>
                <option value="Pasiva">
                  Pasiva
                </option>
                <option value="Activa">
                  Activa
                </option>
              </select>
            </div>
          </div>
          <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
            <div class="modal-body">
              <label class="bmd-label-floating" for="especie_plasmodium">
                Especie Plasmodium
              </label>
              <select class="form-control" data-style="btn btn-success btn-round" id="especie_plasmodium" name="especie_plasmodium" type="">
                <option selected="">
                  Seleccione
                </option>
                <option value="Plasmodium falciparum">
                  Plasmodium falciparum
                </option>
                <option value="Plasmodium vivax">
                  Plasmodium vivax
                </option>
                <option value="Mixto">
                  Mixto
                </option>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
            <div class="modal-body">
              <label class="bmd-label-floating" for="codigo_notificacion">
                Código Notif.
              </label>
              <input class="form-control" id="codigo_notificacion" name="codigo_notificacion" type="text">
            </input>
          </div>
        </div>

        <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
          <div class="modal-body">
            <label class="bmd-label-floating" for="numero_lamina_pdrm">
              N° Lámina PDRM
            </label>
            <input class="form-control" id="numero_lamina_pdrm" name="numero_lamina_pdrm" type="text">

          </div>
        </div>
      </div>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          Toma de Lámina o PDRM:
        </h5>
      </div>
      <div class="row">
        <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
          <div class="modal-body">
            <label class="label-control">
              Fecha Inicio Fiebre:
            </label>
            <input class="datepicker" id="fecha_inicio_fiebre" name="fecha_inicio_fiebre" type="text" value=""/>
          </div>
        </div>
        <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
          <div class="modal-body">
            <label class="label-control">
              Fecha Toma de Lámina:
            </label>
            <input class="datepicker" id="fecha_toma_lamina" name="fecha_toma_lamina" type="text" value=""/>
          </div>
        </div>
        <div class="form-group label-floating has-success col-lg-4 col-md-4 col-sm-4">
          <div class="modal-body">
            <label class="label-control" for="lugar">
              Lugar:
            </label>
            <input class="form-control has-success" id="lugar" name="lugar_toma_lamina" type="text">

          </div>
        </div>
      </div>

      <input name="guardarregistroprueba" type="hidden" value="si" />
      <input name="id" type="hidden" value="<?php echo $valor->id_paciente; ?>" />
      <div class="modal-footer">
        <button class="btn btn-secondary btn-sm" data-dismiss="modal" type="button">
          Cerrar
        </button>
        <button class="btn btn-success btn-sm" id="guardarregistroprueba" type="submit" value="<?php echo $valor->id_paciente; ?>">
          Guardar
        </button>
      </div>
    </form>
  </div>
</div>

</div>
<!--fin de modal prueba -->

<!-- Inicio Modal Caso  -->
<div class="modal fade bd-recaida-modal-lg" id="casoModal<?php echo $valor->id_paciente; ?>" tabindex="-1" role="dialog" aria-labelledby="casoModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="casoModal">Nuevo Caso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="form_caso1" method="post" >
          <div class="row">       
            <div class="form-group label-floating has-success col-md-6">
              <label for="clasificacion_caso" class="bmd-label-floating">Clasificación del Caso</label>
              <input type="text"  class="form-control" name="clasificacion_caso" id="clasificacion_caso" >
            </div>
            <div class="form-group label-floating has-success col-lg-6 col-md-6 col-sm-6">
              <label for="numero_caso" class="bmd-label-floating">Número del Caso</label>

              <input type="number" class="form-control" name="numero_caso" id="numero_caso" >

            </div>            
          </div>

          <div class="row">         
            <div class="form-group label-floating has-success col-lg-6 col-md-6 col-sm-6">
              <div class="col-md-6">
                Seleccione en caso de muerte: <span class="required">*</span><br>
                <input class="muerte" type="radio" name="muerte"  id="si" value="si">
                <label for="Si">Si</label>
                <input class="muerte" type="radio"  name="muerte" id="no" value="no" />
                <label for="No">No</label>                
              </div>
            </div>
            <div class="form-group label-floating has-success col-lg-6 col-md-6 col-sm-6">
              <div class="col-md-6">
                Seleccione en caso de recaída <span class="required">*</span><br>
                <input class="recaida" type="radio" name="recaida"  id="si" value="si">
                <label for="Si">Si</label>
                <input class="recaida" type="radio"  name="recaida" id="no" value="no" />
                <label for="No">No</label>                
              </div>
            </div>
          </div>
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">
              Origen Probable de Infección
            </h5>
          </div>
          <div class="row">
            <div class="modal-body">
              <div class="form-group label-floating has-success col-lg-8 col-sm-8 col-md-8">
                <label class="bmd-label-floating" for="direccion">
                  Dirección
                </label>
                <input class="form-control" id="direccion" name="direccion" type="text">

              </div>
            </div>
          </div>
          <div class="form-row">
            <div class=" col-lg-4 col-md-4 col-sm-4">
              <select class="form-control estado" type="" id="estado<?php echo $valor->id_paciente; ?>" name="estado" data-style="btn-success">
                <option disabled selected>Estado</option>
                <?php foreach ($datosEstados as $estado => $fila) {?>
                  <option value="<?php echo $fila->id_estado ?>"><?php echo $fila->nombre ?></option>
                <?php }?>
              </select>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
              <select class="form-control" type="" id="cbx_municipio<?php echo $valor->id_paciente; ?>" name="municipio" data-style="btn btn-success btn-round">
                <option disabled selected>Municipio</option>
              </select>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
              <select class="form-control" id="cbx_parroquia<?php echo $valor->id_paciente; ?>" name="parroquia" data-style="btn btn-success btn-round">
                <option disabled selected>Parroquia</option>
              </select>
            </div>
          </div>

          <div class="modal-footer">

            <input name="guardarcaso" type="hidden" value="si" />
            <input name="id_paciente" type="hidden" value="<?php echo $valor->id_paciente; ?>" />
            <div class="modal-footer">
              <button class="btn btn-secondary btn-sm" data-dismiss="modal" type="button">
                Cerrar
              </button>
              <button class="btn btn-success btn-sm" id="guardarcasoboton" type="submit" value="<?php echo $valor->id_paciente; ?>">
                Guardar Caso
              </button>
            </div>
          </div>                        
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Fin Modal Recaida    -->


<?php endforeach;?>


<?php require_once "vista/pie.php";?>


<script type="text/javascript">
  $(document).ready(function() {

   // var pacienteElegido=$('.caso').val();

   $( ".eliminar" ).on('click', function(event) {
     event.preventDefault();
     /* Act on the event */
     var id=$(this).val();
     $.ajax({
      type: "POST",
      url: "",
      data: 'eliminarregistro=si&id_paciente='+id,
      success: function(data) {
        $('.modal').remove();
        location.reload();
      }
    });

   });

   $( ".editar" ).on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    var id=$(this).val();
    location.href="?accion=editarPaciente&editarregistro=si&id_paciente="+id;

  });


   $('#paciente').DataTable( {
    "language": {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior",
        "pagingType": "scrolling",

      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }

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

   $("#form_caso1").on( "submit", function( event ) {
    event.preventDefault();
    id= $('#caso').val();
    var dataString = $('#form_caso1').serialize();
    //alert('Datos serializados: '+dataString);
    $.ajax({
      type: "POST",
      url: "",
      data: dataString,
      success: function(data) {
        alert("Caso al Paciente "+id+" Registrado Exitosamente!");
        $('.modal').remove();
        console.log(data);
        window.location='?accion=consultarPaciente';
      }
    });
  });

   $(".detallesnumcaso").on('click', function () {
    pacienteElegido=$(this).val();
    $( "#numcaso"+pacienteElegido ).toggle();
    $.get("?accion=numeroCaso",
      { pacienteElegido: pacienteElegido },
      function(data){
        console.log(data);
        $("#numcaso"+pacienteElegido).html(data);

      });
  });

   $(".detallespruebas").on('click', function () {
    pacienteElegido=$(this).val();
    $( "#pruebastabla"+pacienteElegido ).toggle();
    $.get("?accion=pruebas",
      { pacienteElegido: pacienteElegido },
      function(data){
        console.log(data);
        $("#pruebastabla"+pacienteElegido).html(data);
      });
  });

   $(".detallestratamiento").on('click', function () {
    pacienteElegido=$(this).val();
    $( "#tratamientostabla"+pacienteElegido ).toggle();
    $.get("?accion=tratamientos",
      { pacienteElegido: pacienteElegido },
      function(data){
        console.log(data);
        $("#tratamientostabla"+pacienteElegido).html(data);
      });

  });

   $('body').on("click", ".caso", function(event) {
    var pacienteElegido=$('.caso').val();
    //alert(pacienteElegido);
    $("#estado"+pacienteElegido+"").on('change', function () {

      $("#estado"+pacienteElegido+" option:selected").each(function () {
        elegido=$(this).val();
        $.get("?accion=municipio",
          { elegido: elegido },
          function(data){
            console.log(data);
            $("#cbx_municipio"+pacienteElegido+"").html(data);
          });

      });
    });

    $("#cbx_municipio"+pacienteElegido+"").on('change', function () {
      $("#cbx_municipio"+pacienteElegido+" option:selected").each(function () {
        elegido=$(this).val();
            //alert(elegido);
            $.get("?accion=parroquia",
              { elegido: elegido },
              function(data){
                console.log(data);
                $("#cbx_parroquia"+pacienteElegido+"").html(data);
              });
          });
    });
  });



   $( "#form_prueba" ).on( "submit", function( event ) {

    event.preventDefault();
    id= $('#prueba').val();

    var dataString = $('#form_prueba').serialize();

      //alert('Datos serializados: '+dataString);

      $.ajax({
        type: "POST",
        url: "",
        data: dataString,
        success: function(data) {

          console.log(data);
          alert("¡Prueba al Paciente "+id+" Registrada Exitosamente!");
          $('.modal').remove();
          
          window.location='?accion=consultarPaciente';
        }
      });
    });

   $( "#form_tratamiento" ).on( "submit", function( event ) {

    event.preventDefault();
    id= $('#tratamiento').val();
    var dataString = $('#form_tratamiento').serialize();

      //alert('Datos serializados: '+dataString);

      $.ajax({
        type: "POST",
        url: "",
        data: dataString,
        success: function(data) {

          alert("Tratamiento al Paciente "+id+" Registrada Exitosamente!");
          $('.modal').remove();
          console.log(data);
          window.location='?accion=consultarPaciente';
        }
      });
    });






 });
</script>

</body>
