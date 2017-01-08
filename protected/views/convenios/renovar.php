<?php 
  $this->breadcrumbs=array(
	'Consultar'=>array('consultar'),
	'Renovar',
);
?>

 <!--<div class="row">
	<div  class="nuevo col-md-12 text-left">
		 <h4>Renovar: <?php /*echo $model->nombreConvenio; */?></h4>
	</div>
 </div>-->

 <div class="container">

 <ul class="list-group">
  <li class="list-group-item"><h4>Información general del Convenio a renovar</h4>
  	 <ul>
  		<li>Nombre: <small><?php echo $model->nombreConvenio; ?></small></li>
	    <li>Fecha Inicio: <small><?php echo $model->fechaInicioConvenio; ?></small></li>
	    <li>Fecha Caducidad:<small><?php echo $model->fechaCaducidadConvenio; ?></small></li>
	    <li>Estado Actual: <small><?php echo $estado; ?></small><?php 

	     ?>
	 	</li>
  	</ul>
</ul>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading text-center"><h4>Datos de la Renovación</h4></div>
                <!--<form class="form-horizontal" method="post">-->
                 <?php 
                    $form=$this->beginWidget('CActiveForm',
                      array(
                        'method' =>'POST',
                        'action' =>Yii::app()->createUrl('convenios/renovar'."&id=".$model->idConvenio),
                        'id' => 'form',
                        'enableAjaxValidation' => true,
                        /*'enableClientValidation' => true,*/
                        'clientOptions' => array(
                          /*'validateOnSubmit' => true,*/
                          'validateOnChange' => true,
                          'validateOnType' => true,
                          ),
                        'htmlOptions'=>array(
                                  'class'=>'form-horizontal',
                                ),
                        
                        ));
                    ?>
                    
                       <!-- <legend class="text-center header">Datos de la Renovación</legend>-->
                    <div class="panel-body text-center">
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"><?php echo $form->labelEx($renovar,'fechaFinProrroga'); ?></span>
                            <div class="col-md-7">
                              <div class='input-group date'>
                                <?php     
                                  $this->widget('zii.widgets.jui.CJuiDatePicker',
                                            array(
                                              'attribute'=>'fechaFinProrroga',
                                              'name'=>'fechaFinProrroga',
                                              'value'=>$renovar->fechaFinProrroga,
                                              'model'=>$renovar,
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
                             <?php echo $form->error($renovar,'fechaFinProrroga'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-2 text-center"><?php echo $form->labelEx($renovar,'observacionProrroga');  ?></span>
                            <div class="col-md-7">
  
                              <?php 
                               
                               echo $form->textArea($renovar,'observacionProrroga',array('class'=>"form-control", 'rows'=>"7" ));
                               echo $form->error($renovar,'observacionProrroga');

                               ?>
                                <!--<input id="lname" name="name" type="text" placeholder="Last Name" class="form-control">-->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                              <?php  echo CHtml::submitButton('Renovar', array('class'=>'btn btn-conv btn-lg')); ?>
                            </div>
                        </div>
                    </div>
                    <?php $this->endWidget(); ?>
               <!-- </form>-->
            </div>
        </div>
    </div>
<ul class="breadcrumb text-right">
  <li><a href="<?php echo $this->createUrl("site/index"); ?>">Home</a></li>
  <li><a href="<?php echo $this->createUrl("convenios/consultar"); ?>">consultar Convenios</a></li>
</ul>

</div>
