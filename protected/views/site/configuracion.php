<?php 
$this->pageTitle=Yii::app()->name . ' - Configuración';
$this->breadcrumbs=array(
	'Configuración',
);
 ?>
 <h4>Gestión de Información</h4>  



<div class="row">
  <div class="col-sm-4"> 
  	<ul class="list-group">
			  <li class="list-group-item list-group-item-success">Instituciones</li>
			  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-plus"></span></a>Tipos de Instituciones</li>
			  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-plus"></span></a> Instituciones </li>
			  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-plus"></span></a>Dependencias</li>
	</ul>
  </div>
  <div class="col-sm-4">
  		<ul class="list-group">
			  <li class="list-group-item list-group-item-success">Convenios</li>
			  <li class="list-group-item"><a  href="<?php echo $this->createUrl( '/tipoconvenios/create' ) ?>"><span class="glyphicon glyphicon-plus"></span></a><a  href="<?php echo $this->createUrl( '/tipoconvenios/index' ) ?>">Tipos de Convenio</a></li>
			  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-plus"></span></a>Clasificacion de los convenios</li>
			  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-plus"></span></a>Estados para los convenios</li>
		</ul>
  </div>
  <div class="col-sm-4">
  		<ul class="list-group">
			  <li class="list-group-item list-group-item-success">Responsables</li>
			  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-plus"></span></a>Tipos de Responsables</li>
			  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-plus"></span></a>Responsables UNET</li>
			  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-plus"></span></a>Responsables Contraparte</li>
		</ul>
  </div>
</div>


  
 <!--<h5>Instituciones</h5>
 <ul>
 	<li>Tipos de institucion
	<p> Permite clasificar las instituciones de acuerdo a las actividades que desempeñan </p>
 	</li>
 	<li>Instituciones
	<p> Almacena la informacion de todas aquellas instituciones con las cuales la UNET tiene algun convenio, estas pueden ser tanto nacionales como internacionales</p>
 	</li>
 	
	<li>Dependencias</li>
 </ul>

<h5>Convenios</h5>
<ul>
	<li>Tipos de Convenios
	<p>clasificacion de los convenios de acuerdo a su alcance pueden ser Marcos o especificos</p>
	</li>
	<li>Clasificación de los convenios
	<p>De acuerdo al area del convenio </p>
	</li>
	
</ul>

<h5>Responsables</h5>
<ul>
	<li>Tipos de Responsables
	<p>Los responsables pueden ser legal o de contacto. 
		El Legal corresponde al rector de la institucion
		El de Contacto es el responsable de un convenio para una institucion</p>
	</li>
	<li>Responsables UNET
	<p>Profesores y directivos que sean responsables de contacto de algun convenio</p>
	</li>
	<li>Responsables Contraparte
	<p>Son todos los docentes o directivos de otras instituciones responsables de contacto para los convenios  </p>
	</li>
</ul>-->
