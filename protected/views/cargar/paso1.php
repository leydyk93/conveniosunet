<?php
/* @var $this CargarController */

$this->breadcrumbs=array(
	'Cargar',
);
?>

<div class="container-fluid">
<h4>Datos Generales del convenio</h4>
<form class="form-horizontal" role="form">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Codigo:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" placeholder="tipo-nroSecuencia">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Tipo de Convenio</label>
    <div class="col-sm-10"> 
    	<select class="form-control">
								  <option>Marco</option>
								  <option>Especifico</option>
		</select>
     
    </div>
  </div>
 <div class="form-group">
    <label class="control-label col-sm-2" for="nom">Nombre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nom" placeholder="nombre">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="nomb">Fecha incio</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="nomb" placeholder="nomb">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="nomb2">Fecha Caducidad</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="nomb2" placeholder="nomb2">
    </div>
  </div>
  	
  	<div class="form-group">
    <label class="control-label col-sm-2" for="nomb2">Estado</label>
    <div class="col-sm-10"> 
      <select class="form-control">
                  <option>Memo S.C Juridica</option>
                  <option>Memo R.C Juridica</option>
                   <option>Memo C. Secretaria</option>
                  <option>Resolucion C.U # 1</option>

    </select>
    
  </div>   
</form>
</div>

										