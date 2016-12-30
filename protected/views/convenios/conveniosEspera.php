<?php 
  $this->breadcrumbs=array(
	'Consultar'=>array('consultar'),
	'Convenios en Espera',
);
 ?>

 <div class="container">

<div class="row">
     <div  id="MainMenu" class="col-sm-4">

     	 <?php 
		      $form=$this->beginWidget('CActiveForm',
		        array(
		          'method' =>'POST',
		          'action' =>Yii::app()->createUrl('convenios/coneviosEspera'),
		          'id' => 'form',
		            'enableAjaxValidation' => true,
		            'enableClientValidation' => true,
		            'clientOptions' => array(
		              'validateOnSubmit' => true,
		              'validateOnChange' => true,
		              'validateOnType' => true,
		              ),
		          
		          ));
         ?>
		<div class="list-group panel">  

		  <a href="javascript:void(0)" class="list-group-item" >Filtrar por </a>	
		  <a href="javascript:void(0)" class="list-group-item opcion" ><?php echo $form->labelEx($model,'estadoConv'); ?> </a>	
	      <!--<a href="#SubEstado" class="list-group-item opcion"  data-toggle="collapse" data-parent="#SubEstado" ><?php /*echo $form->labelEx($model,'estadoConv');*/ ?> <span class="glyphicon glyphicon-plus-sign pull-right"></span></a>-->
	      <div class="list-group-submenu" id="SubEstado"> 

	          <?php  
	           $list6=CHtml::listData($estadoconve,'idEstadoConvenio','nombreEstadoConvenio');   
	           echo $form->checkBoxList($model,'estadoConv', $list6,array('onclick'=>'ConvenioEstado(1)', 'template'=>'<a class="list-group-item" data-parent="#SubEstado"> {input}{label} </a>', "separator" => ""));    
	          ?>

	         <?php echo $form->hiddenField($model,'order'); ?>
	          
	      </div>

	    </div>

		   <?php $this->endWidget(); ?>
     </div>

      <div  id="Resulconvenios" class="col-sm-8">
			    	<h4 class="text-center">Convenios en Proceso de Aprobación</h4>	
	    <div id="resul" class="list-group" >

	    </div>

 	</div>

</div>

<ul class="breadcrumb text-right">
  <li><a href="<?php echo $this->createUrl("site/index"); ?>">Home</a></li>
  <li><a href="<?php echo $this->createUrl("convenios/consultar"); ?>">consultar Convenios</a></li>
</ul>
</div>
<script type="text/javascript"> 

<?php if($resuldefecto==1){ ?>
            ConvenioEstado(1);

  <?php  $resuldefecto=0; }?>

	function ConvenioEstado(inicio){

    var inicio=Number(inicio);	
    document.getElementById("ConsultasConvenios_order").value=inicio;	
	var data=$("#form").serialize();

	var url= '<?php echo Yii::app()->createUrl("convenios/selectEstado"); ?>'
	$.ajax({

	type:"post",
	url: url,
	//data:{ data:data, inicio:pag},
	data:data,
	success:function(datos){
	    document.getElementById("resul").innerHTML=datos;  
	}
	});

	}
</script> 

