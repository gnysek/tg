<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fcat-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'forum_id'); ?>
		<?php echo $form->textField($model,'forum_id'); ?>
		<?php echo $form->error($model,'forum_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pos'); ?>
		<?php echo $form->textField($model,'pos'); ?>
		<?php echo $form->error($model,'pos'); ?>
	</div>

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
		<?php echo $form->labelEx($model,'topics_total'); ?>
		<?php echo $form->textField($model,'topics_total'); ?>
		<?php echo $form->error($model,'topics_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'posts_total'); ?>
		<?php echo $form->textField($model,'posts_total'); ?>
		<?php echo $form->error($model,'posts_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_post_data'); ?>
		<?php echo $form->textArea($model,'last_post_data',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'last_post_data'); ?>
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