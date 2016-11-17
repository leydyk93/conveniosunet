
<?php 
while(($row=$resultados->read())!==false) {  ?>

			<aside id="prueba" class="list-group-item" >
				<div class="row">
                      <div class="col-sm-12">
                      	<p class="text-info"><?php echo $model->id_convenio." ".$model->tipo_convenio  ?></p>
                       </div> 			
                  </div>

                  <div class="row">
					
                  	<div class="col-sm-12">
                  		<p  class="text-primary text-center"><?php echo $model->nombre_convenio; ?></p>	
                  		 <dl id="listreporte" class="dl-horizontal">
						    <dt>Fecha Inicio </dt>
						    <dd><small class="text-muted"><?php   echo $model->fecha_inicio." ";?></small></dd>
						    <dt>Fecha Caducidad </dt>
						    <dd><small class="text-muted"> <?php echo $model->fecha_caducidad." "; ?></small></dd>
					 	    <dt>Objetivo del convenio </dt>
						    <dd><small class="text-muted"> <?php echo $model->objetivo_convenio." "; ?></small></dd>
						    <!--<dt>Estado del Convenio </dt>
						    <dd><small class="text-muted"> <?php /*echo $model->estado_actual_convenio;*/ ?></small></dd>-->
						    <dt>Responsable Contacto </dt>
						    <dd><small class="text-muted">   <?php echo $model->responsable_Unet." "; ?></small></dd>
						
						 </dl>

                  	</div>
                  	
                  </div>
            
          </aside>

 <?php } ?> 







    