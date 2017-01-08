<?php 
$this->pageTitle=Yii::app()->name . ' - Configuración';
$this->breadcrumbs=array(
	'Configuración',
);
 ?>

 <div class="container">
 <h4>Gestión de Información en la Base de Datos </h4> 
 <p>Seleccione la tabla que desea modificar</p>


<div id="tablasBD" class="row">
  <div class="col-sm-4"> 
  	<ul class="list-group">
			  <li class="list-group-item list-group-item-success">Instituciones</li>
			  <li class="list-group-item"><a  href="<?php echo $this->createUrl( '/tiposinstituciones/admin' ) ?>">Tipos de Instituciones</a></li>
			  <li class="list-group-item"><a  href="<?php echo $this->createUrl( '/instituciones/admin' ) ?>">Instituciones</a></li>
			  <li class="list-group-item"><a  href="<?php echo $this->createUrl( '/dependencias/admin' ) ?>">Dependencias</a></li>
	</ul>
  </div>
  <div class="col-sm-4">
  		<ul class="list-group">
			  <li class="list-group-item list-group-item-success">Convenios</li>
			  <li class="list-group-item"><a  href="<?php echo $this->createUrl( '/tipoconvenios/admin' ) ?>">Tipos de Convenio</a></li>
			  <li class="list-group-item"><a  href="<?php echo $this->createUrl( '/clasificacionconvenios/admin' ) ?>">Clasificación de los convenios</a></li>
			  <li class="list-group-item"><a  href="<?php echo $this->createUrl( '/estadoconvenios/admin' ) ?>">Estados para los convenios</a></li>
		</ul>
  </div>
  <div class="col-sm-4">
  		<ul class="list-group">
			  <li class="list-group-item list-group-item-success">Responsables</li>
			  <li class="list-group-item"><a  href="<?php echo $this->createUrl( '/tiporesponsable/admin' ) ?>">Tipos de Responsables</a></li>
			  <li class="list-group-item"><a  href="<?php echo $this->createUrl( '/responsables/admin' ) ?>">Responsables UNET</a></li>
			  <li class="list-group-item">Responsables Contraparte</li>
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

<ul class="breadcrumb text-right">
  <li><a href="<?php echo $this->createUrl("site/index"); ?>">Home</a></li>
  <li><a href="<?php echo $this->createUrl("convenios/consultar"); ?>">consultar Convenios</a></li>
</ul>

</div>
