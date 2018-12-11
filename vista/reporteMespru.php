

<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header card-header-success">
				<h4 class="card-title">
					Reporte Mensual de las Pruebas Realizadas Desde: <?php echo $mesini1. " Hasta: " .$mesfin1 ?>
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
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive datatables"><title class="mensualpru">Reporte Mensual de las Pruebas Realizadas Desde: <?php echo $mesini1. " Hasta: " .$mesfin1 ?></title>
					<table class="table display" data-toggle="table" id="reporte">
						<thead class=" text-info">
							<tr>
								<td>
									Fecha Creado
								</td>
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
								<td>
									Tipo de Prueba
								</td>
								<td>
									Código de Notificación
								</td>
								<td>
									Número de Lámina
								</td>     
								<td>
									Especie de Plasmodium
								</td>
								<td>
									Fecha Inicio fiebre
								</td>
								<td>
									Fecha Toma Lámina
								</td>
								<td>
									Lugar Toma Lámina
								</td>      
							</tr>
						</thead>



						<tbody>
							<?php
							foreach ($datosreportemespru as $paciente =>
								$valor) :   ?>

								<tr class="table-success">
									<td>
										<?php echo $valor["fecha_creado"]
										; ?>
									</td>
									<td>
										<?php echo $valor["cedula_paciente"]
										; ?>
									</td>
									<td>
										<?php echo $valor["nombre_paciente"]
										; ?>

									</td>
									<td>
										<?php echo $valor["apellido_paciente"]
										; ?>
									</td>
									<td>
										<?php echo $valor["telefono_paciente"]
										; ?>
									</td>
									<td>
										<?php echo $valor["sexo_paciente"]
										; ?>
									</td>
									<td>
										<?php echo $valor["direccion_paciente"]
										; ?>
									</td>
									<td>
										<?php echo $valor["peso_paciente"]
										; ?>
									</td>
									<td>
										<?php echo $valor["fecha_nacimiento"]
										; ?>
									</td>
									<td>
										<?php echo $valor["tipo_prueba"]
										; ?>
									</td>
									<td>
										<?php echo $valor["codigo_notificacion"]
										; ?>
									</td>
									<td>
										<?php echo $valor["numero_lamina_pdrm"]
										; ?>
									</td>
									<td>
										<?php echo $valor["especie_plasmodium"]
										; ?>
									</td>
									<td>
										<?php echo $valor["fecha_inicio_fiebre"]
										; ?>
									</td>
									<td>
										<?php echo $valor["fecha_toma_lamina"]
										; ?>
									</td>
									<td>
										<?php echo $valor["lugar_toma_lamina"]
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

		var mensualpru = $('.mensualpru').text();

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
				messageTop: mensualpru,     
				download: 'open',
				orientation: 'landscape',
				pageSize: 'LEGAL'
			},
			{
				extend: 'excelHtml5',
				title: 'Sistema Web Dirección de Salud Ambiental',
				messageTop: mensualpru,
				text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
				customize: function( xlsx ) {
					var sheet = xlsx.xl.worksheets['sheet1.xml'];
					$('row:first c', sheet).attr( 's', '42' );
				}
			}
			] 


		});


	});

</script>