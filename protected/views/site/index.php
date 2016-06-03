<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<!--<i><?php /*echo CHtml::encode(Yii::app()->name);*/ ?></i>-->


<div class="container-fluid">
  <?php 
     // $_SESSION['variable']="blabla";
     // echo $_SESSION['variable'];

    
    if(isset($_POST['enviar']))
    {
      echo "presiono el boton ";
    } ?>
	<h2> Acuerdos que nos benefician a TODOS</h2>
  <div class="row">
   <div class="col-sm-4">
     <h3>¿Cómo Establecer un convenio?</h3>
     <p>Debes llenar el Acta de intención, su formato esta disponible en <a>formato acta de intención</a>
     Puedes leer las normas y procedimientos o tambien puedes contactarnos</p>
     <button type="button" class="btn btn-conv">Ver Formatos</button>
  </div>

  <div class="col-sm-4">
     <h3>Conoce nuestras normas y procedimientos</h3>
    <p>Con la finalidad de estandarizar y facilitar el proceso de establecer un convenio se han creado las normas y procedimientos que los rigen</p>
<button type="button" class="btn btn-conv">Leer Más</button>

  </div>

  <div class="col-sm-4">
     <h3>Encuentra el convenio que buscabas</h3>
    <p>Consulta a partir de varios criterios como año, institución contraparte, pais y entre otras caracteristicas que te ofrecemos, de esta foma hallaras el convenio que buscabas</p>
  
   <button type="button" class="btn btn-conv">Consultar</button>      
  </div>
</div>

</div>