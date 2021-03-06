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
	<!--<div class="contenedor container-fluid">-->
	<header class="container-fluid">
		<div class="row">
			<div id="dlogo" class="col-xs-2">
				<div class="pull-right">
				<img id="logo" src="<?php echo yii::app()->bootstrap->obtenerUrl().'/img/LogoUnet.png'?>" alt="Logo UNET" width="60" height="60">
				</div>
			</div>
			<div class="col-xs-6">
				<h1 class="h1c"><?php echo CHtml::encode(Yii::app()->name); ?> UNET </h1>	
			</div >
			<div id="dmanos" class="col-xs-4">
				<div class="pull-right">
				<img id="manos" src="<?php echo yii::app()->bootstrap->obtenerUrl().'/img/Manos3.png'?>" alt="manos" width="60" height="60">					
				</div>
			</div>
		</div>
	</header>
 

	<nav id="menuPrincipal" class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <!--<a class="navbar-brand" href="#">convenios UNET</a>-->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
     
        <?php $this->widget('zii.widgets.CMenu',array(
			'htmlOptions'=>array('class'=>'nav navbar-nav'),
			'encodeLabel' => false,
			'items'=>array(
				array('label'=>'<span class="glyphicon glyphicon-home"></span>', 'url'=>array('/site/index')),
				
			),
			
		)); ?>

		<?php $this->widget('zii.widgets.CMenu',array(
			'htmlOptions'=>array('class'=>'nav navbar-nav navbar-right'),
			'encodeLabel' => false,
			'items'=>array(
				array('label'=>'<span class="glyphicon glyphicon-user"></span> Iniciar sesion','url'=>array('/site/login'),'visible'=>Yii::app()->user->isGuest),
				array('label'=>'<span class="glyphicon glyphicon-user"></span> cerrar sesion ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
			
		)); ?>

    </div>
  </div>
</nav>


 
	<div class="container-fluid">

	<div class="row">
		<div class="col-xs-6">
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
		<?php endif?>
       </div>

       <div class="col-xs-6">

       	<?php if(!Yii::app()->user->isGuest):?>
			<!--<p class="text-right" id="fecha"></p>-->
		<?php endif?>
       </div>
	</div>   
	</div> 
	
	<!--<main class="container-fluid">
		<div class "row">
			
			<div  class="nuevo col-xs-12 text-left">
				<p ><span class="glyphicon glyphicon-th-list"></span> Nuevo Convenio Marco</p>
			</div>
		</div>-->

		<div class="row">
			<?php echo $content; ?>
		</div>
	<!--	<div class "row ">
			<aside class="menu_pasos col-xs-3">
			
					<ul id="navi">
						<li><a href="index.php?r=convenios/_paso1" class="text-center">Paso 1</a></li>
						<li><a href="index.php?r=cargar/paso2" class="text-center" >Paso 2</a></li>
						<li><a href="index.php?r=cargar/paso3" class="text-center">Paso 3</a></li>
						<li><a href="index.php?r=cargar/paso4" class="text-center">Paso 4</a></li>
						<li><a href="index.php?r=cargar/paso5" class="text-center">Paso 5</a></li>
						<li><a href="#" class="text-center">Paso 6</a></li>
						
					</ul>
					
				
			</aside>

			<section class="datos col-xs-9"> 
			
				<?php /*echo $content; */?>
			</section>	

		
		</div>-->
	<!--</main>-->

	<footer id="foo" class="container-fluid text-center">
		<div class="row">
			<div class="col-md-12">
				Universidad Nacional Experimental del Tachira		
			</div>
		</div>
		
	</footer><!-- footer -->
 <!--</div>-->
 <!--<script>
      var d = new Date();
      var dia=d.getDate().toString();
      var mes=(d.getMonth()+1).toString();
      var anio=d.getFullYear().toString();
      var fecha1=dia.concat("/",mes,"/",anio);
      var fecha2=d.toDateString();
      //var fecha3=anio.concat("-",mes,"-",dia);

      document.getElementById("fecha").innerHTML = fecha1;
   </script>-->

</body>
</html>
