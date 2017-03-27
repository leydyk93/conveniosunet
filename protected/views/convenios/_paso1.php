<!--INCIALIZANDO LOS CAMPOS -->
<?php 
//window.onload=asignar();
if(!isset($_SESSION['idconvenio'])){
        $_SESSION['idconvenio']="";
}
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



<body onload="asignar()">
<main class="container-fluid">
 <!--<div class "row">
            <div  class="nuevo col-xs-12 text-left">
                <p ><span class="glyphicon glyphicon-th-list"></span> Nuevo Convenio Marco</p>
            </div>
  </div>-->

<div class="row">

<div  id="pasos" class="col-xs-3">

   <div class="list-group panel">
    <a href="" class="list-group-item"><h4>Nuevo Convenio</h4></a>
    <a href="index.php?r=convenios/create" class="list-group-item opcion text-center"><h5>Paso 1</h5></a>
    <a href="<?php echo $this->createUrl( '/convenios/pasodos' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="list-group-item opcion text-center"><h5>Paso 2</h5></a>
    <a href="<?php echo $this->createUrl( '/convenios/pasotres' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="list-group-item opcion text-center"><h5>Paso 3</h5></a>
    <a href="<?php echo $this->createUrl( '/convenios/pasocuatro' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="list-group-item opcion text-center"><h5>Paso 4</h5></a>
    <a href="<?php echo $this->createUrl( '/convenios/pasocinco' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="list-group-item opcion text-center" ><h5>Paso 5</h5></a>
    
    </div>

     <!--  <ul id="navi">
              <li><a href="index.php?r=convenios/create" class="text-center">Paso 1</a></li>
              <li><a href="<?php //echo $this->createUrl( '/convenios/pasodos' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="text-center" >Paso 2</a></li>
              <li><a href="<?php //echo $this->createUrl( '/convenios/pasotres' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="text-center">Paso 3</a></li>
              <li><a href="<?php //echo $this->createUrl( '/convenios/pasocuatro' )."&idconvenio=".$_SESSION['idconvenio']; ?>"  class="text-center">Paso 4</a></li>
              <li><a href="<?php //echo $this->createUrl( '/convenios/pasocinco' )."&idconvenio=".$_SESSION['idconvenio']; ?>"  class="text-center">Paso 5</a></li>

        </ul>-->
</div>

