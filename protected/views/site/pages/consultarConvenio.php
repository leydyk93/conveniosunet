<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Consultar Convenios';
$this->breadcrumbs=array(
	'Consultar Convenios',
);
?>
<div class="row">
	<div class="col-sm-4">

		<section>
			<h4><a href=""><span class="glyphicon glyphicon-plus-sign"></span></a>Nuevo Convenio</h4>
			<h4><span class="glyphicon glyphicon-database-plus"></span>Agregar información</h4>
		</section>

		<section id="filtrado" >
			<h4>Filtrar Por:</h4>
			<div class="row">
				<div class="col-sm-2">
					Año: 		
				</div>	
				<div class="col-sm-4">
					<select class="form-control">
						  <option>Todos</option>
						  <option>2015</option>
						  <option>2016</option>
						  <option>2014</option>
						</select>
				</div>
			</div>
			
				<ul id="opcionesPrincipales">
					<li><a href="">Tipo de Convenio</a>
						<ul>
							<li>
								 <div class="checkbox">
								    <label><input type="checkbox">Marco</label>
								  </div>
							
							
								<div class="checkbox">
								    <label><input type="checkbox">Especifico</label>
								  </div>
							</li>
						</ul>
					</li>
					<li><a href="">Datos de la Contraparte</a>
						<ul>
							<li>
								
							<div class="row">
								<div class="col-sm-2">
									Pais:
								</div>	
								<div class="col-sm-8">
									<select class="form-control">
										<option>Todos</option>
										  <option>Venezuela</option>
										  <option>Colombia</option>
										  <option>Perú</option>
										</select>
								</div>
							</div>

							</li>
							<li>Tipo Institución
									<div class="checkbox">
								    <label><input type="checkbox">Educativa</label>
								  </div>	
								  <div class="checkbox">
								    <label><input type="checkbox">Salud</label>
								  </div>
								  <div class="checkbox">
								    <label><input type="checkbox">Económica</label>
								  </div>
								  <div class="checkbox">
								    <label><input type="checkbox">Gubernamental</label>
								  </div>	
							</li>
							<li>
									<div class="row">
								<div class="col-sm-3">
									Institución:
								</div>	
								<div class="col-sm-8">
									<select class="form-control">
										<option>Todos</option>
										  <option>ULA</option>
										  <option>UCAT</option>
										  
										</select>
								</div>
							</div>


							</li>
						</ul>
					</li>
					<li><a href="">Estado del Convenio</a>
						<ul>
							<li>
								<div class="checkbox">
								    <label><input type="checkbox">Memo S.C Juridica</label>
								  </div>	
								  <div class="checkbox">
								    <label><input type="checkbox">Memo R.C Juridica</label>
								  </div>
								  <div class="checkbox">
								    <label><input type="checkbox">Memo C. Secretaria</label>
								  </div>
								  <div class="checkbox">
								    <label><input type="checkbox">Resolucion C.U # 1</label>
								  </div>
								  <div class="checkbox">
								    <label><input type="checkbox">Resolucion C.U Aprobado</label>
								  </div>
								  <div class="checkbox">
								    <label><input type="checkbox">Memo DICIPREP</label>
								  </div>
							</li>
						
						</ul>
					</li>
					<li><a href="">Responsable</a>
					<ul>
						<li>

							<div class="row">
								<div class="col-sm-3">
									UNET
								</div>	
								<div class="col-sm-8">
									<select class="form-control">
										  <option>Todos</option>
										  <option>Juan Peréz</option>
										  <option>Monica Garcia</option>
										  <option>Perú</option>
										</select>
								</div>
							</div>
							
						</li>
						<li>
							<div class="row">
								<div class="col-sm-3">
									Contraparte
								</div>	
								<div class="col-sm-8">
									<select class="form-control">
										  <option>Todos</option>
										  <option>Marisol Urbina</option>
										  <option>Steven Moreno</option>
										  <option>Christiam Moreno</option>
										</select>
								</div>
							</div>

						</li>
					</ul>
					</li>
					<li><a href="">Clasificacion</a>
					<ul>

						<li>
							<div class="checkbox">
								    <label><input type="checkbox">Academico</label>
								  </div>	
								  <div class="checkbox">
								    <label><input type="checkbox">Intercambio</label>
								  </div>
						</li>
					</ul>
					</li>
				</ul>
			
		</section>	
	</div>
	<div id="Resulconvenios" class="col-sm-8">
		 <div class="list-group">
		 	<aside class="list-group-item">Marco Nombre del Convenio
		 		<div class="row">
		 			<div class="col-sm-4">
		 				<ul>
						<li>Fecha Inicio: </li>
						<li>Fecha Caducidad: </li>
						<li>Estado del Convenio: </li>
						<li>Institucion: </li>
						<li>Responsable UNET: </li>
					</ul>	
		 			</div>
		 			<div class="col-sm-4">Clasificacion:
		 			</div>
		 			<div  class="col-sm-4"> 
		 				<ul class="list-inline">
							<li ><a href=""><span class="glyphicon glyphicon-plus"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-pencil"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-time"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-refresh"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-cloud-download"></a></span></li>
							<li><a href=""><span class="glyphicon glyphicon-trash"></span></a></li>	
					    </ul>
		 			</div>
		 			
		 		</div>
		 		
		 	</aside>
		 	<aside class="list-group-item">Marco Nombre del Convenio
		 		<div class="row">
		 			<div class="col-sm-4">
		 				<ul>
						<li>Fecha Inicio: </li>
						<li>Fecha Caducidad: </li>
						<li>Estado del Convenio: </li>
						<li>Institucion: </li>
						<li>Responsable UNET: </li>
					</ul>	
		 			</div>
		 			<div class="col-sm-4">Clasificacion:
		 			</div>
		 			<div  class="col-sm-4"> 
		 				<ul class="list-inline">
							<li ><a href=""><span class="glyphicon glyphicon-plus"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-pencil"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-time"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-refresh"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-cloud-download"></a></span></li>
							<li><a href=""><span class="glyphicon glyphicon-trash"></span></a></li>	
					    </ul>
		 			</div>
		 			
		 		</div>
		 		
		 	</aside>
		 	<aside class="list-group-item">Marco Nombre del Convenio
		 		<div class="row">
		 			<div class="col-sm-4">
		 				<ul>
						<li>Fecha Inicio: </li>
						<li>Fecha Caducidad: </li>
						<li>Estado del Convenio: </li>
						<li>Institucion: </li>
						<li>Responsable UNET: </li>
					</ul>	
		 			</div>
		 			<div class="col-sm-4">Clasificacion:
		 			</div>
		 			<div  class="col-sm-4"> 
		 				<ul class="list-inline">
							<li ><a href=""><span class="glyphicon glyphicon-plus"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-pencil"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-time"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-refresh"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-cloud-download"></a></span></li>
							<li><a href=""><span class="glyphicon glyphicon-trash"></span></a></li>	
					    </ul>
		 			</div>
		 			
		 		</div>
		 		
		 	</aside>

		 	<aside class="list-group-item">Marco Nombre del Convenio
		 		<div class="row">
		 			<div class="col-sm-4">
		 				<ul>
						<li>Fecha Inicio: </li>
						<li>Fecha Caducidad: </li>
						<li>Estado del Convenio: </li>
						<li>Institucion: </li>
						<li>Responsable UNET: </li>
					</ul>	
		 			</div>
		 			<div class="col-sm-4">Clasificacion:
		 			</div>
		 			<div  class="col-sm-4"> 
		 				<ul class="list-inline">
							<li ><a href=""><span class="glyphicon glyphicon-plus"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-pencil"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-time"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-refresh"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-cloud-download"></a></span></li>
							<li><a href=""><span class="glyphicon glyphicon-trash"></span></a></li>	
					    </ul>
		 			</div>
		 			
		 		</div>
		 		
		 	</aside>

			<aside class="list-group-item">Marco Nombre del Convenio
		 		<div class="row">
		 			<div class="col-sm-4">
		 				<ul>
						<li>Fecha Inicio: </li>
						<li>Fecha Caducidad: </li>
						<li>Estado del Convenio: </li>
						<li>Institucion: </li>
						<li>Responsable UNET: </li>
					</ul>	
		 			</div>
		 			<div class="col-sm-4">Clasificacion:
		 			</div>
		 			<div  class="col-sm-4"> 
		 				<ul class="list-inline">
							<li ><a href=""><span class="glyphicon glyphicon-plus"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-pencil"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-time"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-refresh"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-cloud-download"></a></span></li>
							<li><a href=""><span class="glyphicon glyphicon-trash"></span></a></li>	
					    </ul>
		 			</div>
		 			
		 		</div>
		 		
		 	</aside>


		 	<aside class="list-group-item">Marco Nombre del Convenio
		 		<div class="row">
		 			<div class="col-sm-4">
		 				<ul>
						<li>Fecha Inicio: </li>
						<li>Fecha Caducidad: </li>
						<li>Estado del Convenio: </li>
						<li>Institucion: </li>
						<li>Responsable UNET: </li>
					</ul>	
		 			</div>
		 			<div class="col-sm-4">Clasificacion:
		 			</div>
		 			<div  class="col-sm-4"> 
		 				<ul class="list-inline">
							<li ><a href=""><span class="glyphicon glyphicon-plus"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-pencil"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-time"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-refresh"></span></a></li>
							<li><a href=""><span class="glyphicon glyphicon-cloud-download"></a></span></li>
							<li><a href=""><span class="glyphicon glyphicon-trash"></span></a></li>	
					    </ul>
		 			</div>
		 			
		 		</div>
		 		
		 	</aside>

		 	<!-- La instruccion mas simple-->
		 	<!--<a href="" class="list-group-item" ><article >kdmks </article></a>-->
		   		    
		  </div>

		  <div class="row">
			<ul class="pager">
		    <li><a href="#">Anterior</a></li>
		    <li><a href="#">Siguinete</a></li>
		  </ul>
		</div>

</div>
</div>






