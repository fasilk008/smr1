
<?php
/* @var $this PropertyRegistrationController */

$this->breadcrumbs=array(
	'Property Registration',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    'action' => array( '/PropertyRegistration/EditOtherFacilities' ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
            
	</div>

	
        <?php 
        $i=0;
        $facility_id_arr=array();
        foreach($values as $aPost){ 
            
         ?>
	<div class="row">
		<?php echo $form->labelEx($model,'other_facilities'); ?>
		<?php echo $form->textArea($model,'other_facilities[]',array('value'=>$aPost->other_facilities)); ?>
		<?php echo $form->error($model,'other_facilities[]'); ?>
	</div>
        <?php 
        $facility_id_arr[]=$aPost->facility_id;
        $i++; 
        
        } ?>
       
        

 
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
                
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->

        



