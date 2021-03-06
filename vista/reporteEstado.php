

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-success">
        <h4 class="card-title">
          Reporte por Estados 
        </h4>

      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-success card-header-icon">
        <div class="card-icon">
          <i class="fa fa-print" aria-hidden="true"></i>
        </i>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive datatables"><title class="fechapru">Reporte por Estados</title>
        <table class="table display" data-toggle="table" id="reporte">
          <thead class=" text-info">
            <tr>              
              <td>
                Estado 
              </td>
              <td>
                Especie Plasmodium
              </td>
              <td>
                Total Pacientes
              </td>          
              
            </tr>
          </thead>


          <tbody>
            <?php
            foreach ($datosreporteestado as $paciente =>
              $valor) :   ?>

              <tr class="table-success">
                <td>
                  <?php echo $valor["estado"]
                  ; ?>
                </td>
                <td>
                  <?php echo $valor["especie_plasmodium"]
                  ; ?>
                </td>
                <td>
                  <?php echo $valor["total"]
                  ; ?>
                </td>

                
                
              </tr>

              <!-- td para las acciones -->

            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>




<a  class="btn btn-danger btn-sm pull-right btn-round" role="button" href="<?php echo RUTA ?>/?accion=principal">Inicio</a>

<?php require_once "vista/pie.php";?>



<script type="text/javascript">

 $(document).ready(function() {

  var fechapru = $('.fechapru').text();
  //console.log(fechapru);

  $('#reporte').DataTable( {

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
  },
  dom: 'Bfrtip',
  buttons: [
  {
    extend: 'pdfHtml5',
    title: 'Sistema Web Dirección de Salud Ambiental',
    text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
    messageTop: fechapru,    
    download: 'open',
    orientation: 'landscape',
    pageSize: 'LETTER'
  },
  {
    extend: 'excelHtml5',
    title: 'Sistema Web Dirección de Salud Ambiental',
    messageTop: 'Reporte por Estados', 
    text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
    customize: function( xlsx ) {
      var sheet = xlsx.xl.worksheets['sheet1.xml'];
      $('row:first c', sheet).attr( 's', '42' );
    }
  }
  ],
  


});

  
});

</script>