<?php
/* @var $this CargarController */

$this->breadcrumbs=array(
	'Cargar',
);
?>
<div class="container-fluid">
<h4>Informacion de las partes</h4>
<form class="form-horizontal" role="form">
	<h4>UNET</h4>
	<div class="form-group">
    <label class="control-label col-sm-2" for="inst">Institucion:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inst" placeholder="Universidad Nacional Experimental del tachira">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Instancia Responsable</label>
    <div class="col-sm-10"> 
    	<select class="form-control">
								  <option>Rectorado</option>
								  <option>Otro</option>
		</select>
     
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Responsable</label>
    <div class="col-sm-10"> 
    	<select class="form-control">
								  <option>Matias fe</option>
								  <option>Julio Pulido</option>
		</select>
     
    </div>
  </div>
  <h4>Contraparte</h4>
 
  <div class="form-group">
    <label class="control-label col-sm-2" >Pais</label>
    <div class="col-sm-10"> 
    	<select class="form-control">
								  <option>Venezuela</option>
								  <option>Ecuador</option>
		</select>
     
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Localidad</label>
    <div class="col-sm-10"> 
    	<select class="form-control">
								  <option>Tachira</option>
								  <option> </option>
		</select>
     
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="nomb2">Institución</label>
    <div class="col-sm-10"> 
      <select class="form-control">
                    
                      <option>ULA</option>
                      <option>UCAT</option>
                      
      </select>
  </div>

  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Instancia Responsable</label>
    <div class="col-sm-10"> 
      <select class="form-control">
                  <option>Rectorado</option>
                  <option>Otro</option>
    </select>
     
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Responsable</label>
    <div class="col-sm-10"> 
      <select class="form-control">
                  <option>Matias fe</option>
                  <option>Julio Pulido</option>
    </select>
     
    </div>
  </div>
  
	<div class="row">
			<ul class="pager">
		    <li><a href="index.php?r=cargar/paso1"><button type="button" class="btn btn-conv ">Anterior</button></a></li>
		    <li><a href="index.php?r=cargar/paso3"><button type="button" class="btn btn-conv ">Siguiente</button></a></li>
		  </ul>
		</div>
	   
</form>
</div>


