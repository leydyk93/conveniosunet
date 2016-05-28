<?php $this->pageTitle=Yii::app()->name . ' - Consultar Convenios';
      $this->breadcrumbs=array(
	  'Consultar Convenios',
);
?>



<section>
			<h4><a href="index.php?r=convenios/create"><span class="glyphicon glyphicon-plus-sign"></span></a>Nuevo Convenio</h4>
			<h4><span class="glyphicon glyphicon-database-plus"></span>Agregar información</h4>
</section> 


 <!--<?php /*foreach ($clasif as $cla)  comprobando que los datos vienen del controlador action*/{  
   
  /*  echo $cla->nombreClasificacionConvenio." ";*/ 
   
  } ?>-->
 
 <?php /*para el calendario*/
  /*$this->widget('zii.widgets.jui.CJuiDatePicker', array(
   'model'=>$conve,
   'attribute'=>'fecha_creacion',
   'value'=>$conve->fecha_creacion,
   'language' => 'es',
   'options'=>array(
    'autoSize'=>true,
    'dateFormat'=>'yy-mm-dd',
    'selectOtherMonths'=>true,
    'showAnim'=>'slide',
    'showButtonPanel'=>true,
    'showOn'=>'button', 
    'showOtherMonths'=>true, 
    'changeMonth' => 'true', 
    'changeYear' => 'true', 
    
    ),
  ));*/ 
 ?>

<?php echo CHtml::textField('Text'); ?>

<?php 
     $list=CHtml::listData($tipoconve,'idTipoConvenio','descripcionTipoConvenio');
     

     echo CHtml::checkBoxList('TipoC',' ', $list
        /*array('separator'=>' ','labelOptions'=>array('style'=>'display:inline'))*/
      ); 
?>

<?php  

    $list2=CHtml::listData($clasif,'idClasificacionConvenio','nombreClasificacionConvenio');
  	echo CHtml::dropDownList('ClasificacionC',' ', 
              $list2,
              array('empty' => 'Todos'));

?>

<?php  

    $list3=CHtml::listData($paisesconve,'idPais', 'nombrePais');
    echo CHtml::dropDownList('PaisesC',' ', 
              $list3,
              array('empty' => 'Todos'));

?>

<?php 
     $list4=CHtml::listData($tiposinst,'idTipoInstitucion','nombreTipoInstitucion');
    
     echo CHtml::checkBoxList('TipoIC',' ', $list4
        /*array('separator'=>' ','labelOptions'=>array('style'=>'display:inline'))*/
      ); 
?>
   

 <!--<?php /*echo $formu; */?>-->








		
	
	