<section class="datos col-xs-9">     
<?php 
    if($_SESSION["isNewRecord"]==1){
        $form=$this->beginWidget("CActiveForm", array(  
                 'method' => 'POST',
                 'action'=> Yii::app()->createUrl("/convenios/updateConvenio",array('id'=>"01")),
                 'id'=>'pasouno',
                // 'enableAjaxValidation'=>true,
                 'enableClientValidation'=> true,
                 'clientOptions'=> array(
                    'validateOnSubmit'=> true,
                    'validateOnChange'=> true,
                    'validateOnType'=>true,
                  ),
                 'htmlOptions'=>array('class'=>'form-horizontal'),    

            ));
        }
        else{
            $form=$this->beginWidget("CActiveForm", array(  
                 'method' => 'POST',
                 'action'=> Yii::app()->createUrl("/convenios/create"),
                 'id'=>'pasouno',
                // 'enableAjaxValidation'=>true,
                 'enableClientValidation'=> true,
                 'clientOptions'=> array(
                    'validateOnSubmit'=> true,
                    'validateOnChange'=> true,
                    'validateOnType'=>true,
                  ),
                 'htmlOptions'=>array('class'=>'form-horizontal'),    

            ));



        }
 ?>

     <!-- <div class="well well-sm ">  -->
      <legend class="text-center header"><h4>Datos Generales del Convenio</h4></legend>  
      
      <?php 

      if($pasouno->idmarco!=""){

        $conveniopapa=Convenios::model()->find('idConvenio=:idConvenio',array(':idConvenio'=>$pasouno->idmarco));

        echo "Convenio asociado a ".$conveniopapa->nombreConvenio;
        $_SESSION['tipo']="2";
      }

       ?>

      <div class="form-group">
        <?php echo $form->labelEx($pasouno,"tipo",array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-9">
            <?php 

            //DROPDOWNLIST DEPENDIENDO SI ES MARCO O ESPECIFICO 
                if($pasouno->idmarco!=""){
                   $_SESSION["idpapa"]=$pasouno->idmarco;
                  echo  $form->dropDownList($pasouno,"tipo", 
                        CHtml::listData(Tipoconvenios::model()->findAll('idTipoConvenio=:idTipoConvenio',array('idTipoConvenio'=>$_SESSION['tipo'])),'idTipoConvenio', 'descripcionTipoConvenio'),
                         array('class'=>'form-control input-sm'),
                         array('options' => array("2"=>array('selected'=>true)))
                            );
                }
                else
                   
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
        <div class="col-sm-9"> 

        <?php echo $form->textField($pasouno,"nombreconvenio",array('class'=>'form-control input-sm' ,'value'=>$_SESSION['nombreconvenio'])); ?>
        <?php echo $form->error($pasouno,"nombreconvenio"); ?>
          
        </div>
      </div>

      <div class="form-group">
        <?php echo $form->labelEx($pasouno,"fechainicio",array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-9"> 

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
        <div class="col-sm-9"> 

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
        
        <div class="col-sm-9"> 
            <?php echo $form->textArea($pasouno,"objetivo",array('class'=>"form-control input-sm", 'rows'=>"7",'value'=>$_SESSION['objetivo']));?>
            <?php echo $form->error($pasouno,"objetivo"); ?>    
        </div>
      </div>

      <div class="form-group">
        
        <?php echo $form->labelEx($pasouno,'dependencia',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-9"> 
           
            <?php echo $form->dropDownList($pasouno,'dependencia',
                    CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),
                    array('class'=>"form-control input-sm",'prompt'=>'Seleccione')
                    //array('options' => array($_SESSION['dependenciaconvenio']=>array('selected'=>true)))
                    );
             ?>
            <?php echo $form->error($pasouno,'dependencia'); ?>
        </div>
        <div class="col-sm-1"><a  href="#" data-toggle="modal" data-target="#miventana" onclick="limpiarmodaldependencia()"  >
                <span class="glyphicon glyphicon-plus" data-toggle=""></span>
        </a></div>
      </div>

  
       <div class="form-group">
        
        <?php echo $form->labelEx($pasouno,'estado',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-9"> 
           
            <?php echo $form->dropDownList($pasouno,'estado',
                CHtml::listData(Estadoconvenios::model()->findAll(), 'idEstadoConvenio', 'nombreEstadoConvenio'),
                array('class'=>"form-control input-sm",'prompt'=>'Seleccione'),
                array('options' => array($_SESSION['estado']=>array('selected'=>true)))); ?>
            <?php echo $form->error($pasouno,'estado'); ?>
        </div>
        <div class="col-sm-1"><a  href="#" data-toggle="modal" data-target="#miestado" onclick="limpiarmodalestado()"  >
                <span class="glyphicon glyphicon-plus" data-toggle=""></span>
        </a></div>
      </div>

     <legend class="text-center header"><h4>Características del Convenio</h4></legend>  

      <div class="form-group">
        <?php echo $form->labelEx($pasouno,'clasificacion',array('class'=>'control-label col-sm-2')); ?>
        
        <div class="col-sm-9"> 
           
            <?php echo $form->dropDownList($pasouno,'clasificacion',
            CHtml::listData(Clasificacionconvenios::model()->findAll(), 'idClasificacionConvenio', 'nombreClasificacionConvenio'),
                array('class'=>"form-control input-sm",'prompt'=>'Seleccione'),
                array('options' => array($_SESSION['clasificacion']=>array('selected'=>true)))); ?>
            <?php echo $form->error($pasouno,'clasificacion'); ?>
        </div>
         <div class="col-sm-1"><a  href="#" data-toggle="modal" data-target="#miclasificacion" onclick="limpiarmodalclasificacion()"  >
                <span class="glyphicon glyphicon-plus" data-toggle=""></span>
        </a></div>
      </div>

        <div class="form-group">
        
        <?php echo $form->labelEx($pasouno,'alcance',array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-9"> 
            <?php echo $form->textArea($pasouno,"alcance",array('class'=>"form-control input-sm",'value'=>$_SESSION['alcance'])); ?>
            <?php echo $form->error($pasouno,'alcance'); ?>
        </div>
      </div>
      


 <div class="form-group "> 
        <div class="col-sm-6 text-left">
           <?php echo CHtml::submitButton("Guardar Paso 1",array("class"=>'btn btn-conv',"onclick"=>'recolectar()',"name"=>'enviar')); ?> 
        </div>

        <div class="col-sm-6 text-right">
           <?php echo CHtml::submitButton("Siguiente",array("class"=>'btn btn-conv disable',"onclick"=>'recolectar()','name'=>'siguiente','id'=>'botonsiguiente','disabled'=>true)); ?> 
        </div>
</div>


  <div class="form-group text-right"> 
        
  </div>

      
 <!--</div>-->
 <?php $this->endWidget(); ?>
</section>

</div><!--contenido-->
</main>

<!--                                   PANTALLA MODAL DEPENDENCIA                    !-->

<div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Agregar Nueva Dependencia</h4>
                </div>            
                <div class="modal-body">

                  
                    <?php 
                       $formd=$this->beginWidget("CActiveForm",array(  
                        'method' => 'POST',
                         'action'=> Yii::app()->createUrl('convenios/create'),
                         'id'=>'dependencia',
                        // 'enableAjaxValidation'=>true,
                         'enableClientValidation'=> true,
                         'clientOptions'=> array(
                            'validateOnSubmit'=> true,
                            'validateOnChange'=> true,
                            'validateOnType'=>true,
                          ),
                          'htmlOptions'=>array('class'=>'form-horizontal'),                      
                       ));

                      ?>     

                          <div id="MensajeDependencia"></div>
                          <br>
                         <div class="form-group">
                    
                             <?php  echo $formd->labelEx($dep,'nombreDependencia',array('class'=>'control-label col-sm-2')); ?>
                          <div class="col-sm-10">
                            <?php  echo $formd->textField($dep,"nombreDependencia",array('class'=>'form-control input-sm'));?>
                            <?php  echo $formd->error($dep,"nombreDependencia"); ?>
                            </div>
                         </div>

                          <div class="form-group">   
                          <?php  echo $formd->labelEx($dep,'telefonoDependencia',array('class'=>'control-label col-sm-2')); ?>
                           <div class="col-sm-10">
                          <?php  echo $formd->textField($dep,"telefonoDependencia",array('class'=>'form-control input-sm'));?>
                          <?php echo $formd->error($dep,"telefonoDependencia"); ?>
                           </div>
                           </div>

                
                          <div class="row">
                            <div class="col-sm-10"></div>
                    <?php   echo CHtml:: ajaxSubmitButton(
                            'Guardar', array('convenios/guardardependencia'),array(
                             //'type'=>'post',
                             //'dataType'=>'json', 
                            'beforeSend'=>'js:function(){ alert(\'antes de enviar\')}',

                            'update'=>'#PasounoForm_dependencia',
                            'complete'=>'js:function(data){
                              if(getCookie("gdependencia")==1){
                                  document.cookie="gdependencia=0";
                                   $("#MensajeDependencia").html("");
                                
                                  $("#MensajeDependencia").html("<font color=\'green\'> Dependencia guardada con éxito cierre la pantalla modal y continue la carga");
                                  }
                              else{
                                  $("#MensajeDependencia").html("<font color=\'red\'>Llene todos los campos");
                              }
                             
                            }',
                         
                            
                            ),array("class"=>'btn btn-conv')//,'data-dismiss'=>'modal')
                      ); ?>
                   
                    <div id="resultado"></div>
                    </div>

              <?php $this->endWidget(); ?>  

                </div>
                <div class="modal-footer">
                   <!-- <button  type="button" class="btn btn-conv" data-dismiss="modal"> Cerrar</button>-->
                  
        
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

<!--                                   PANTALLA MODAL CLASIFICACIÓN                !-->

<div class="modal fade" id="miclasificacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Agregar Nueva Clasificación</h4>
                </div>            
                <div class="modal-body">

                  
                    <?php 
                       $formc=$this->beginWidget("CActiveForm",array(  
                        'method' => 'POST',
                         'action'=> Yii::app()->createUrl('convenios/create'),
                         'id'=>'clasificacion',
                        // 'enableAjaxValidation'=>true,
                         'enableClientValidation'=> true,
                         'clientOptions'=> array(
                            'validateOnSubmit'=> true,
                            'validateOnChange'=> true,
                            'validateOnType'=>true,
                          ),
                          'htmlOptions'=>array('class'=>'form-horizontal'),                      
                       ));

                      ?>     

                          <div id="MensajeClasificacion"></div>
                          <br>
                         <div class="form-group">
                    
                             <?php  echo $formc->labelEx($clas,'nombreClasificacionConvenio',array('class'=>'control-label col-sm-2')); ?>
                          <div class="col-sm-10">
                            <?php  echo $formc->textField($clas,"nombreClasificacionConvenio",array('class'=>'form-control input-sm'));?>
                            <?php  echo $formc->error($clas,"nombreClasificacionConvenio"); ?>
                            </div>
                         </div>

                          <div class="form-group">   
                          <?php  echo $formc->labelEx($clas,'descripcionClasificacionConvenio',array('class'=>'control-label col-sm-2')); ?>
                           <div class="col-sm-10">
                          <?php  echo $formc->textField($clas,"descripcionClasificacionConvenio",array('class'=>'form-control input-sm'));?>
                          <?php echo $formc->error($clas,"descripcionClasificacionConvenio"); ?>
                           </div>
                           </div>

                
                          <div class="row">
                            <div class="col-sm-10"></div>
                    <?php   echo CHtml:: ajaxSubmitButton(
                            'Guardar', array('convenios/guardarclasificacion'),array(
                             //'type'=>'post',
                             //'dataType'=>'json', 
                            //'beforeSend'=>'js:function(){ alert(\'antes de enviar\')}',

                            'update'=>'#PasounoForm_clasificacion',
                            'complete'=>'js:function(data){
                              if(getCookie("gclasificacion")==1){
                                  document.cookie="gclasificacion=0";
                                   $("#MensajeClasificacion").html("");
                                
                                  $("#MensajeClasificacion").html("<font color=\'green\'>Clasificacion guardada con éxito cierre la pantalla modal y continue la carga");
                                  }
                              else{
                                  $("#MensajeClasificacion").html("<font color=\'red\'> Llene todos los campos");
                              }
                             
                            }',
                         
                            
                            ),array("class"=>'btn btn-conv')//,'data-dismiss'=>'modal')
                      ); ?>
                   
                    <div id="resultado"></div>
                    </div>

              <?php $this->endWidget(); ?>  

                </div>
                <div class="modal-footer">
                
                </div>
        </div>
    </div>
</div>

<!--                                   PANTALLA MODAL ESTADO                !-->

<div class="modal fade" id="miestado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Agregar Nuevo Estado</h4>
                </div>            
                <div class="modal-body">

                  
                    <?php 
                       $forme=$this->beginWidget("CActiveForm",array(  
                        'method' => 'POST',
                         'action'=> Yii::app()->createUrl('convenios/create'),
                         'id'=>'clasificacion',
                        // 'enableAjaxValidation'=>true,
                         'enableClientValidation'=> true,
                         'clientOptions'=> array(
                            'validateOnSubmit'=> true,
                            'validateOnChange'=> true,
                            'validateOnType'=>true,
                          ),
                          'htmlOptions'=>array('class'=>'form-horizontal'),                      
                       ));

                      ?>     

                          <div id="MensajeEstado"></div>
                          <br>
                         <div class="form-group">
                    
                             <?php  echo $forme->labelEx($est,'nombreEstadoConvenio',array('class'=>'control-label col-sm-2')); ?>
                          <div class="col-sm-10">
                            <?php  echo $forme->textField($est,"nombreEstadoConvenio",array('class'=>'form-control input-sm'));?>
                            <?php  echo $forme->error($est,"nombreEstadoConvenio"); ?>
                            </div>
                         </div>

                          <div class="form-group">   
                          <?php  echo $formc->labelEx($est,'descripcionEstadoConvenio',array('class'=>'control-label col-sm-2')); ?>
                           <div class="col-sm-10">
                          <?php  echo $formc->textField($est,"descripcionEstadoConvenio",array('class'=>'form-control input-sm'));?>
                          <?php echo $formc->error($est,"descripcionEstadoConvenio"); ?>
                           </div>
                           </div>

                
                          <div class="row">
                            <div class="col-sm-10"></div>
                    <?php   echo CHtml:: ajaxSubmitButton(
                            'Guardar', array('convenios/guardarestado'),array(
                             //'type'=>'post',
                             //'dataType'=>'json', 
                            //'beforeSend'=>'js:function(){ alert(\'antes de enviar\')}',

                            'update'=>'#PasounoForm_estado',
                            'complete'=>'js:function(data){
                              if(getCookie("gestado")==1){
                                  document.cookie="gestado=0";
                                   $("#MensajeEstado").html("");
                                
                                  $("#MensajeEstado").html("<font color=\'green\'>Estado guardado con éxito cierre la pantalla modal y continue la carga");
                                  }
                              else{
                                  $("#MensajeEstado").html("<font color=\'red\'> Llene todos los campos");
                              }
                             
                            }',
                         
                            
                            ),array("class"=>'btn btn-conv')//,'data-dismiss'=>'modal')
                      ); ?>
                   
                    <div id="resultado"></div>
                    </div>

              <?php $this->endWidget(); ?>  

                </div>
                <div class="modal-footer">
                
                </div>
        </div>
    </div>
</div>

<script type="text/javascript">

        $('#PasounoForm_estado').change(function() {
                var estado=document.getElementById("PasounoForm_estado").value;
                if(estado==5){
                   
                    var boton= document.getElementById("botonsiguiente").disabled=false;
                }
                else{
                   var boton= document.getElementById("botonsiguiente").disabled=true;
                }
        })

        function desabilitar_boton(){
            

        }
      
        function limpiarmodaldependencia(){
          var nom=document.getElementById("Dependencias_nombreDependencia");
          nom.value="";
          var tel=document.getElementById("Dependencias_telefonoDependencia");
          tel.value="";
          var msj=document.getElementById("MensajeDependencia");
          msj.innerHTML=" ";
        }
         function limpiarmodalclasificacion(){
          var nom=document.getElementById("Clasificacionconvenios_nombreClasificacionConvenio");
          nom.value="";
          var tel=document.getElementById("Clasificacionconvenios_descripcionClasificacionConvenio");
          tel.value="";
          var msj=document.getElementById("MensajeClasificacion");
          msj.innerHTML=" ";
        }
         function limpiarmodalestado(){
          var nom=document.getElementById("Estadoconvenios_nombreEstadoConvenio");
          nom.value="";
          var tel=document.getElementById("Estadoconvenios_descripcionEstadoConvenio");
          tel.value="";
          var msj=document.getElementById("MensajeEstado");
          msj.innerHTML=" ";
        }
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
        function validardependencia(){
         var mensaje= document.getElementById("MensajeDependencia");

         //mensaje.innerHTML=getCookie("gdependencia");
         // mensaje.innerHTML=getCookie("gdependencia");
         if(getCookie("gdependencia")=="1"){
           mensaje.innerHTML="Nueva Dependencia guardada con éxito";
           //alert("dependencia guardada con exito");
         
         }

        
          

        }
         function validardependencia2(){
       
            var numero=0;
            document.cookie="gdependencia="+numero;
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