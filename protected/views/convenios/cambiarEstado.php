<?php 
  $this->breadcrumbs=array(
	'Convenios'=>array('Cambiar Estado'),
	'Cambiar estado',
);
 ?>

  <div class="row">
	<div  class="nuevo col-md-12 text-left">
		 <h4>Cambiar Estado: <?php echo $model->nombreConvenio; ?></h4>
	</div>
 </div>

<div class="list-group">
  <div class="list-group-item"><h4>Estados del convenio</h4>

    <div class="table-responsive">
       <table class="table table-bordered">
          <thead>
            <tr>
              <th>Descripcion Estado</th>
              <th>Fecha de cambio</th>
             <!-- <th>Reporte</th>-->
              <th>Justificación</th>
              <th>Dependencia</th>
              
            </tr>
          </thead>
          <tbody>
            <?php while(($row=$resultados->read())!==false) { ?>
            <tr>
              <td><?php   echo $modelEdoBD->nombre_convenio;  ?></td>
              <td><?php   echo $modelEdoBD->fecha_inicio;     ?></td>
            <!--  <td><?php   /*echo $modelEdoBD->fecha_caducidad;*/  ?></td>-->
              <td><?php   echo $modelEdoBD->objetivo_convenio;?></td>
              <td><?php   echo $modelEdoBD->tipo_convenio     ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
  </div>	 
</div>

    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
               <!-- <form class="form-horizontal" method="post">-->
				   <?php 
				      $form=$this->beginWidget('CActiveForm',
				        array(
				          'method' =>'POST',
				          'action' =>Yii::app()->createUrl('convenios/cambiarEstado'."&id=".$model->idConvenio),
				          'id' => 'form',
				          'enableAjaxValidation' => false,
				          'htmlOptions'=>array(
	                          'class'=>'form-horizontal',
	                        ),
				          
				          ));
				     ?>
                    <fieldset>
                        <legend class="text-center header">Nuevo Estado para el convenio</legend>

                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"><?php echo $form->labelEx($modeloE,'estadoConvenios_idEstadoConvenio'); ?></span>
                            <div class="col-md-7">
                            	<?php 
								              $list1=CHtml::listData($modelEdo,'idEstadoConvenio','nombreEstadoConvenio');
	                            echo $form->dropDownList($modeloE,'estadoConvenios_idEstadoConvenio', 
	                                      $list1,array('class'=>"form-control"));

                            	 ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"><?php  echo $form->labelEx($modeloE,'fechaCambioEstado');  ?></span>
                            <div class="col-md-7">
                                  <div class='input-group date'>
              							        <?php     
              							              $this->widget('zii.widgets.jui.CJuiDatePicker',
              							                        array(
              							                          'attribute'=>'fechaCambioEstado',
              							                          'name'=>'fechaCambioEstado',
              							                          'value'=>$modeloE->fechaCambioEstado,
              							                          'model'=>$modeloE,
              							                          'language' => 'es',
              							                        
              							                            'options'=>array(
              							                                'autoSize'=>true,
              							                                 'mode'=>'focus',
              							                                 'showAnim'=>'slideDown',
              							                                 'dateFormat'=>'yy/mm/dd',
              							                                 'changeMonth'=>true,
              							                                 'changeYear'=>true,
              							                                 'showButtonPanel'=>true,
              							                               
              							                            ),
              							                        'htmlOptions'=>array(
              							                        
              							                            'class'=>"form-control",
              							                             'readonly'=>"readonly",
              							                        ),
              							                    ));

              							             
              							              
              							           ?>
                                        <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>

                             </div>
                             <?php echo $form->error($modeloE,'fechaCambioEstado'); ?>
                             
                            </div>
                        </div>

                       <!-- <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"><?php /*echo $form->labelEx($modeloE,'numeroReporte'); */ ?></span>
                            <div class="col-md-7">
						          <?php 

						          /* echo $form->textField($modeloE,'numeroReporte',array('class'=>"form-control"));
						           echo $form->error($modeloE,'numeroReporte');*/

						            ?>
                               
                            </div>
                        </div>-->


                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"><?php echo $form->labelEx($modeloE,'observacionCambioEstado');  ?></span>
                            <div class="col-md-7">

                            	<?php 
                            	 
						         echo $form->textArea($modeloE,'observacionCambioEstado',array('class'=>"form-control", 'rows'=>"7" ));
						         echo $form->error($modeloE,'observacionCambioEstado');

                            	 ?>

                               <!-- <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea>-->
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"><?php echo $form->labelEx($modeloE,'dependencias_idDependencia'); ?></span>
                            <div class="col-md-7">
                            	<?php 
          							     $list2=CHtml::listData($modelDpcia,'idDependencia', 'nombreDependencia');
                           			 echo $form->dropDownList($modeloE,'dependencias_idDependencia', 
                                      $list2,array('class'=>"form-control", /*"empty" => "--"*/));

                            	 ?>
                                <!--<input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">-->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                            	<?php  echo CHtml::submitButton('Actualizar', array('class'=>'btn btn-conv btn-lg')); ?>
                               
                            </div>
                        </div>
                    </fieldset>

                     <?php $this->endWidget(); ?>
               <!-- </form>-->
            </div>
        </div>
    </div>



