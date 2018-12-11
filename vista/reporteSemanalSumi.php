

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-success">
        <h4 class="card-title">
          Reporte de Medicinas Totales Entregadas Desde: <?php echo $busquedaseminisumi. " Hasta: " .$busquedasemfinsumi ?>
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
      <div class="table-responsive datatables"><title class="semsumi">Reportes de Medicinas Totales Entregadas Desde: <?php echo $busquedaseminisumi. " Hasta: " .$busquedasemfinsumi ?></title>
        <table class="table display" data-toggle="table" id="reporte1">
          <thead class=" text-info">
            <tr>              
              <td>
                Medicina 
              </td>
              <td>
                Total
              </td>
              <td>
                Fecha
              </td>
              
              


            </tr>
          </thead>


          <tbody>
            <?php
            if (!isset ($datosreportesemsumi)){ ?>

              <tr class="table-success">
                <td colspan="3">
                  No hay Datos que Mostrar
                </td>          

                
              </tr>
            <?php      }else{ 

              foreach ($datosreportesemsumi as $paciente =>$valor) :   ?>

                <tr class="table-success">
                  <td>
                    <?php echo $valor["medicina"]
                    ; ?>
                  </td>
                  <td>
                    <?php echo $valor["total"]
                    ; ?>
                  </td>
                  <td>
                    <?php echo $valor["fecha"]
                    ; ?>
                  </td>


                </tr>

                <!-- td para las acciones -->

              <?php endforeach; 
            } 
            ?>

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

  var semsumi = $('.semsumi').text();
  //console.log(fechapru);

  $('#reporte1').DataTable( {

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
    messageTop: semsumi,    
    download: 'open',
    orientation: 'landscape',
    pageSize: 'LEGAL'
  },
  {
    extend: 'excelHtml5',
    title: 'Sistema Web Dirección de Salud Ambiental',
    messageTop: semsumi, 
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