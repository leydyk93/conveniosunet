<?php $this->pageTitle=Yii::app()->name . ' - Consultar Convenios';
      $this->breadcrumbs=array(
    'Consultar Convenios',
);
?>

<?php 
/*if($ojo!=null){
          while(($row=$ojo->read())!==false) { 
              echo $resultado3->nombre_convenio." ";
              echo $resultado3->fecha_inicio." ";
              echo $resultado3->fecha_caducidad." ";
              echo $resultado3->tipo_convenio." ";
              echo $resultado3->estado_actual_convenio;
              echo "<br>";
           }
}*/
/*if(isset($_POST['ConsultasConvenios']['tipo'])&&$_POST['ConsultasConvenios']['tipo']!=null){
 
  foreach ($_POST['ConsultasConvenios']['tipo'] as $key) {
    echo "tipo ".$key;
  }
}
if(isset($_POST['ConsultasConvenios']['clasificacion'])&&$_POST['ConsultasConvenios']['clasificacion']!=null){
  
  $cadena3 = implode($_POST['ConsultasConvenios']['clasificacion']);
  echo "clasificacion ".$cadena3;
}
if(isset($_POST['ConsultasConvenios']['pais'])&&$_POST['ConsultasConvenios']['pais']!=null){
  echo "Pais".$_POST['ConsultasConvenios']['pais'];
}
if(isset($_POST['ConsultasConvenios']['tipo_institucion'])&&$_POST['ConsultasConvenios']['tipo_institucion']!=null){

  $cadena2 = implode($_POST['ConsultasConvenios']['tipo_institucion']);
 echo " tipo de Institucion es".$cadena2;
 
}
if(isset($_POST['ConsultasConvenios']['institucion'])&&$_POST['ConsultasConvenios']['institucion']!=null){
  echo "institucion".$_POST['ConsultasConvenios']['institucion'];
}
if(isset($_POST['ConsultasConvenios']['estadoConv'])&&$_POST['ConsultasConvenios']['estadoConv']!=null){
  $cadena2 = implode($_POST['ConsultasConvenios']['estadoConv']);
 echo " Estado es".$cadena2;
}*/
 ?>

<?php 
  $form=$this->beginWidget('CActiveForm',
    array(
      'method' =>'POST',
      'action' =>Yii::app()->createUrl('site/convenioConsultar'),
      'id' => 'form',
      'enableAjaxValidation' => true,
      'enableClientValidation' => true,
      'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
        ),
      ));
 ?>


      
