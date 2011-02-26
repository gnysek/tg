<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'forum-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pos'); ?>
		<?php echo $form->textField($model,'pos'); ?>
		<?php echo $form->error($model,'pos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visible'); ?>
		<?php echo $form->textField($model,'visible'); ?>
		<?php echo $form->error($model,'visible'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->