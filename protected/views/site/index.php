<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<!--<i><?php /*echo CHtml::encode(Yii::app()->name);*/ ?></i>-->

  <?php 
    if(isset($_POST['enviar']))
    {
      echo "presiono el boton ";
    } ?>
 
  <div id="fondoimg" class="jumbotron">    
     <div class="container">
     <div class="text-center">
      <h2 class="text-center"></h2>
      <h2 class="text-center"></h2>
      <a href="<?php echo $this->createUrl( '/convenios/Consultar' ); ?>" class="btn btn-conv  btn-lg">Consultar</a> 
     </div> 
     
    </div>

  </div>
  <h2 class="text-center h2Familia">Acuerdos que nos benefician a todos</h2> 
<div class="container">
  <div class="row">
   <div class="col-sm-6">
     <h3>¿Cómo Establecer un convenio?</h3>
     <p>Debes llenar el Acta de intención, su formato esta disponible en <a>formato acta de intención</a>
     Puedes leer las normas y procedimientos o tambien puedes contactarnos</p>
      <a href="<?php echo $this->createUrl( '/site/informacion' ); ?>" class="btn btn-conv btn-lg">Ver Formatos</a>   
  </div>

  <div class="col-sm-6">
    <h3>Encuentra el convenio que buscabas</h3>
    <p>Consulta a partir de varios criterios como año, institución contraparte, pais y entre otras caracteristicas que te ofrecemos, de esta foma hallaras el convenio que buscabas</p>
    <a href="<?php echo $this->createUrl( '/convenios/Consultar' ); ?>" class="btn btn-conv btn-lg">Consultar</a>   
  </div>
</div>



</div>

