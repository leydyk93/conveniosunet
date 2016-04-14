<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
	<?php 
		echo Yii::app()->bootstrap->registerAllCss();
		echo Yii::app()->bootstrap->registerCoreScripts();
		
	 ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
</head> 

<body>
	<!--<div class="contenedor container-fluid">!-->

	<header class="container-fluid">
		<div class="row">
			<div id="dlogo" class="col-xs-2">
				<div class="pull-right">
				<img id="logo" src="<?php echo yii::app()->bootstrap->obtenerUrl().'/img/LogoUnet.png'?>" alt="Logo UNET" width="60" height="60">
				</div>
			</div>
			<div class="col-xs-6">
				<h1 class="h1 h1mod"><?php echo CHtml::encode(Yii::app()->name); ?> UNET </h1>	
			</div >
			<div id="dmanos" class="col-xs-4">
				<div class="pull-right">
				<img id="manos" src="<?php echo yii::app()->bootstrap->obtenerUrl().'/img/manos3.png'?>" alt="manos" width="60" height="60">					
				</div>
			</div>
		</div>
	</header>

	<nav class="info_usuario container-fluid">
		

	</nav>
	<div class="container-fluid">
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
		<?php endif?>
	</div> 
	
	<main class="container-fluid">
		<div class "row">
			<div  class="nuevo col-md-12 text-left">
				<p>Nuevo Convenio Marco</p>
			</div>
		</div>
		
		<div class "row ">
			<aside class="menu_pasos col-md-3">
			
					<ul id="navi">
						<li><a href="index.php?r=cargar/paso1" class="text-center"> Paso 1</a></li>
						<li><a href="index.php?r=cargar/paso2" class="text-center" >Paso 2</a></li>
						<li><a href="index.php?r=cargar/paso3" class="text-center">Paso 3</a></li>
						<li><a href="index.php?r=cargar/paso4" class="text-center">Paso 4</a></li>
						<li><a href="index.php?r=cargar/paso5" class="text-center">Paso 5</a></li>
						<li><a href="#" class="text-center">Paso 6</a></li>
						
					</ul>
					
				
			</aside>

			<section class="datos col-md-9"> 
			
				<?php echo $content; ?>
			</section>	

		
		</div>
	</main>

	<footer id="foo" class="container-fluid text-center">
		<div class="row">
			<div class="col-md-12">
				Universidad Nacional Experimental del Tachira		
			</div>
		</div>
		
	</footer><!-- footer -->
<!--</div>-->

</body>
</html>
