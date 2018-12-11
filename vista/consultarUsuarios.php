
<div class="wrapper ">
 <?php require_once "vista/menu.php";?>

 <div class="main-panel">

  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand">Gestión de Usuarios</a>
      </div>


    </div>
  </nav>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title">Consulta de Usuarios</h4>
              <p class="card-category">Usuarios registrados en el sistema</p>
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

              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive datatables"><title></title>
                <table class="table display" data-toggle="table" id="usuario">
                  <thead class=" text-info">
                    <tr>
                      <td>
                        Fecha Creado
                      </td>
                      <td>
                        Nombre de Usuario
                      </td>
                      <td>
                        Clave
                      </td>
                      <td>
                        Nombres
                      </td>
                      <td>
                        Apellidos
                      </td>
                      <td>
                        Rol
                      </td>
                      <td>
                        Teléfono
                      </td>        
                      <td>
                        Email
                      </td>
                      <td>
                        Acciones
                      </td>  
                    </tr>
                  </thead>



                  <tbody>
                    <?php foreach ($datos as $usuario => $valor): ?>

                      <tr class="table-success">
                        <td>
                          <?php echo $valor->
                          fecha_creado; ?>
                        </td>
                        <td>
                          <?php echo $valor->
                          usuario_sistema; ?>
                        </td>
                        <td>                         
                          ******
                        </td>
                        <td>
                          <?php echo $valor->
                          nombre; ?>
                        </td>
                        <td>
                          <?php echo $valor->
                          apellido; ?>
                        </td>
                        <td>
                          <?php echo $valor->
                          id_rol; ?>
                        </td>
                        <td>
                         <?php echo $valor->
                         telefono_usuario; ?>
                       </td>
                       <td>
                        <?php echo $valor->
                        email_usuario; ?>
                      </td>
                      

                      <td class="td-actions text-right">


                        <!-- Boton para modificar registro-->
                        <button type="button" id="editar" class="btn btn-success btn-sm editar" data-original-title title value="<?php echo $valor->id_usuario_sistema; ?>">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

                        </button>


                        <!-- Boton para eliminar registro-->
                        <button type="button" class="btn btn-danger btn-sm eli" data-toggle="modal" data-target="#modalEliminar<?php echo $valor->id_usuario_sistema; ?>" id="eliminar1"  value="<?php echo $valor->id_usuario_sistema; ?>"><i class="fa fa-trash" aria-hidden="true"></i>

                        </button>

                      </td>
                      <!-- Modal para eliminar registro-->
                      <div class="modal fade" id="modalEliminar<?php echo $valor->id_usuario_sistema; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalEliminarLabel">¿Desea eliminar el registro?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"></span>
                              </button>
                            </div>
                            <div class="modal-body">


                              <span> <?php echo $valor->id_usuario_sistema; ?></span>
                              <?php echo $valor->cedula; ?>
                              <?php echo $valor->nombre; ?>
                              <?php echo $valor->apellido; ?>


                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success btn-sm btn-round" data-dismiss="modal">Cerrar</button>
                              <button type="button" id="eliminar<?php echo $valor->id_usuario_sistema; ?>" class="btn btn-danger btn-sm btn-round eliminar" value="<?php echo $valor->id_usuario_sistema; ?>"
                                >Eliminar</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- td para las acciones -->

                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <a  class="btn btn-danger btn-sm pull-right btn-round" role="button" href="<?php echo RUTA ?>/?accion=principal">Inicio</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php require_once "vista/pie.php";?>



<script type="text/javascript">

 $(document).ready(function() {
   $( ".editar" ).on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
    var id=$(this).val();

    location.href="?accion=editarUsuario&editarusuario=si&id_usuario_sistema="+id;

  });

   $( ".eliminar" ).on('click', function(event) {
     event.preventDefault();
     /* Act on the event */
     var id=$(this).val();

     $.ajax({
      type: "POST",
      url: "",
      data: 'eliminarregistro=si&id_usuario_sistema='+id,
      success: function(data) {
        $('.modal').remove();

        location.reload();
        //$('#paciente').DataTable().ajax.reload();
      }
    });
   });

   $('#usuario').DataTable( {

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


 });

</script>