<?php
//<?php
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
        
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
    'action' => array( '/PropertyRegistration/Editgeneral' ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
            <?php// print_r($locations); ?>
            <?php// print_r($locations[0]['email']); ?>
		<?php echo $form->labelEx($model,'subtype'); ?>
		<?php echo $form->dropDownList($model,'subtype',$listname, array('prompt'=>'Select subtype','options' => array(
                    $values['subtype_id'] => array(
                        'selected' => "selected"
                    )))); ?>
		<?php echo $form->error($model,'subtype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_rooms'); ?>
		<?php echo $form->textField($model,'total_rooms',array('value'=>$values['total_rooms'])); ?>
		<?php echo $form->error($model,'total_rooms'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'property_description'); ?>
		<?php echo $form->textArea($model,'property_description',array('value'=>$values['description'])); ?>
		<?php echo $form->error($model,'property_description'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'property_address'); ?>
		<?php echo $form->textArea($model,'property_address',array('value'=>$values['address'])); ?>
		<?php echo $form->error($model,'property_address'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'landphone1'); ?>
		<?php echo $form->textField($model,'landphone1',array('value'=>$values['landphone'])); ?>
		<?php echo $form->error($model,'landphone1'); ?>
		
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'landphone2'); ?>
		<?php echo $form->textField($model,'landphone2',array('value'=>$values['landphone2'])); ?>
		<?php echo $form->error($model,'landphone2'); ?>
		
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'mobile1'); ?>
		<?php echo $form->textField($model,'mobile1',array('value'=>$values['mobilenumber'])); ?>
		<?php echo $form->error($model,'mobile1'); ?>
		
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'mobile2'); ?>
		<?php echo $form->textField($model,'mobile2',array('value'=>$values['mobilenumber2'])); ?>
		<?php echo $form->error($model,'mobile2'); ?>
		
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'owner_no'); ?>
		<?php echo $form->textField($model,'owner_no',array('value'=>$values['owner_number'])); ?>
		<?php echo $form->error($model,'owner_no'); ?>
		
	</div>
         <div class="row">
		<?php echo $form->labelEx($model,'owner_email'); ?>
		<?php echo $form->textField($model,'owner_email',array('value'=>$values['owner_email'])); ?>
		<?php echo $form->error($model,'owner_email'); ?>
		
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('value'=>$values['email'])); ?>
		<?php echo $form->error($model,'email'); ?>
		
	</div>
        <div class="row">
            
		<?php echo $form->labelEx($model,'place'); ?>
		<?php echo $form->dropDownList($model,'place',$placeName, array('prompt'=>'Select location','options' => array(
                    $values['place_id'] => array(
                        'selected' => "selected"
                    )))); ?>
		<?php echo $form->error($model,'place'); ?>
	</div>
        <?php
        if($values['owner_notify']==1 || $values['owner_notify']==3){ ?>
          <div class="row rememberMe">
		<?php echo $form->checkBox($model,'mob_notify',array('checked'=>'checked')); ?>
		<?php echo $form->label($model,'mob_notify'); ?>
		<?php echo $form->error($model,'mob_notify'); ?>
	</div>  
       <?php }
        else { ?>
        <div class="row rememberMe">
		<?php echo $form->checkBox($model,'mob_notify'); ?>
		<?php echo $form->label($model,'mob_notify'); ?>
		<?php echo $form->error($model,'mob_notify'); ?>
	</div>
      <?php  }
        if($values['owner_notify']==1 || $values['owner_notify']==2){ ?>
        <div class="row rememberMe">
		<?php echo $form->checkBox($model,'email_notify',array('checked'=>'checked')); ?>
		<?php echo $form->label($model,'email_notify'); ?>
		<?php echo $form->error($model,'email_notify'); ?>
	</div>
       <?php }
        else { ?>
        <div class="row rememberMe">
		<?php echo $form->checkBox($model,'email_notify'); ?>
		<?php echo $form->label($model,'email_notify'); ?>
		<?php echo $form->error($model,'email_notify'); ?>
	</div>
     <?php   } ?>

 
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
                
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
print_r($model->total_rooms);
echo $model['total_rooms'];
 //$model->attributes;
//echo $model->property_description;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

