
<h1>Reporte</h1>
<?php    echo CHtml:: form(); ?>
 <?php 
      $form=$this->beginWidget('CActiveForm',
        array(
          'method' =>'POST',
          'action' =>Yii::app()->createUrl('convenios/_ajaxContent'),
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
   <label for="titulo">Titulo</label>
 <?php  echo CHtml:: textField('titulo');?> 
 <?php  echo CHtml::button('Reportes',array('onclick'=>'javascript:print();','class'=>'btn btn-conv btn-md')); ?>
 <?php $this->endWidget(); ?>


<?php echo $data; ?>