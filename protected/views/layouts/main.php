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
	<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="css/material/material.min.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
</head> 

<body>
	<header class="container-fluid">
		<!--<div class="row">
			<div id="dlogo" class="col-xs-2">
				<div class="pull-right">
				<img id="logo" src="<?php /*echo yii::app()->bootstrap->obtenerUrl().'/img/LogoUnet.png'*/?>" alt="Logo UNET" width="60" height="60">
				</div>
			</div>-->
			<!--<div class="col-xs-6">
				<h1 class="h1c"><?php /*echo CHtml::encode(Yii::app()->name);*/ ?> UNET </h1>	
			</div >-->
			<!--<div id="dmanos" class="col-xs-4">
				<div class="pull-right">
				<img id="manos" src="<?php /*echo yii::app()->bootstrap->obtenerUrl().'/img/Manos3.png'*/?>" alt="manos" width="60" height="60">					
				</div>
			</div>-->
		<!--</div>-->
	</header>

<nav id="menuPrincipal" class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menuPrinc">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a id="titulo" class="navbar-brand" href="<?php echo $this->createUrl( '/site/index' ); ?>"><span class="glyphicon glyphicon-home"></span> Convenios UNET</a>
    </div>
    <div id="menuPrinc" class="collapse navbar-collapse" >
     
        <?php $this->widget('zii.widgets.CMenu',array(
			'htmlOptions'=>array('class'=>'nav navbar-nav'),
			'encodeLabel' => false,
			'items'=>array(
				//array('label'=>'<span class="glyphicon glyphicon-home"></span>', 'url'=>array('/site/index')),
				array('label'=>'<i class="fa fa-handshake-o" aria-hidden="true"></i><p> Consultar Convenios</p>', 'url'=>array('/convenios/consultar')),
				array('label'=>'<i class="fa fa-pie-chart" aria-hidden="true"></i> <p> Reportes</p>', 'url'=>array('/convenios/construirReporte'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'<i class="fa fa-info" aria-hidden="true"></i> <p> Información</p>', 'url'=>array('/site/informacion')),
				array('label'=>'<i class="fa fa-paper-plane-o" aria-hidden="true"></i> <p> Contacto</p>', 'url'=>array('/site/contact'),'visible'=>Yii::app()->user->isGuest),
				array('label'=>'<i class="fa fa-cog" aria-hidden="true"></i> <p> Configuración</p> <span class="caret"></span>', 'url'=>array('/site/configuracion'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
		           // array('label'=>'Convenios', 'url'=>array('/site/configuracion', 'tag'=>'Estatica')),
		            array('label'=>'Administrar Usuarios', 'url'=>array('usuario/admin', 'tag'=>'Aministrar Usuarios')),
		            array('label'=>'Administrar Información Base de Datos', 'url'=>array('site/configuracion', 'tag'=>'popular')),
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
				array('label'=>'<i class="fa fa-sign-in" aria-hidden="true"></i> <p>Iniciar Sesión</p> ','url'=>array('/site/login'),'visible'=>Yii::app()->user->isGuest),
				array('label'=>'<i class="fa fa-sign-in" aria-hidden="true"></i> <p>Cerrar Sesión</p> ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'<span class="glyphicon glyphicon-time"></span> '.Date("d-m-Y") ,'url'=>array('/site/login'),'visible'=>!Yii::app()->user->isGuest),
			),
			
		)); ?>

    </div>
  </div>
</nav>

	<div id="navegabilidadbreadcrumbs" class="container-fluid">

		<div class="row">

			<div class="col-md-12">
			<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('zii.widgets.CBreadcrumbs', array(
					'links'=>$this->breadcrumbs,
				)); ?><!-- breadcrumbs -->
			<?php endif?>
	       </div>
		</div>   
	</div> 

	<main>
		<?php echo $content; ?>
	</main>
	
	<footer id="foo" class="container-fluid text-center">
		<div class="row">
			<div class="col-md-6">

			 <ul class="list-inline">
				 	<li><a href="<?php echo $this->createUrl( '/convenios/Consultar' );?>">Consultar Convenios / </a></li>
				 	<li><a href="<?php echo $this->createUrl( '/site/Informacion' ); ?>">Normas y Procedimientos / </a></li>
				 	<li><a href="<?php echo $this->createUrl( '/site/Informacion' ); ?>">Formatos / </a></li>
				 	<li><a href="<?php echo $this->createUrl( '/site/contact' ); ?>">Contacto </a></li>
			 </ul>
			</div>

			<div class="col-md-12">
				<p>Universidad Nacional Experimental del Tachira</p>
				<p>Sector Paramillo, San Cristóbal Táchira</p>
				<p>Telf: +58 276-3530422</p>
				  <ul class="list-inline">
				    <li><a href="https://twitter.com/UNEToficial"><img src="<?php echo yii::app()->bootstrap->obtenerUrl().'/img/twitter.png'?>" alt="Logo UNET" width="40" height="40"></a></li>
				    <li><a href="https://es-la.facebook.com/UNEToficial"><img src="<?php echo yii::app()->bootstrap->obtenerUrl().'/img/facebook.png'?>" alt="Logo UNET" width="40" height="40"> </a></li>
				 	<li><a href="https://www.youtube.com/user/UNETHoy"><img src="<?php echo yii::app()->bootstrap->obtenerUrl().'/img/youtube.png'?>" alt="Logo UNET" width="40" height="40"></a></li>
				  </ul>		
			</div>
		</div>
		
	</footer><!-- footer -->
	<script src="css/material/material.min.js"></script>
</body>
</html>
