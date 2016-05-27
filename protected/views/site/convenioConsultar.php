<?php 
  
 ?>

<?php $this->pageTitle=Yii::app()->name . ' - Consultar Convenios';
      $this->breadcrumbs=array(
	  'Consultar Convenios',
);
?>

 <h1>esta es Convenio Consultar</h1>  

 <?php foreach ($clasif as $cla) { 
    /*echo $cla->idClasificacionConvenio;*/ 
    echo $cla->nombreClasificacionConvenio." "; 
   
  } ?>

  <?php echo $formu; ?>





		
	
	