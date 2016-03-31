<?php
/* @var $this CargarController */

$this->breadcrumbs=array(
	'Cargar',
);
?>

<h3>Acta de Intencion</h3>

<section class="datos_convenio">
	
<p id="paso3_nombre">Nombre del Convenio</p>
<div class="row">
	<article class="col-md-6">
		<p>Fecha de Inicio:</p>
		<p>Fecha de Caducidad:</p>
		<p>Estado del convenio:</p>
		<p>Institucion Contraparte:</p> 
	</article>
	<article class="col-md-6">
		<p>Dependencia</p>
		<p>Responsable Unet</p>
		<p>Responsable Contraparte</p>
	</article>
</div>
</section>
<h3>Datos de Acta de Intención </h3>

<section class="datos_acta">
		<div class="form-group row">
			<div class="col-md-2">
			<label for="comment" > Nro Acta</label>
			</div>
			<div class="col-md-8">
			 <input type="text" class="form-control" id="Nro_Acta">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-2">
			<label for="comment" > Fecha</label>
			</div>
			<div class="col-md-8">
			 <input type="text" class="form-control" id="Fecha">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-2">
			<label for="comment" > URL Acta</label>
			</div>
			<div class="col-md-8">
		 <input type="text" class="form-control" id="Url">
			</div>
		</div>
</section>
<h4><a href=""><span class="glyphicon glyphicon-plus-sign"></span></a>Adjuntar Archivo</h4>
<p id="campos">(*) Campos Obligatorios</p>
 <div class="row">
			<ul class="pager">
		    <li><a href="#">Anterior</a></li>
		    <li><a href="#">Siguiente</a></li>
		  </ul>
		</div>


