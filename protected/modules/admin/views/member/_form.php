<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'publisher_id'); ?>
		<?php echo $form->textField($model,'publisher_id'); ?>
		<?php echo $form->error($model,'publisher_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'publisher_admin'); ?>
		<?php echo $form->textField($model,'publisher_admin'); ?>
		<?php echo $form->error($model,'publisher_admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'publisher_staff_role'); ?>
		<?php echo $form->textField($model,'publisher_staff_role',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'publisher_staff_role'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->