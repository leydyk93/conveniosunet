<?php 
  $this->breadcrumbs=array(
	'Convenios'=>array('prueba'),
	'Consulta Convenios',
);
 ?>

<div class="row">

     <?php 
      $form=$this->beginWidget('CActiveForm',
        array(
          'method' =>'POST',
          'action' =>Yii::app()->createUrl('convenios/consultar'),
          'id' => 'form',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'clientOptions' => array(
              /*'validateOnSubmit' => true,*/
              'validateOnChange' => true,
              'validateOnType' => true,
              ),
          
          ));
     ?>

<div  id="MainMenu" class="col-sm-4">
   <h4><a href="<?php echo $this->createUrl( '/convenios/create' ); ?>"><span class="glyphicon glyphicon-plus"></span></a> Nuevo Convenio </h4>
<!--el menu de prueba-->
  <div class="list-group panel">
    <a href="#demo3" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu">Filtrar por <span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
    <div class="collapse" id="demo3">

      <a  class="list-group-item ">
       <div class="row">
        <div class="col-xs-1"><?php echo $form->labelEx($model,'anio');  ?></div>
        <div class="col-xs-10">

           <div class="input-group">
            <?php echo $form->textField($model,'anio',array('class'=>'form-control input-sm')); ?>
            <span class="input-group-btn">
              <?php echo CHtml::button('Ok',array('onclick'=>'send(1);','class'=>'btn btn-conv btn-sm')); ?>
            </span>
            
          </div>
          

        </div>
      
      </div>
      <div><?php echo $form->error($model,'anio'); ?></div>
        
      </a>

      <a href="#Subtipo" class="list-group-item opcion"  data-toggle="collapse" data-parent="#Subtipo" ><?php echo $form->labelEx($model,'tipo');  ?> <span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
      <div class="collapse list-group-submenu" id="Subtipo"> 
         <?php 
               $list=CHtml::listData($tipoconve,'idTipoConvenio','descripcionTipoConvenio');
               echo $form->checkBoxList($model,'tipo',$list,array('onclick'=>'send(1);','template'=>'<a class="list-group-item" data-parent="#Subtipo"> {input}{label} </a>', "separator" => ""));
          ?> 
      </div>

        
      <a href="#SubClasif" class="list-group-item opcion"  data-toggle="collapse" data-parent="#SubClasif" > <?php echo $form->labelEx($model,'clasificacion'); ?> <span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
      <div class="collapse list-group-submenu" id="SubClasif"> 
       <?php  
              $list2=CHtml::listData($clasif,'idClasificacionConvenio','nombreClasificacionConvenio');
              echo $form->checkBoxList($model,'clasificacion', $list2,array('onclick'=>'send(1);', 'template'=>'<a class="list-group-item" data-parent="#SubClasif"> {input}{label} </a>', "separator" => ""));
        ?>
        
      </div>

      <a href="#SubAmbitoG" class="list-group-item opcion"  data-toggle="collapse" data-parent="#SubAmbitoG" ><?php echo $form->labelEx($model,'ambitoGeografico'); ?> <span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
      <div class="collapse list-group-submenu" id="SubAmbitoG"> 
        <a class="list-group-item" data-parent="#SubAmbitoG">
              <?php 

               echo $form->dropDownList($model,'ambitoGeografico', 
                                            array("01"=>"Internacional", "02"=>"Nacional", "03"=>"Regional"),
                                            array('class'=>'form-control input-sm','empty' => 'Todos')
                                          
                                            );
                   // echo $form->checkBoxList($model,'ambitoGeografico',array("01"=>"Internacional", "02"=>"Nacional", "03"=>"Regional"),array('onclick'=>'send();', 'template'=>'<a class="list-group-item" data-parent="#SubAmbitoG"> {input}{label} </a>', "separator" => ""));
               ?>

               </a>
        
      </div>


      <a href="#SubDatosC" class="list-group-item opcion"  data-toggle="collapse" data-parent="#SubDatosC" ><?php echo $form->labelEx($model,'contraparte'); ?><span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
      <div class="collapse list-group-submenu" id="SubDatosC"> 
        <a class="list-group-item" data-parent="#SubDatosC"> 

          <div class="row">
            <div class="col-sm-1"><?php echo $form->labelEx($model,'pais'); ?></div>
            <div class="col-sm-10"><?php 
                              $list3=CHtml::listData($paisesconve,'idPais', 'nombrePais');
                              echo $form->dropDownList($model,'pais', $list3,
                                        array('class'=>'form-control input-sm','empty' => 'Todos')
                                        );
             ?>
           </div>
          
          </div>
         
        </a>
         <a href="#SubSubTipoIns" class="list-group-item opcion" data-toggle="collapse" data-parent="#SubSubTipoIns"><?php echo $form->labelEx($model,'tipo_institucion'); ?> <span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
          <div class="collapse list-group-submenu list-group-submenu-1" id="SubSubTipoIns">
                    
           <?php 
                 $list4=CHtml::listData($tiposinst,'idTipoInstitucion','nombreTipoInstitucion');
                 echo $form->checkBoxList($model,'tipo_institucion', $list4,array('onclick'=>'send(1);', 'template'=>'<a class="list-group-item" data-parent="#SubSubTipoIns"> {input}{label} </a> ', "separator" => "")); 
            ?>

          </div>
         <a class="list-group-item" data-parent="#SubDatosC">

          <div class="row">
              <div class="col-sm-4"><?php  echo $form->labelEx($model,'institucion'); ?></div>
              <div class="col-sm-7">
                 <?php 
                    $list5=CHtml::listData($institucionconve,'idInstitucion','nombreInstitucion');
                    echo $form->dropDownList($model,'institucion', $list5,
                              array('class'=>'form-control input-sm','empty' => 'Todos'));
                  ?> 
             </div>
          </div>
                     
         </a>
      </div>

      <a href="#SubEstado" class="list-group-item opcion"  data-toggle="collapse" data-parent="#SubEstado" ><?php echo $form->labelEx($model,'estadoConv'); ?> <span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
      <div class="collapse list-group-submenu" id="SubEstado"> 

          <?php  
           $list6=CHtml::listData($estadoconve,'idEstadoConvenio','nombreEstadoConvenio');   
           echo $form->checkBoxList($model,'estadoConv', $list6,array('onclick'=>'send(1);', 'template'=>'<a class="list-group-item" data-parent="#SubEstado"> {input}{label} </a>', "separator" => ""));    
          ?>
          
      </div>

       <a href="#SubVence" class="list-group-item opcion"  data-toggle="collapse" data-parent="#SubVence" ><label for="">Fecha de vencimiento</label> <span class="glyphicon glyphicon-plus-sign pull-right"></span></a>
      <div class="collapse list-group-submenu" id="SubVence"> 
        
        <a class="list-group-item" data-parent="#SubVence">

          <div class="row">
              <div class="col-sm-2"><?php  echo $form->labelEx($model,'fechaVencimiento1');  ?></div> 
              <div class="col-sm-6">
                 <div class='input-group date'>
                <?php 

                    /*echo $form->labelEx($model,'fechaVencimiento1'); */       
                       $this->widget('zii.widgets.jui.CJuiDatePicker',
                            array(
                              'attribute'=>'fechaVencimiento1',
                              'name'=>'fechaVencimiento1',
                              'value'=>$model->fechaVencimiento1,
                              'model'=>$model,
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
                                'readonly'=>"readonly",
                                'class'=>'form-control input-sm'
                            ),
                        ));
         
                 ?>
                   <span class="input-group-addon input-sm">
                       <span class="glyphicon glyphicon-calendar"></span>
                    </span>

                 </div>
              </div>
      
        </div>

        <div class="row">

          <div class="col-sm-2"><?php  echo $form->labelEx($model,'fechaVencimiento2');  ?></div>
          <div class="col-sm-6">
            <div class='input-group date'>
            <?php 
           

              $this->widget('zii.widgets.jui.CJuiDatePicker',
                        array(
                          'attribute'=>'fechaVencimiento2',
                          'name'=>'fechaVencimiento2',
                          'value'=>$model->fechaVencimiento2,
                          'model'=>$model,
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
                            'readonly'=>"readonly",
                          /*  'style'=>'',
                            'size'=>'5',*/
                           'class'=>'form-control input-sm',
                        ),
                    ));
             
             ?>
              <span class="input-group-addon input-sm">
                       <span class="glyphicon glyphicon-calendar"></span>
              </span>

              </div>

          </div>
          <div class="col-sm-3">
            <?php echo CHtml::button('Ok',array('onclick'=>'send(1);','class'=>'btn btn-conv btn-sm')); ?>
          </div>
          
        </div>

        </a>
      </div>
      <a  class="list-group-item text-center">
         <?php      
              echo CHtml::button('Desmarcar filtros',array('onclick'=>'limpiarFiltros();','class'=>'btn btn-conv btn-md'));
             ?> 
      </a>
    </div>
   
  </div>
    <?php $this->endWidget(); ?>
  </div>
 

 <div  id="Resulconvenios" class="col-sm-8">

    <div  id="data" class="list-group" >

    	
		   <?php $this->renderPartial('_ajaxContent', array('data'=>$data)); ?>
		

    </div>

  
    <div class="text-right">

      <?php /*echo CHtml::button('Generar Reporte',array('onclick'=>'Imprimir();','class'=>'btn btn-conv btn-md')); */ ?>
    </div>

 </div>
  
</div> 

<?php echo CHtml::ajaxButton ("Update data",
                              CController::createUrl('convenios/UpdateAjax'), 
                              array('update' => '#data'));
?>