<?php 
	$form=$this->beginWidget("CActiveForm");
 ?>
    <main class="container-fluid">
        <div class "row">
            
            <div  class="nuevo col-xs-12 text-left">
                <p ><span class="glyphicon glyphicon-th-list"></span> Nuevo Convenio Marco</p>
            </div>
        </div>

<div class="row">
<aside class="menu_pasos col-xs-3">
            
                    <ul id="navi">
                        <li><a href="#" class="text-center">Paso 1</a></li>
                        <li><a href="#" class="text-center" >Paso 2</a></li>
                        <li><a href="#" class="text-center">Paso 3</a></li>
                        <li><a href="#" class="text-center">Paso 4</a></li>
                        <li><a href="#" class="text-center">Paso 5</a></li>
                        <li><a href="#" class="text-center">Paso 6</a></li>
                        
                    </ul>
                    
                
            </aside>

<section class="datos col-xs-9">     
<h4>Datos Generales del Convenio</h4>
<br>

<div class="row">
<?php echo $form->labelEx($pasouno,"tipo",array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasouno,"tipo",CHtml::listData(Tipoconvenios::model()->findAll(), 'idTipoConvenio', 'descripcionTipoConvenio'),'',array('style'=>'width:200px;','class'=>'col-md-5')); ?>
<?php echo $form->error($pasouno,"tipo"); ?>
</div>
<br>
<br>
<div class="row">
<?php echo $form->labelEx($pasouno,"nombreconvenio",array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasouno,"nombreconvenio",array('style'=>'width:200px;','class'=>'col-md-5')); ?>
<?php echo $form->error($pasouno,"nombreconvenio"); ?>
</div>
<br>
<br>
<div class="row">
<?php echo $form->labelEx($pasouno,"fechainicio",array('class'=>'col-md-3')); ?>
 <?php
  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'options'=>array(
                        'showAnim'=>'fold',
                ),
                'model'=>$pasouno,
                'attribute'=>'fechainicio',
                'htmlOptions'=>array(
                        'class'=>'betterform',
                        'tabindex'=>3
                ),
                'options'=>array(
                        'dateFormat'=>'yy-mm-dd',
                        'showButtonPanel'=>true,
                        'changeMonth'=>true,
                        'changeYear'=>true,
                        'defaultDate'=>'+1w',
                ),
        ));
   ?>
<?php echo $form->error($pasouno,"fechainicio"); ?>
</div>
<br>
<br>
<div class="row">
<?php echo $form->labelEx($pasouno,"fechacaducidad",array('class'=>'col-md-3')); ?>
 <?php
  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'options'=>array(
                        'showAnim'=>'fold',
                ),
                'model'=>$pasouno,
                'attribute'=>'fechacaducidad',
                'htmlOptions'=>array(
                        'class'=>'betterform',
                        'tabindex'=>3
                ),
                'options'=>array(
                        'dateFormat'=>'yy-mm-dd',
                        'showButtonPanel'=>true,
                        'changeMonth'=>true,
                        'changeYear'=>true,
                        'defaultDate'=>'+1w',
                ),
        ));
   ?>
<?php echo $form->error($pasouno,"fechacaducidad"); ?>
</div>
<br>	
<br>
<div class="row">
<?php echo $form->labelEx($pasouno,"objetivo",array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasouno,"objetivo",array('style'=>'width:200px;','class'=>'col-md-5'));?>
<?php echo $form->error($pasouno,"objetivo"); ?>
</div>
<br>	
<br>	
<div class="row">
<?php echo $form->labelEx($pasouno,'dependencia',array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasouno,'dependencia',CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),''); ?>
<?php echo $form->error($pasouno,'dependencia'); ?>
</div>
<br>	
<p>Estado Inicial</p>
<br>
<div class="row">
<?php echo $form->labelEx($pasouno,'estado',array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasouno,'estado',CHtml::listData(Estadoconvenios::model()->findAll(), 'idEstadoConvenio', 'nombreEstadoConvenio'),''); ?>
<?php echo $form->error($pasouno,'estado'); ?>
</div>
<br>

<?php echo CHtml::submitButton("Siguiente",array("class"=>'btn btn-conv')); ?>
</section>

</div><!--contenido-->
</main>
<?php $this->endWidget(); ?>