<div class="row">
  <div class="col-sm-4">
       <section>
        <h4><a href="index.php?r=convenios/create"><span class="glyphicon glyphicon-plus-sign"></span></a>Nuevo Convenio Marco</h4>
        <h4><span class="glyphicon glyphicon-database-plus"></span>Agregar información</h4>
       </section> 

        <div class="row">
          <div class="col-sm-6">
        <h4>Filtrar Por:</h4>
          </div>
          <div class="col-sm-6">
          <?php 
          echo CHtml::submitButton('Consultar', array('class'=>'btn btn-conv'));
          ?>
          </div>
        </div>

      <ul class="nav nav-pills nav-stacked">
        <li><a> <?php echo $form->labelEx($model,'anio'); ?>
            <?php 
              echo $form->textField($model,'anio');
              echo $form->error($model,'anio');
             ?>  
             </a>  
        </li> 
        <li >
          <a ><?php echo $form->labelEx($model,'tipo'); ?></a>
          
             <?php 
               $list=CHtml::listData($tipoconve,'idTipoConvenio','descripcionTipoConvenio');
               echo $form->checkBoxList($model,'tipo',$list/*,
                 
                array('template'=>'<li><a> {input}{label} </a></li>')*/
               
                );
              ?> 
              

        </li>
        <li  ><!--<a > <div><?php  /*echo $form->labelEx($model,'clasificacion');*/ ?></div></a>-->
          <a ><?php echo $form->labelEx($model,'clasificacion'); ?> </a>
           
           <?php  
            $list2=CHtml::listData($clasif,'idClasificacionConvenio','nombreClasificacionConvenio');
            echo $form->checkBoxList($model,'clasificacion', 
                      $list2/*,
                      array('template'=>'<li><a> {input}{label} </a></li>')*/
                      );
           ?>
          
        </li>
        <li ><a><div><?php echo $form->labelEx($model,'contraparte'); ?> </div></a>
         
         <ul >
            <li>
              <?php  
                  echo $form->labelEx($model,'pais');
                  $list3=CHtml::listData($paisesconve,'idPais', 'nombrePais');
                  echo $form->dropDownList($model,'pais', 
                            $list3,
                            array('empty' => 'Todos'));
              ?>
              
            </li>
            <li><div><?php echo $form->labelEx($model,'tipo_institucion'); ?></div></a>
               <?php 
                 $list4=CHtml::listData($tiposinst,'idTipoInstitucion','nombreTipoInstitucion');
                 echo $form->checkBoxList($model,'tipo_institucion', $list4
                    /*array('separator'=>' ','labelOptions'=>array('style'=>'display:inline'))*/
                  ); 
              ?>
            </li>
            <li>
            <?php 
               echo $form->labelEx($model,'institucion');
               $list5=CHtml::listData($institucionconve,'idInstitucion','nombreInstitucion');
              echo $form->dropDownList($model,'institucion', 
                        $list5,
                        array('empty' => 'Todos'));
            ?>
            </li>
          </ul>
         
        </li>
        <li><a><div><?php echo $form->labelEx($model,'estadoConv'); ?></div></a>
           <?php 
           
           $list6=CHtml::listData($estadoconve,'idEstadoConvenio','nombreEstadoConvenio');   
           echo $form->checkBoxList($model,'estadoConv', $list6
              /*array('separator'=>' ','labelOptions'=>array('style'=>'display:inline'))*/
            );    
        ?>
          
        </li>
      </ul>
     
  </div>
    
            <div id="Resulconvenios" class="col-sm-8">
                 <div class="list-group">
                 
                  <?php while((($row=$ojo->read())!==false)&& $ojo!=null) {?>
                 <aside class="list-group-item" >
                   <div class="row">
                      <div class="col-sm-2"><p class="text-info"><?php  echo $resultado3->tipo_convenio." ";  ?><p> </div>
                      <div class="col-sm-10">
                      <?php echo $resultado3->nombre_convenio; ?> 
                      </div> 
                  </div>

       
                  <div class="row">
                    <div class="col-sm-8">
                        <ul>
                        <li>Fecha Inicio: <span class="text-muted"><?php  echo $resultado3->fecha_inicio." "; ?></span></li>
                        <li>Fecha Caducidad:<span class="text-muted"> <?php echo $resultado3->fecha_caducidad." "; ?></span></li>
                        <li>objetivo: <span class="text-muted"> <?php echo $resultado3->objetivo_convenio." "; ?></span></li>
                        <li>Estado del Convenio:<span class="text-muted"> <?php echo $resultado3->estado_actual_convenio." ";?></span> </li>
                        <li>Institucion: </li>
                        <li>Responsable UNET: </li>
                      </ul> 
                      </div>
                      
                      <div  class="col-sm-4"> 
                        <ul class="list-inline">
                          <li ><a href=""><span class="glyphicon glyphicon-plus"></span></a></li>
                          <li><a href=""><span class="glyphicon glyphicon-pencil"></span></a></li>
                          <li><a href=""><span class="glyphicon glyphicon-time"></span></a></li>
                          <li><a href=""><span class="glyphicon glyphicon-refresh"></span></a></li>
                          <li><a href=""><span class="glyphicon glyphicon-cloud-download"></a></span></li>
                          <li><a href=""><span class="glyphicon glyphicon-trash"></span></a></li> 
                          </ul>
                      </div>
                    
                  </div>
                 </aside>
                 <?php 
                 } 
                 ?> 
              </div>
            </div>    
</div>



 <?php $this->endWidget(); ?>





