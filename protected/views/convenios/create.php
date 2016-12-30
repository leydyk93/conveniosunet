<?php
/* @var $this ConveniosController */
/* @var $model Convenios */

$this->breadcrumbs=array(
	'Convenios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Convenios', 'url'=>array('index')),
	array('label'=>'Manage Convenios', 'url'=>array('admin')),
);
?>
<div class="container">
	<?php   $this->renderPartial('_paso1', array("pasouno"=>$pasouno,"dep"=>$dep,"clas"=>$clas,"est"=>$est));?>
</div>
<!--<h1>Crear Convenios</h1>-->

<!-- 
esta linea es 
<?//php $this->renderPartial('_paso1', array("pasouno"=>$pasouno));
//if(isset($pasouno)){

//	 $this->renderPartial('_paso2', array("pasouno"=>$pasouno));
//}
	
	//if (isset($_SESSION['variable'])){
	//	$this->renderPartial('_paso2', array('model'=>$model)); 
	//}
?>-->