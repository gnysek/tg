<div class="form">

	<?php /* @var $form CActiveForm */ ?>
	<?php
	$form = $this->beginWidget('CActiveForm', array(
		'id' => 'member-form',
		'enableAjaxValidation' => false,
	));
	?>

	<p class="note">Pola oznaczone <span class="required">*</span> są wymagane.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->label($model, 'publisher_id', array('label' => 'Wydawca')); ?>
		<?php echo $model->getPublisherName(); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'publisher_admin', array('label' => 'Administrator')); ?>
		<?php echo $form->dropDownList($model, 'publisher_admin', $model->getPublisherAdmin()); ?>
		<?php echo $form->error($model, 'publisher_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'publisher_staff_role', array('label' => "Rola w team'ie")); ?>
		<?php echo $form->textField($model, 'publisher_staff_role', array('size' => 30, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'publisher_staff_role'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Zapisz'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->