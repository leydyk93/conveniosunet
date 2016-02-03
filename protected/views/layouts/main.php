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
	<header class="container-fluid">
		<div class="row">
			<div class="col-xs-1">
				<img class="logoc" src="<?php echo yii::app()->bootstrap->obtenerUrl().'/img/LogoUnet.png'?>" alt="Logo UNET" width="60" height="60">
			</div>
			<div class="col-sm-5">
				<h1 class="h1"><?php echo CHtml::encode(Yii::app()->name); ?> UNET </h1>	
			</div >
			<div class="col-sm-5">
				<h2 class="text-right"><small>acuerdos que nos benefician a todos</small></h2>
			</div>
			<div class="col-xs-1">
				<div class="pull-right">
				<img class="logoc" src="<?php echo yii::app()->bootstrap->obtenerUrl().'/img/manos3.png'?>" alt="manos" width="60" height="60">					
				</div>
			</div>
		</div>
	</header>

	<nav class="navbar navbar-default">
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
				array('label'=>'<span class="glyphicon glyphicon-search"></span> Consultar Convenios', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'<span class="glyphicon glyphicon-book"></span> Información', 'url'=>array('/site/vista')),
				array('label'=>'<span class="glyphicon glyphicon-earphone"></span> Contactenos', 'url'=>array('/site/contact'),'visible'=>Yii::app()->user->isGuest),
				array('label'=>'<span class="glyphicon glyphicon-cog"></span> Configuración <span class="caret"></span>', 'url'=>array('/site/configuracion'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
		            array('label'=>'New Arrivals', 'url'=>array('product/new', 'tag'=>'new')),
		            array('label'=>'Most Popular', 'url'=>array('product/index', 'tag'=>'popular')),
		        ),

				 'submenuOptions'=>array('class'=>'dropdown-menu'), 
				 'itemOptions'=>array('class'=>'dropdown'),
				 'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown')
				 )
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

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<footer>
		Universidad Nacional Experimental del Tachira
	</footer><!-- footer -->



</body>
</html>
