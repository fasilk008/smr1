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
    'action' => array( '/PropertyRegistration/DeleteImages' ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
   <div class="row">
       
       <?php foreach($values as $aPost){ ?>
       
       <?php echo $form->checkBox($model,'check_image[]',array('value'=>$aPost->image_id)); ?>
<img src="<?php echo Yii::app()->request->baseUrl.'/protected/upload/'.$aPost->name;?> " />
   </div>
       <?php } ?>
	
 
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
                
	</div>

<?php $this->endWidget(); ?>
       
</div><!-- form -->


