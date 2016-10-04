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

<a href="#" data-toggle="modal" data-target="#miventana">
    Nueva Dependenia
</a>

<br>
<br>	

<div class="row">
<?php echo $form->labelEx($pasouno,'estado',array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasouno,'estado',CHtml::listData(Estadoconvenios::model()->findAll(), 'idEstadoConvenio', 'nombreEstadoConvenio'),''); ?>
<?php echo $form->error($pasouno,'estado'); ?>
</div>
<br>
CARACTERISTICAS DEL CONVENIO
<br>
<div class="row">
<?php echo $form->labelEx($pasouno,'clasiicacion',array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasouno,'clasificacion',CHtml::listData(Clasificacionconvenios::model()->findAll(), 'idClasificacionConvenio', 'nombreClasificacionConvenio'),''); ?>
<?php echo $form->error($pasouno,'clasificacion'); ?>
</div>
<?php echo "<br>"; ?>
<div class="row">
<?php echo $form->labelEx($pasouno,'alcance',array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasouno,"alcance",array('style'=>'width:200px;','class'=>'col-md-5')); ?>
<?php echo $form->error($pasouno,'alcance'); ?>
</div>

<!-- CODIGO DE PRUEBA PARA EL AUTOMPLETE-->
<?php 
echo "<br>";
echo "<br>";
$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
    'name'=>'ciudad',
    'source'=>array('ciudad1','ciudad2','ciudad3'),
    // Opciones javascript adicionales para el plugin
    'options'=>array(
        'minLength'=>'2',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;',
    ),
));
echo "<br>";
echo "<br>";
 ?>
 
 
<?php echo CHtml::submitButton("Siguiente",array("class"=>'btn btn-conv')); ?>
</section>

</div><!--contenido-->
</main>
<?php $this->endWidget(); ?>

<div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Agregar Nueva Dependencia</h4>
                </div>            
                <div class="modal-body">
                    
                    <p>Todo el contenido de la ventana modal</p>
                    <?php 
                         $formd=$this->beginWidget("CActiveForm");
                    ?>

                    <div class="row">
                    <?php echo $formd->labelEx($dep,'nombreDependencia',array('class'=>'col-md-3')); ?>
                    <?php echo $form->textField($dep,"nombreDependencia",array('style'=>'width:200px;','class'=>'col-md-5'));?>
                    <?php echo $form->error($dep,"nombreDependencia"); ?>
                    </div>
                    <div class="row">
                    <?php echo $formd->labelEx($dep,'telefonoDependencia',array('class'=>'col-md-3')); ?>
                    <?php echo $form->textField($dep,"telefonoDependencia",array('style'=>'width:200px;','class'=>'col-md-5'));?>
                    <?php echo $form->error($dep,"telefonoDependencia"); ?>
                    </div>

                </div>
                <div class="modal-footer">
                    <button  type="button" class="btn btn-conv" data-dismiss="modal"> Cerrar</button>
                    <a  type "button" onclick="mens()" >Boton</a>
                    <?php echo CHtml::submitButton("Guardar",array("class"=>'btn btn-conv')); ?>
                    <?php 
                    $value=0;
                    $value1="";
                    setcookie("nrofila", $value);
                    setcookie("contra",$value1);
                    setcookie("nrofilap",$value);
                    setcookie("aportes",$value1);
                     ?>

                <?php $this->endWidget(); ?>
                </div>

           

        </div>
    </div>
</div>
<script type="text/javascript">

        function mens(){
            alert("hola");
        }
        
</script>

