
		   <?php while(($row=$resultados->read())!==false) {  ?>
		   	<aside id='prueba' class='list-group-item'>
	           
	           <div class='row'>
		            <div class='col-sm-2'><p class='text-info'><?php echo $resull3->tipo_convenio; ?></p></div>
		            <div class='col-sm-10'><a href="<?php echo $this->createUrl( '/convenios/view' )."&id=".$resull3->id_convenio; ?>" ><?php echo $resull3->nombre_convenio; ?></a></div> 
				</div>

				 <div class='row'>
					 <div class='col-sm-8'>
					 	<ul>
						  <li> Fecha Inicio: <small><?php  echo $resull3->fecha_inicio; ?> </small></li>
						  <li> Fecha Caducidad: <small><?php echo $resull3->fecha_caducidad; ?></small></li>
						  <li> Objetivo: <small><?php echo $resull3->objetivo_convenio;?></small></li>
						  <!--<li> Estado: <small><?php  //echo $resull3->estado_actual_convenio; ?></small></li>-->
						  <li> Responsable Contacto: <small><?php echo $resull3->responsable_Unet; ?></small></li>
					 	</ul>
					 </div>


					  	<div class='col-sm-4'>
						 	<ul class='list-inline'>
						 	<?php if(strcmp($resull3->tipo_convenio,"Marco")==0){ ?>
						 		<?php if(!Yii::app()->user->isGuest):?>
						 	  		<li><a href="<?php echo $this->createUrl("/convenios/createEspecifico",array('id'=>$resull3->id_convenio)); ?>" data-toggle='tooltip' title='Agregar Específico'><span class='glyphicon glyphicon-plus'></span><a/></li>
						 		<?php endif?>
						 	<?php } ?>

						 	<?php if(!Yii::app()->user->isGuest):?>
						 		<li><a href="<?php echo $this->createUrl("/convenios/updateConvenio",array('id'=>$resull3->id_convenio)); ?>" data-toggle='tooltip' title='Editar'><span class='glyphicon glyphicon-pencil'></span></a></li>
	 							<li><a href="<?php echo $this->createUrl("/convenios/renovar",array('id'=>$resull3->id_convenio)); ?>" data-toggle='tooltip' title='Renovar'><span class='glyphicon glyphicon-time'></span></a></li>
	 						<?php endif?>
	 						<!--<li><a href="<?php //echo $this->createUrl("/convenios/cambiarEstado")."&id=".$resull3->id_convenio; ?>" sdata-toggle='tooltip' title='Cambiar Estado'><span class='glyphicon glyphicon-refresh'></span></a></li>-->
							<?php if($resull3->url!=null):?>
							<li><a href="<?php echo $resull3->url; ?>" data-toggle='tooltip' title='Descargar' download='<?php echo $resull3->id_convenio."Convenio".$resull3->tipo_convenio; ?>'><span class='glyphicon glyphicon-download-alt'></a></span></li>
	                       	<?php endif?>
	                       <?php if(!Yii::app()->user->isGuest):?>	
	                        	<li><a href="<?php echo $this->createUrl("/convenios/eliminar",array('id'=>$resull3->id_convenio)); ?>" onclick='return confirm("Esta seguro de eliminar el convenio");' data-toggle='tooltip' title='Eliminar'><span class='glyphicon glyphicon-trash'></span></a></li>
						 	<?php endif?>
						 	</ul>
					
					 </div>

				</div>

			 </aside>
			 <?php } ?>
		   

		<?php if($paginas>0){ ?>

		   	<nav class="text-right" aria-label="Page navigation">

				<ul class="pagination pagination-sm">

			<?php  
				if($iniciopag>1){
				  $valor=$iniciopag-1;  
			?>				
				
					  <li>
					      <a href="javascript:void(0)" aria-label="Previous"  onclick="send(<?php echo $valor; ?>)">
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
				    	<li><a href="javascript:void(0)" onclick="send(<?php echo $i; ?>)"><?php echo $i; ?></a></li>
			    	<?php }

			    }

			    ?>
			    
			   <?php   if($iniciopag<$paginas){ 
			   	 		$valorn=$iniciopag+1;
			   	?>
			    		<li>
					      <a href="javascript:void(0)" aria-label="Next" onclick="send(<?php echo $valorn; ?>)" >
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
		 		<h4 class="text-center">" No hay convenios Registrados con las características seleccionadas "</h4>
		   	<?php } ?>
 