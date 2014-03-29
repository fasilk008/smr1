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
    'action' => array( '/PropertyRegistration/Facilities' ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
            
	</div>

	
        <div id="addTextArea" >
	<div class="row">
		<?php echo $form->labelEx($model,'other_facilities'); ?>
		<?php echo $form->textArea($model,'other_facilities[]'); ?>
		<?php echo $form->error($model,'other_facilities[]'); ?>
	</div>
        </div>
        <?php echo CHtml::button('Add',array('id'=>"addButton")); ?>
        

 
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
                
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php Yii::app()->clientScript->registerCoreScript('jquery');     
Yii::app()->clientScript->registerCoreScript('jquery.ui');
$cs = Yii::app()->getClientScript();  
$cs->registerScript(
  'addtextarea'," 
      
  $('#addButton').on('click',function(){
  
   $('#addTextArea').append('<div class=\"row\"><textarea name=\"Otherfacilities[other_facilities][]\"></textarea></div>');
            
    });
  ",CClientScript::POS_READY
);
?>
        

