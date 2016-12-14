<?php 
  $this->breadcrumbs=array(
	'Convenios en Espera'=>array('conveniosEspera'),
	'Cambiar estado',
);
 ?>

<h4> <span class="glyphicon glyphicon-refresh"></span> Cambiar Estado: <?php echo $model->nombreConvenio; ?></h4>
	
<div class="list-group">
  <div class="list-group-item"><h4 class="text-center">Estados del convenio</h4>

    <div class="table-responsive">
       <table class="table table-bordered">
          <thead>
            <tr>
              <th>Descripcion Estado</th>
              <th>Fecha de cambio</th>
              <th>Justificación</th>
              <th>Dependencia</th>
              
            </tr>
          </thead>
          <tbody>
            <?php  foreach ($estadosConv as $key => $value) { ?>
            <tr>
              <td><?php   $estadosNombre=Estadoconvenios::model()->findByPk($value->estadoConvenios_idEstadoConvenio);
               echo  $estadosNombre->nombreEstadoConvenio; ?></td>
              <td><?php echo $value->fechaCambioEstado;   ?></td>
            
              <td><?php  echo $value->observacionCambioEstado; ?></td>
              <td><?php  if($value->dependencias_idDependencia!=null) { 
                              $dependenciaNombre=Dependencias::model()->findByPk($value->dependencias_idDependencia);
                              echo  $dependenciaNombre->nombreDependencia;
                            } 
                   ?>
              </td>
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
              
				   <?php 
				      $form=$this->beginWidget('CActiveForm',
				        array(
				          'method' =>'POST',
				          //'action' =>Yii::app()->createUrl('convenios/cambiarEstado'."&id=".$model->idConvenio),
				          'id' => 'form',
				          'enableAjaxValidation' => false,
				          'htmlOptions'=>array(
	                          'class'=>'form-horizontal',
                             /*'enctype'=>'multipart/form-data'*/
	                        ),
				          ));
				     ?>
                        <legend class="text-center header">Nuevo Estado para el convenio</legend>
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"><?php echo $form->labelEx($modeloE,'estadoConvenios_idEstadoConvenio'); ?></span>
                            <div class="col-md-7">
                            	<?php 
								              $list1=CHtml::listData($modelEdo,'idEstadoConvenio','nombreEstadoConvenio');
	                            echo $form->dropDownList($modeloE,'estadoConvenios_idEstadoConvenio', 
	                                      $list1,array('class'=>"form-control input-sm"));

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
              							                        
              							                            'class'=>"form-control input-sm",
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
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"><?php echo $form->labelEx($modeloE,'dependencias_idDependencia'); ?></span>
                            <div class="col-md-7">
                            	<?php 
          							     $list2=CHtml::listData($modelDpcia,'idDependencia', 'nombreDependencia');
                           			 echo $form->dropDownList($modeloE,'dependencias_idDependencia', 
                                      $list2,array('class'=>"form-control input-sm", "empty" => "--"));

                            	 ?>
                               
                            </div>
                        </div>

                        <?php 
                           /* echo $form->labelEx($modelArchivoConv,'titulo',array('class'=>"modelArchivo"));
                            echo $form->textField($modelArchivoConv,'titulo',array('class'=>"modelArchivo"));
                            echo $form->error($modelArchivoConv,'titulo');*/
                          ?>
                      
                        <!--<div class="form-group">
                          <span class="col-md-2 col-md-offset-2 text-center"><?php ?></span>
                          <div class="col-md-7">
                          <label class="btn btn-conv btn-sm"> <span class="glyphicon glyphicon-open-file"></span> Subir Archivo del Convenio
                            <?php   
                              
                            /*  $this->widget('CMultiFileUpload',
                              array(
                                'model'=>$modelArchivoConv,
                                'name'=>'documento',
                                'attribute'=>'documento',
                                'accept'=> 'pdf',
                                'denied'=>'El documento debe estar en formato PDF',
                                'max'=>1,
                                'duplicate'=>'archivo duplicado',
                                 'htmlOptions'=>array(
                                    'style'=>"display: none;"     
                                  ),
                                )


                              );
                              
                                echo $form->error($modelArchivoConv,'documento');
                            */
                          
                           ?>
                         </label>
                          </div>
                        </div>-->

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                            	<?php  echo CHtml::submitButton('Actualizar', array('class'=>'btn btn-conv btn-lg')); ?> 
                            </div>
                        </div>
                     <?php $this->endWidget(); ?>

            </div>
        </div>
    </div>

