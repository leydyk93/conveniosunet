
<?php $this->pageTitle=Yii::app()->name . ' - Consultar Convenios';
      $this->breadcrumbs=array(
    'Consultar Convenios',
);
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

 <section>
      <h4><a href="index.php?r=convenios/create"><span class="glyphicon glyphicon-plus-sign"></span></a>Nuevo Convenio</h4>
      <h4><span class="glyphicon glyphicon-database-plus"></span>Agregar información</h4>
</section> 


<p>Filtrar por: </p>
 <?php 
  echo CHtml::submitButton('Consultar');
  ?>

<div class="row">

 <?php 
  echo $form->labelEx($model,'anio');
  echo $form->textField($model,'anio');
  echo $form->error($model,'anio');

  ?>
</div>
 
<div class="row">
<?php 
     echo $form->labelEx($model,'tipo');
     $list=CHtml::listData($tipoconve,'idTipoConvenio','descripcionTipoConvenio');
     echo $form->checkBoxList($model,'tipo',$list);
?>
</div>

<div class="row">
<?php  
    echo $form->labelEx($model,'clasificacion');
    $list2=CHtml::listData($clasif,'idClasificacionConvenio','nombreClasificacionConvenio');
  	echo $form->dropDownList($model,'clasificacion', 
              $list2,
              array('empty' => 'Todos'));

?>
</div>

<p>Datos de la contraparte </p>
<?php  
    echo $form->labelEx($model,'pais');
    $list3=CHtml::listData($paisesconve,'idPais', 'nombrePais');
    echo $form->dropDownList($model,'pais', 
              $list3,
              array('empty' => 'Todos'));

?>

<?php 
    echo $form->labelEx($model,'tipo_institucion');
     $list4=CHtml::listData($tiposinst,'idTipoInstitucion','nombreTipoInstitucion');
     echo $form->checkBoxList($model,'tipo_institucion', $list4
        /*array('separator'=>' ','labelOptions'=>array('style'=>'display:inline'))*/
      ); 
?>

<?php 
     echo $form->labelEx($model,'institucion');
     $list5=CHtml::listData($institucionconve,'idInstitucion','nombreInstitucion');
    echo $form->dropDownList($model,'institucion', 
              $list5,
              array('empty' => 'Todos'));
 ?>
  
 <?php 
     echo $form->labelEx($model,'estadoConv');
     $list6=CHtml::listData($estadoconve,'idEstadoConvenio','nombreEstadoConvenio');   
     echo $form->checkBoxList($model,'estadoConv', $list6
        /*array('separator'=>' ','labelOptions'=>array('style'=>'display:inline'))*/
      );    
  ?>

 <?php $this->endWidget(); ?>








		
	
	