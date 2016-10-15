<!--INCIALIZANDO LOS CAMPOS -->
<?php 
if(!isset($_SESSION['nombreconvenio'])){
        $_SESSION['nombreconvenio']="";
}
if(!isset($_SESSION['tipo'])){
        $_SESSION['tipo']="";
}
if(!isset($_SESSION['fechainicioconvenio'])){
        $_SESSION['fechainicioconvenio']="";
}
if(!isset($_SESSION['fechacaducidadconvenio'])){
        $_SESSION['fechacaducidadconvenio']="";
}
if(!isset($_SESSION['objetivo'])){
        $_SESSION['objetivo']="";
}
if(!isset($_SESSION['dependenciaconvenio'])){
        $_SESSION['dependenciaconvenio']="";
}
if(!isset($_SESSION['estado'])){
        $_SESSION['estado']="";
}
if(!isset($_SESSION['clasificacion'])){
        $_SESSION['clasificacion']="";
}
if(!isset($_SESSION['alcance'])){
        $_SESSION['alcance']="";
}
 ?>


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
<?php echo $form->dropDownList($pasouno,"tipo",CHtml::listData(Tipoconvenios::model()->findAll(), 'idTipoConvenio', 'descripcionTipoConvenio'),array('options' => array($_SESSION['tipo']=>array('selected'=>true))),array('style'=>'width:200px;','class'=>'col-md-5')); ?>
<?php echo $form->error($pasouno,"tipo"); ?>
</div>
<br>
<br>
<div class="row">
<?php echo $form->labelEx($pasouno,"nombreconvenio",array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasouno,"nombreconvenio",array('style'=>'width:200px;','class'=>'col-md-5','value'=>$_SESSION['nombreconvenio'])); ?>
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
                'htmlOptions'=>array(
                        'value'=>$_SESSION['fechainicioconvenio'],
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
                 'htmlOptions'=>array(
                        'value'=>$_SESSION['fechacaducidadconvenio'],
                    ),
        ));
   ?>
<?php echo $form->error($pasouno,"fechacaducidad"); ?>
</div>
<br>	
<br>
<div class="row">
<?php echo $form->labelEx($pasouno,"objetivo",array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasouno,"objetivo",array('style'=>'width:200px;','class'=>'col-md-5','value'=>$_SESSION['objetivo']));?>
<?php echo $form->error($pasouno,"objetivo"); ?>
</div>
<br>	
<br>	
<div class="row">
<?php echo $form->labelEx($pasouno,'dependencia',array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasouno,'dependencia',CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),array('options' => array($_SESSION['dependenciaconvenio']=>array('selected'=>true)))); ?>
<?php echo $form->error($pasouno,'dependencia'); ?>
</div>

<a href="#" data-toggle="modal" data-target="#miventana">
    Nueva Dependenia
</a>

<br>
<br>	

<div class="row">
<?php echo $form->labelEx($pasouno,'estado',array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasouno,'estado',CHtml::listData(Estadoconvenios::model()->findAll(), 'idEstadoConvenio', 'nombreEstadoConvenio'),array('options' => array($_SESSION['estado']=>array('selected'=>true)))); ?>
<?php echo $form->error($pasouno,'estado'); ?>
</div>
<br>
CARACTERISTICAS DEL CONVENIO
<br>
<div class="row">
<?php echo $form->labelEx($pasouno,'clasiicacion',array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasouno,'clasificacion',CHtml::listData(Clasificacionconvenios::model()->findAll(), 'idClasificacionConvenio', 'nombreClasificacionConvenio'),array('options' => array($_SESSION['clasificacion']=>array('selected'=>true)))); ?>
<?php echo $form->error($pasouno,'clasificacion'); ?>
</div>
<?php echo "<br>"; ?>
<div class="row">
<?php echo $form->labelEx($pasouno,'alcance',array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasouno,"alcance",array('style'=>'width:200px;','class'=>'col-md-5','value'=>$_SESSION['alcance'])); ?>
<?php echo $form->error($pasouno,'alcance'); ?>
</div>

<?php 
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
                     //    $formd=$this->beginWidget("CActiveForm",
                       //         array(
                         //       'method' =>'POST',
                           //     'action' =>Yii::app()->createUrl('convenios/create'),
                            //    'id' => 'form',
                            //       'enableAjaxValidation' => true,
                              //  'enableClientValidation' => true,
                               // 'clientOptions' => array(
                                /*'validateOnSubmit' => true,*/
                                //'validateOnChange' => true,
                                 //'validateOnType' => true,
                                   //                  ) ,
                                    //));

                            echo CHtml:: form();
                            echo "Dependencia ";
                          
                            echo CHtml:: textField('nombre');
                            echo "<br>";
                            echo "<br>";
                            echo "Telefono ";
                  
                            echo CHtml:: textField('telefono');
                             echo "<br>";
                            echo CHtml:: ajaxSubmitButton(
                                'Guardar', array('convenios/guardardependencia'),array(
                                'update'=>'#PasounoForm_dependencia'
                                    )
                            );

                            echo CHtml::endForm();
                    ?>
                    <div id="resultado"></div>

            <!--        <div class="row">
                    <?php // echo $formd->labelEx($dep,'nombreDependencia',array('class'=>'col-md-3')); ?>
                    <?php // echo $formd->textField($dep,"nombreDependencia",array('style'=>'width:200px;','class'=>'col-md-5'));?>
                    <?php // echo $formd->error($dep,"nombreDependencia"); ?>
                    </div>
                    <div class="row">
                    <?php // echo $formd->labelEx($dep,'telefonoDependencia',array('class'=>'col-md-3')); ?>
                    <?php // echo $formd->textField($dep,"telefonoDependencia",array('style'=>'width:200px;','class'=>'col-md-5'));?>
                    <?php //echo $formd->error($dep,"telefonoDependencia"); ?>
                    </div>
-->

                </div>
                <div class="modal-footer">
                    <button  type="button" class="btn btn-conv" data-dismiss="modal"> Cerrar</button>
                   
                   
                    <?php //echo CHtml::button('Guardar',array('onclick'=>'guard();','class'=>'btn btn-conv btn-sm')); ?>
                   
                  

                    <?php 
                    $value=0;
                    $value1="";
                    setcookie("nrofila", $value);
                    setcookie("contra",$value1);
                    setcookie("nrofilap",$value);
                    setcookie("aportes",$value1);
                     ?>

                <?php //$this->endWidget(); ?>
                </div>

           

        </div>
    </div>
</div>
<script type="text/javascript">
      


        function guard(){
            alert('funcion guardar');
          
          var url= '<?php echo Yii::app()->createUrl("convenios/guardardependencia"); ?>'
          var prueba;
          var nombre= document.getElementById("Dependencias_nombreDependencia");
          var telefono= document.getElementById("Dependencias_telefonoDependencia");
 
        $.ajax({

            type:"post",
            url: url,
            data:{nombre:nombre , telefono:telefono},//,
            success: function (){
                prueba="hola";
            }
            //success:function (datos){
                //document.getElementById("resul").innerHTML=datos;
              // document.getElementById()
             }

            );
        }
        
</script>

