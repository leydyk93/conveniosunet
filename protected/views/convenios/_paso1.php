<!--INCIALIZANDO LOS CAMPOS -->
<?php 
//window.onload=asignar();
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

<body onload="asignar();">
<main class="container-fluid">
 <!--<div class "row">
            <div  class="nuevo col-xs-12 text-left">
                <p ><span class="glyphicon glyphicon-th-list"></span> Nuevo Convenio Marco</p>
            </div>
  </div>-->

<div class="row">

<div class="col-xs-3">
    <ul id="pasoscaragar" class="nav nav-pills nav-stacked">
    <li><a class="text-center">Nuevo Convenio</a></li>
    <li><a href="#" class="text-center" >Paso 1</a></li>
    <li><a href="#" class="text-center" >Paso 2</a></li>
    <li><a href="#" class="text-center" >Paso 3</a></li>
    <li><a href="#" class="text-center" >Paso 4</a></li>
    <li><a href="#" class="text-center" >Paso 5</a></li>
    
  </ul>
</div>

<section class="datos col-xs-9">     
<?php 
    $form=$this->beginWidget("CActiveForm", array(  
             'htmlOptions'=>array('class'=>'form-horizontal'),                      
        ));
 ?>

     <!-- <div class="well well-sm ">  -->
      <legend class="text-center header"><h4>Datos Generales del Convenio</h4></legend>  
      
      <div class="form-group">
        <?php echo $form->labelEx($pasouno,"tipo",array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-10">
            <?php 
                    echo  $form->dropDownList($pasouno,"tipo", 
                        CHtml::listData(Tipoconvenios::model()->findAll(),'idTipoConvenio', 'descripcionTipoConvenio'),
                         array('class'=>'form-control input-sm'),
                         array('options' => array($_SESSION['tipo']=>array('selected'=>true)))
                            );
             ?>
          <?php echo $form->error($pasouno,"tipo"); ?>
        </div>
      </div>
     
      <div class="form-group">
        <?php echo $form->labelEx($pasouno,"nombreconvenio",array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-10"> 

        <?php echo $form->textField($pasouno,"nombreconvenio",array('class'=>'form-control input-sm' ,'value'=>$_SESSION['nombreconvenio'])); ?>
        <?php echo $form->error($pasouno,"nombreconvenio"); ?>
          
        </div>
      </div>

      <div class="form-group">
        <?php echo $form->labelEx($pasouno,"fechainicio",array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-10"> 

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
                            'htmlOptions'=>array( 'class'=>'form-control input-sm',
                                    'value'=>$_SESSION['fechainicioconvenio'],
                                ),
                    ));
               ?>
        <?php echo $form->error($pasouno,"fechainicio"); ?>

        </div>
      </div>

        <div class="form-group">
        <?php echo $form->labelEx($pasouno,"fechacaducidad",array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-10"> 

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
                         'htmlOptions'=>array( 'class'=>'form-control input-sm',
                                'value'=>$_SESSION['fechacaducidadconvenio'],
                            ),
                ));
           ?>
        <?php echo $form->error($pasouno,"fechacaducidad"); ?>
          
        </div>
      </div>

      <div class="form-group">
        <?php echo $form->labelEx($pasouno,"objetivo",array('class'=>'control-label col-sm-2')); ?>
        
        <div class="col-sm-10"> 
            <?php echo $form->textArea($pasouno,"objetivo",array('class'=>"form-control input-sm", 'rows'=>"7",'value'=>$_SESSION['objetivo']));?>
            <?php echo $form->error($pasouno,"objetivo"); ?>    
        </div>
      </div>

      <div class="form-group">
        
        <?php echo $form->labelEx($pasouno,'dependencia',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-10"> 
            <?php echo $form->dropDownList($pasouno,'dependencia',
            CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),
            array('class'=>"form-control input-sm"),
            array('options' => array($_SESSION['dependenciaconvenio']=>array('selected'=>true)))); ?>
            <?php echo $form->error($pasouno,'dependencia'); ?>
            <div class="text-right"><a  href="#" data-toggle="modal" data-target="#miventana">
            Nueva Dependenia
            </a></div>
        </div>
      </div>

       <div class="form-group">
        
        <?php echo $form->labelEx($pasouno,'estado',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-10"> 
           
            <?php echo $form->dropDownList($pasouno,'estado',
                CHtml::listData(Estadoconvenios::model()->findAll(), 'idEstadoConvenio', 'nombreEstadoConvenio'),
                array('class'=>"form-control input-sm"),
                array('options' => array($_SESSION['estado']=>array('selected'=>true)))); ?>
            <?php echo $form->error($pasouno,'estado'); ?>
        </div>
      </div>

     <legend class="text-center header"><h4>Características del Convenio</h4></legend>  

      <div class="form-group">
        <?php echo $form->labelEx($pasouno,'clasiicacion',array('class'=>'control-label col-sm-2')); ?>
        
        <div class="col-sm-10"> 
           
            <?php echo $form->dropDownList($pasouno,'clasificacion',
            CHtml::listData(Clasificacionconvenios::model()->findAll(), 'idClasificacionConvenio', 'nombreClasificacionConvenio'),
                array('class'=>"form-control input-sm"),
                array('options' => array($_SESSION['clasificacion']=>array('selected'=>true)))); ?>
            <?php echo $form->error($pasouno,'clasificacion'); ?>
        </div>
      </div>

        <div class="form-group">
        
        <?php echo $form->labelEx($pasouno,'alcance',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-10"> 
            <?php echo $form->textArea($pasouno,"alcance",array('class'=>"form-control input-sm",'value'=>$_SESSION['alcance'])); ?>
            <?php echo $form->error($pasouno,'alcance'); ?>
        </div>
      </div>
      
      <div class="form-group text-right"> 
        <div class="col-sm-offset-2 col-sm-10">
           <?php echo CHtml::submitButton("Siguiente",array("class"=>'btn btn-conv',"onclick"=>'recolectar()')); ?> 
        </div>
      </div>
 <!--</div>-->
 <?php $this->endWidget(); ?>
</section>

</div><!--contenido-->
</main>



<div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Agregar Nueva Dependencia</h4>
                </div>            
                <div class="modal-body">

                  
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
      
        function recolectar(){
            
            var selec=document.getElementById("PasounoForm_tipo");
            var valselc=selec.selectedIndex;
            document.cookie="tipo="+valselc;

            var dep=document.getElementById("PasounoForm_dependencia");
            var depselc=dep.selectedIndex;
            document.cookie="dependencia="+depselc;

            var clas=document.getElementById("PasounoForm_clasificacion");
            var classelc=clas.selectedIndex;
            document.cookie="clasificacion="+classelc;

            var estado=document.getElementById("PasounoForm_estado");
            var estadoselc=estado.selectedIndex;
            document.cookie="estado="+estadoselc;
        }
        function asignar(){


             var selec=document.getElementById("PasounoForm_tipo");
             selec.selectedIndex=getCookie("tipo");


             var depselec=document.getElementById("PasounoForm_dependencia");
             depselec.selectedIndex=getCookie("dependencia");

             var classelec=document.getElementById("PasounoForm_clasificacion");
             classelec.selectedIndex=getCookie("clasificacion");

             var estadoselec=document.getElementById("PasounoForm_estado");
             estadoselec.selectedIndex=getCookie("estado");
             //selec.selectedIndex="1 ";
             alert(getCookie("tipo"));

        }

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

     
        function getCookie(cname) {
           var name = cname + "=";
           var ca = document.cookie.split(';');
           for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') {
               c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
              return c.substring(name.length,c.length);
            }
            }
          return "";
        }

        
</script>

<!--Tyson esta es la estructura de los formularios de las pantallas modales

<form class="form-horizontal">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>-->