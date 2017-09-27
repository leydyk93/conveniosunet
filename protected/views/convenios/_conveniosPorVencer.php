<?php  if(!empty($convenios)){?>
 <div class="alert alert-info alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>¡Información!</strong> Hay convenios por vencerse en un periodo de tres meses (
     <?php  foreach($convenios as $key=>$value){  ?>
   		 	<a href="<?php echo $this->createUrl( '/convenios/view' )."&id=".$value->idConvenio; ?>"><?php echo $value->idConvenio.","; ?></a>
   		<?php  } echo ")"; ?> 
  </div>

  <?php } ?>