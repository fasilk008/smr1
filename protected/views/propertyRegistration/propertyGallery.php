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
    'action' => array( '/PropertyRegistration/PropertyGallery' ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div id="addgallerypic">
        <div class="row">
            <?php
		echo $form->labelEx($model, 'gallery image');
                echo $form->fileField($model, 'gallery_image[]');
                echo $form->error($model, 'gallery_image[]'); ?>
	</div>
        </div>
         <?php echo CHtml::button('Add',array('id'=>"addpicButton")); ?>

 
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
                
	</div>

<?php $this->endWidget(); ?>
        <?php Yii::app()->clientScript->registerCoreScript('jquery');     
Yii::app()->clientScript->registerCoreScript('jquery.ui');
$cs = Yii::app()->getClientScript();  
$cs->registerScript(
  'addgalleryimage'," 
      
  $('#addpicButton').on('click',function(){
  
   $('#addgallerypic').append('<div id=\"row\"><input type=\"file\" name=\"Gallerypic[gallery_image][]\"></div>');
            
    });
  ",CClientScript::POS_READY
);
?>
</div><!-- form -->
