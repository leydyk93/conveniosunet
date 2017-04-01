		 <?php while(($row=$resultados->read())!==false) {  ?>
		 	<aside id='prueba' class='list-group-item'>
		 		<div class='row'>
		            <div class='col-sm-10'><p  class='text-info'><?php echo $model->nombre_convenio; ?></p></div> 
				</div>
				 <div class='row'>
					 <div class='col-sm-8'>
					 	<ul>
						  <li><strong>Estado Actual: </strong><small><?php echo $model->estado_actual_convenio; ?></small></li>
					 	</ul>
					 </div>

					  <div class='col-sm-4'>
						 <ul class='list-inline'>
						 <li><a href="<?php echo $this->createUrl("/convenios/updateConvenio")."&id=".$model->id_convenio; ?>" data-toggle='tooltip' title='Editar'><span class='glyphicon glyphicon-pencil'></span></a></li>
						 <li><a href="<?php echo $this->createUrl("/convenios/cambiarEstado")."&id=".$model->id_convenio; ?>" sdata-toggle='tooltip' title='Cambiar Estado'><span class='glyphicon glyphicon-refresh'></span></a></li>
	           <li><a href="<?php echo $this->createUrl("/convenios/eliminar",array('id'=>$model->id_convenio)); ?>" onclick='return confirm("Esta seguro de eliminar el convenio");' data-toggle='tooltip' title='Eliminar'><span class='glyphicon glyphicon-trash'></span></a></li>
						 </ul>
					
					 </div>


				</div>

			 </aside>
		   <?php  }	?> 
		
			<?php if($paginas>0){ ?>

		   	<nav class="text-right" aria-label="Page navigation">

				<ul class="pagination pagination-sm">

			<?php  
				if($iniciopag>1){
				  $valor=$iniciopag-1;  
			?>				
				
					  <li>
					      <a href="javascript:void(0)" aria-label="Previous"  onclick="ConvenioEstado(<?php echo $valor; ?>)">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>

			<?php  }else{ ?>	
						<li class="disabled">
					      <a href="" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
			<?php  } ?>	
			
			<?php  for($i=1;$i<=$paginas;$i++){
			    	if($i==$iniciopag){ ?>

			    
						<li class="active"><a  href="javascript:void(0)"><?php echo $i; ?></a></li>
			    	<?php }else{ ?>
				    	<li><a href="javascript:void(0)" onclick="ConvenioEstado(<?php echo $i; ?>)"><?php echo $i; ?></a></li>
			    	<?php }

			    }

			    ?>
			    
			   <?php   if($iniciopag<$paginas){ 

			   	 		$valorn=$iniciopag+1; 
			   	?>
    
			    		<li>
					      <a href="javascript:void(0)" aria-label="Next" onclick="ConvenioEstado(<?php echo $valorn; ?>)" >
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>

			    <?php  }else{ ?>

			    	 <li class="disabled" >
					      <a href="javascript:void(0)" aria-label="Next" >
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					  </li>

			    <?php } ?>
   
				</ul>

			</nav>	

		 <?php }else{?> 
		   <h4 class="text-center">" No hay convenios registrados para los estados seleccionados"</h4>
		   <?php } ?>
   