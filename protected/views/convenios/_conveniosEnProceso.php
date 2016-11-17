		 <?php while(($row=$resultados->read())!==false) {  ?>
		 	<aside id='prueba' class='list-group-item'>
		 		<div class='row'>
		            <div class='col-sm-10'><?php echo $model->nombre_convenio; ?></div> 
				</div>

					 <div class='row'>
					 <div class='col-sm-8'>
					 	<ul>
						  <li>Estado Actual <small><?php echo $model->estado_actual_convenio; ?></small></li>
					 	</ul>
					 </div>

					  <div class='col-sm-4'>
						 <ul class='list-inline'>
						 <li><a href="<?php echo $this->createUrl("/convenios/updateConvenio")."&id=".$model->id_convenio; ?>" data-toggle='tooltip' title='Editar'><span class='glyphicon glyphicon-pencil'></span></a></li>
						 <li><a href="<?php echo $this->createUrl("/convenios/cambiarEstado")."&id=".$model->id_convenio; ?>" sdata-toggle='tooltip' title='Cambiar Estado'><span class='glyphicon glyphicon-refresh'></span></a></li>
						 </ul>
					
					 </div>


				</div>

			 </aside>
		   <?php  }	?>  

		  